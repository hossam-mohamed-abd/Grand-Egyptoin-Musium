# Grand Egyptian Museum Web Experience

A lightweight PHP-based web experience for the Grand Egyptian Museum that showcases exhibitions, collections, events, donations, and visitor planning in a simple MVC-style structure.

## Main Features
- Landing page with highlights for events, collections, learning resources, and donation prompts.
- Dedicated sections for Kids Zone, booking visits, collections exploration, visit planning, donations, and event details.
- Reusable layout components (navigation, headers, footers, section styles) delivered through shared assets.
- Minimal routing layer for mapping friendly URLs to view templates.

## Technology Stack
- **Language:** PHP 8+
- **Architecture:** Lightweight MVC-style structure with custom router and controller base class.
- **Frontend:** HTML5, CSS3, Bootstrap, Google Fonts, Font Awesome, static assets under `public/assets`.
- **Tooling:** PHP built-in server (or any web server that can serve `public/index.php`).

## System Architecture
- `public/index.php` acts as the front controller, bootstrapping configuration and dispatching all requests through the router.
- `app/config/config.php` defines base paths/constants used for routing, views, and asset URLs.
- `app/core/Router.php` registers route handlers and dispatches requests to the appropriate view or callback.
- `app/core/Controller.php` offers a helper for rendering views with scoped data extraction.
- `app/views/` contains PHP view templates for each page plus shared components.
- Static assets (CSS, JS, images) live in `public/assets/` and are referenced by the views via the `ASSETS` constant.

## Project Structure
```
.
├── app
│   ├── config
│   │   └── config.php        # Global constants such as BASE_URL, APP_PATH, VIEW_PATH, ASSETS
│   ├── core
│   │   ├── Controller.php    # Base controller with render helper
│   │   └── Router.php        # Minimal router supporting GET/POST dispatch
│   ├── routes.php            # Route definitions mapping paths to view templates
│   └── views
│       ├── components/       # Shared UI fragments (navbar, footer, etc.)
│       ├── booking/          # Booking page template
│       ├── Collections/      # Collections landing template
│       ├── Donate/           # Donation page template
│       ├── Kids-Zone/        # Kids Zone page template
│       ├── plans/            # Visit planning template
│       ├── event-details/    # Event detail page template
│       ├── regestration/     # Login/registration templates
│       └── home.php          # Main landing page
├── public
│   ├── assets/               # Compiled/static CSS, JS, and image assets
│   └── index.php             # Front controller wiring config and router dispatch
└── README.md
```

## Installation & Setup
1. **Prerequisites:** PHP 8+ installed locally. No database is required for current pages.
2. **Clone the repository:**
   ```bash
   git clone <repo-url>
   cd Grand-Egyptoin-Musium
   ```
3. **Configure base URL (optional):**
   - Open `app/config/config.php` and set `BASE_URL` if the project is served from a subdirectory (e.g., `/GEM_mvc/public/`).
   - Ensure your web server points to the `public/` directory as the document root.

## Running the Project
- **Using PHP built-in server:**
  ```bash
  cd public
  php -S localhost:8000
  ```
  Then open `http://localhost:8000` in your browser.
- **Using another web server:** configure the document root to `public/` and direct all requests to `public/index.php`.

## Example User Journeys
- **Plan a visit:** Landing page → "Plan Your Visit" button → `/plans` view with visitor information.
- **Explore events:** Landing page events section → "Learn More" → `/event-details` for expanded event info.
- **Kids activities:** Navigate to `/kids-zone` for child-friendly content and activities.
- **Book tickets:** Go to `/booking` to review booking information (currently static content).
- **Support the museum:** Visit `/donate` to read about donation options and prompts.

## Routes & Components Overview
- Routing is defined in `app/routes.php` using the custom `Router` class (`get`/`post` methods). Each route typically requires a view file under `app/views/`.
- Shared visual components (navbar, footer, section styles) are stored under `app/views/components/` and are included by page templates using PHP `include`.
- Assets referenced via the `ASSETS` constant resolve to `public/assets/` to keep URLs consistent regardless of deployment path.

## Known Limitations & Future Improvements
- Several files contain unresolved Git merge markers around `BASE_URL` and router initialization. These must be resolved before deployment.
- All pages are currently static; integrating dynamic data (events, bookings, donations) will require backend endpoints and persistence.
- There is no authentication/authorization flow beyond placeholder login views.
- Error handling is minimal (simple 404 message from the router); consider adding friendly error pages.
- No automated tests are provided; adding smoke tests for routing and view rendering is recommended.

## Contributing & Extending
- Add new routes in `app/routes.php` by registering paths with `$router->get()` or `$router->post()` and pointing to new view templates.
- Create new pages under `app/views/` and link assets using the `ASSETS` constant to maintain portability.
- For more complex features, introduce controllers that extend `Controller` and use `render()` to pass data into views.

## Authors & Credits
- Project contributors: 
   Eng.hossam Mohamed
   Eng.mohamed Sayed
   Eng.Abd-alrahman Ahmed
   Eng.Ahmed Goda
   Eng.Milad hany

## License
- Specify the project license here (e.g., MIT); add a `LICENSE` file to formalize.
