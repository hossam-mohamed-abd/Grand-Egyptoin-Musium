# Grand Egyptian Museum Web Experience

A lightweight PHP web experience that showcases exhibits, events, visit planning resources, and donation options for the Grand Egyptian Museum. The project uses a minimal MVC-inspired structure with a custom router and reusable view components to keep the site easy to extend.

## Main Features
- Home page highlighting key sections such as events, collections, kids zone, and support options.
- Dedicated pages for booking guidance, collections overview, event details, visit planning, kids zone content, and donation information.
- Shared UI components (navigation bar and footer) to maintain consistent styling across pages.
- Simple routing layer for mapping friendly URLs to PHP view templates.
- Static assets (CSS, JS, images) served from a single public directory for predictable paths in any hosting environment.

## Technology Stack
- **Language:** PHP 8+
- **Pattern:** Minimal MVC-style organization with a custom router
- **Frontend:** HTML5, CSS3, Bootstrap, Google Fonts, Font Awesome icons
- **Static assets:** Stored under `public/assets` (CSS, JS, images)

## System Architecture
- **Front controller:** `public/index.php` loads configuration, initializes the router, registers routes, and dispatches requests.
- **Routing:** `app/core/Router.php` normalizes paths, registers GET/POST handlers, and dispatches to closures or view templates defined in `app/routes.php`.
- **Views:** PHP templates under `app/views/` render each page. Shared components live in `app/views/components/` and are included by individual page templates.
- **Configuration:** `app/config/config.php` defines constants for the base URL, view path, and asset path. Note: the file currently contains unresolved merge markers for `BASE_URL`; set the correct value before deployment.
- **Assets:** Served from `public/assets/`, referenced via the `ASSETS` constant to keep URLs portable across environments.

## Project Structure
```
.
├── app
│   ├── config/
│   │   └── config.php        # Global constants such as BASE_URL, APP_PATH, VIEW_PATH, ASSETS
│   ├── core/
│   │   ├── Controller.php    # Base controller with a render helper
│   │   └── Router.php        # Lightweight router for GET/POST routes
│   ├── routes.php            # Route definitions mapping paths to view templates
│   └── views/
│       ├── components/       # Shared UI parts (navbar, footer)
│       ├── booking/          # Booking guidance page
│       ├── Collections/      # Collections overview page
│       ├── Donate/           # Donation information page
│       ├── Kids-Zone/        # Kids zone activities page
│       ├── plans/            # Visit planning page
│       ├── event-details/    # Event details page
│       └── home.php          # Homepage
├── public
│   ├── assets/               # CSS, JS, fonts, and images
│   ├── .htaccess             # For Apache URL rewriting to the front controller
│   └── index.php             # Front controller entry point
└── docs
    ├── code_explained_for_owner.md
    └── personas/             # User personas for the project
```

## Installation & Setup
1. **Prerequisites:** PHP 8+; no database is required for the current static content.
2. **Clone the repository:**
   ```bash
   git clone <repo-url>
   cd Grand-Egyptoin-Musium
   ```
3. **Configure the base URL (if needed):**
   - Open `app/config/config.php` and set `BASE_URL` to match your hosting path (e.g., `'/'` for root or `'/GEM_mvc/public/'` for a subdirectory).
   - Ensure your web server points its document root to the `public/` directory.

## How to Run
- **PHP built-in server (local development):**
  ```bash
  cd public
  php -S localhost:8000
  ```
  Then browse to `http://localhost:8000`.
- **Other web servers:** Point the document root to `public/` and route all requests to `public/index.php` (see `.htaccess` for an Apache example).

## Example Workflows
- **Plan a visit:** Navigate to `/plans` from the home page to review visiting information and logistics.
- **Explore events:** Visit `/event-details` from the events section to read more about a specific program.
- **Kids activities:** Open `/kids-zone` to find family-friendly content.
- **Booking guidance:** Go to `/booking` for instructions on booking visits.
- **Support the museum:** Visit `/donate` to explore donation options.

## Routing & Components Overview
- **Router usage:** Routes are registered in `app/routes.php` using `$router->get('/path', function () { ... });`. The router normalizes paths relative to `BASE_URL` so links remain consistent when deployed in subdirectories.
- **View rendering:** Page templates include shared components from `app/views/components/` to keep navigation and footer consistent. The base `Controller` class exposes a `render($view, $data = [])` helper for future controllers.

## Future Improvements
- Resolve merge markers in `app/config/config.php` and `app/routes.php` to avoid ambiguous `BASE_URL` settings.
- Add dynamic data sources for events, bookings, and donations instead of static content.
- Implement authentication and role-based access for contributors and admins.
- Expand error handling and add automated tests for routing and page rendering.
- Introduce content management hooks for editors to update copy without code changes.

## Authors / Credits
- Eng. Hossam Mohamed
- Eng. Mohamed Sayed
- Eng. Abd-alrahman Ahmed
- Eng. Ahmed Goda
- Eng. Milad Hany

## License
A license has not been declared. If you intend to open-source this project, add a `LICENSE` file (e.g., MIT) and update this section accordingly.
