# Code Explained for the Project Owner

This document walks through how the Grand Egyptian Museum web experience is structured, how requests are handled, and how to extend or modify the code safely.

## High-Level Overview
- The application is a lightweight PHP site organized in an MVC-style layout without a database or API layer.
- `public/index.php` is the single entry point. It loads configuration constants, builds the router, and dispatches incoming requests.
- Routes defined in `app/routes.php` map URL paths to PHP view templates under `app/views/`.
- Shared UI pieces (navbar, footer, sections) live in `app/views/components/` and are included by individual pages.
- Static assets (CSS, JS, images) are served from `public/assets/` and referenced with the `ASSETS` constant.

## Core Modules and How They Work
### Configuration (`app/config/config.php`)
- Defines the base URL and important paths:
  - `BASE_URL`: URL prefix for links and assets. Must match how the site is hosted (e.g., `/` locally or `/GEM_mvc/public/` on a subdirectory).
  - `APP_PATH`: Filesystem path to the `app/` directory.
  - `VIEW_PATH`: Filesystem path to `app/views/` for including templates.
  - `ASSETS`: Public URL to static assets (`BASE_URL . 'assets/'`).
- **Important:** The file currently contains unresolved merge markers with two different `BASE_URL` values. Resolve this by keeping only the correct constant block for your deployment.

### Router (`app/core/Router.php`)
- Stores route handlers in an associative array grouped by HTTP method.
- Public methods:
  - `get($path, $handler)` and `post($path, $handler)` register routes for GET/POST requests.
  - `dispatch($uri, $method)`: Normalizes the incoming path, finds the matching handler, and executes it. If no route exists, it returns a 404 status and message.
- Normalization trims trailing slashes, respects a configured base path, and ensures consistent leading slashes.
- Because handlers are callables, you can inline `require` statements for views or call controller methods for more complex logic.

### Controller Base Class (`app/core/Controller.php`)
- Provides a single helper method `render($view, $data = [])` that extracts an associative array into scoped variables and requires the given view file using `VIEW_PATH`.
- Use this as a parent class when adding controllers that need to pass data into templates.

### Routes (`app/routes.php`)
- Builds a `Router` instance (intended to use `BASE_URL` as the base path) and registers mappings such as `/`, `/kids-zone`, `/booking`, `/collections`, `/plans`, `/donate`, `/event-details`, and `/login`.
- Each route currently just includes a corresponding view file.
- **Note:** This file also has merge markers around router initialization; ensure the base path matches the value in `config.php`.

### Views and Components (`app/views/`)
- Page-level templates are grouped by feature:
  - `home.php` provides the main landing experience, linking to events, collections, plans, and donation prompts.
  - Subfolders like `booking/`, `Collections/`, `Donate/`, `Kids-Zone/`, `plans/`, and `event-details/` hold dedicated page templates.
  - `components/` contains reusable elements (e.g., navbar, footer, section styles) included via PHP `include`.
- Templates reference assets with `<?= ASSETS ?>` to keep links environment-agnostic.

### Entry Point (`public/index.php`)
- Loads configuration and routes, then calls `$router->dispatch()` with the current request URI and method.
- Contains merge markers but otherwise mirrors the route dispatch call found in `app/routes.php`.

## Data Flow
1. **Incoming request** hits `public/index.php` (document root).
2. Configuration constants are loaded, then `app/routes.php` is required to build the router.
3. `Router::dispatch()` normalizes the URI against any base path and matches a route handler.
4. The handler executes (typically a closure requiring a view file). Optional controllers could render views with data.
5. The view outputs HTML that references assets in `public/assets/` via the `ASSETS` URL prefix.

## Key Logic and Algorithms
- **Path Normalization:** In `Router::normalizePath()`, the path is ensured to start with `/`, trimmed of trailing slashes, and, if a custom base path is set, that prefix is removed so routing remains consistent regardless of deployment directory.
- **Dispatch Resolution:** Routes are stored by HTTP method and normalized path. The dispatcher checks `routes[$method][$path]`; if not found, it sets HTTP 404 and echoes a fallback message.

## Adding New Features
- **New Page:**
  1. Create a view template under `app/views/<feature>/<page>.php`.
  2. Register a route in `app/routes.php` using `$router->get('/your-path', function () { require VIEW_PATH . '<feature>/<page>.php'; });`.
  3. Link to the new path from existing navigation (e.g., navbar component) using `BASE_URL` for consistency.
- **New Controller Logic:**
  1. Create a PHP class extending `Controller` in a new file under `app/controllers/` (folder can be created as needed).
  2. Add methods that gather data and call `$this->render('path/to/view.php', ['key' => $value]);`.
  3. Update routes to point to the controller method instead of an inline closure.
- **Asset Updates:** Place CSS/JS/images inside `public/assets/` and reference them in views with `<?= ASSETS ?>path/to/file`.

## Common Pitfalls and Edge Cases
- **Unresolved Merge Conflicts:** `app/config/config.php`, `app/routes.php`, and `public/index.php` include Git conflict markers. Remove these and keep only the correct configuration for your hosting path.
- **BASE_URL Mismatch:** If `BASE_URL` does not match the deployed subdirectory, links and assets will break. Always adjust this constant when hosting under a subfolder.
- **Trailing Slash Variations:** The router normalizes paths, but registering routes with inconsistent slashes can still cause confusion. Prefer registering canonical paths without trailing slashes.
- **Missing Error Pages:** The router returns a plain "404 Not Found" string. Consider adding a friendly error view.

## Extending Safely
- Keep routes and views organized; group new features in their own subfolders under `app/views/`.
- When adding controllers, namespace them and autoload if the project grows; for now, manual `require` statements suffice.
- Introduce basic tests or manual checklists to verify that navigation works after updates (home links, events, plans, donate, login).
- Document any new configuration flags or dependencies directly in `README.md` for future maintainers.

## Pseudo-code Reference
```php
// Example of adding a controller-driven page
class EventsController extends Controller {
    public function index(): void {
        $events = [ /* fetch or define events */ ];
        $this->render('events/index.php', ['events' => $events]);
    }
}

$router->get('/events', function () {
    $controller = new EventsController();
    $controller->index();
});
```

By following the patterns above and resolving the configuration conflicts, you can extend the site with new pages, data-driven features, and cleaner navigation while keeping the codebase approachable.
