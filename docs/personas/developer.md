# Salma Farouk – Web Developer

## Role / Who They Are
Software engineer maintaining and extending the museum website, including routing, templates, and assets.

## Goals When Using the System
- Understand the routing layer and configuration to add new pages safely.
- Keep navigation and asset links consistent across environments.
- Refactor templates and components without breaking existing pages.
- Plan future enhancements such as authentication or CMS integration.

## Journey / Workflow
1. Reviews `README.md` and `docs/code_explained_for_owner.md` to understand architecture.
2. Clones the repository and configures `BASE_URL` in `app/config/config.php`.
3. Runs the PHP built-in server from `public/` to preview pages.
4. Adds or updates routes in `app/routes.php` and templates in `app/views/`.
5. Reuses components in `app/views/components/` for consistent headers and footers.
6. Tests all paths (home, plans, booking, collections, donate, kids zone, event details) before deployment.

## Features They Interact With
- Routing layer in `app/core/Router.php` and route definitions in `app/routes.php`.
- View templates under `app/views/` and shared components under `app/views/components/`.
- Asset references using the `ASSETS` constant from `app/config/config.php`.

## Pain Points / Needs
- Merge markers in configuration and routes must be resolved to avoid environment-specific breakage.
- No automated tests; manual verification of pages is required.
- Lack of dynamic data sources means updates require template edits.

## Permissions or Limitations
- Full access to source code and deployment settings.
- Must coordinate with admins for content accuracy and with stakeholders for design changes.

## How the System Benefits Them
- Minimal stack with few dependencies allows rapid setup and iteration.
- Custom router and simple controllers make it easy to add routes or integrate future logic.
- Consistent component structure reduces duplication across pages.
