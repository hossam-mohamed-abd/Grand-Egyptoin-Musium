# Developer / Maintainer

## Role
Engineer responsible for extending functionality, maintaining routing, and ensuring the codebase remains healthy.

## Goals
- Understand the lightweight MVC structure and routing entry points.
- Add new pages or features without breaking existing routes or assets.
- Resolve configuration issues (e.g., `BASE_URL` conflicts) for different deployments.

## Typical Journey
1. Clones the repository and reviews `app/config/config.php` for environment-specific settings.
2. Checks `app/core/Router.php` and `app/routes.php` to learn how routes map to views.
3. Adds or updates view templates under `app/views/` and references assets via `ASSETS`.
4. Runs a local PHP server to verify routing and content rendering.

## Features Interacted With
- Router class and route definitions.
- Controller base class and view-rendering patterns.
- Static assets and shared UI components.

## Pain Points, Needs, and Expectations
- Needs clarity on unresolved merge conflicts to avoid misconfigured `BASE_URL` values.
- Expects simple testing or linting steps before committing changes (currently absent).
- Wants documentation on adding dynamic data sources when the project grows.

## Permissions and Limitations
- Full repository access; responsible for code quality and deployment readiness.
- Currently limited by the static nature of pages—no API layer or database integration is present.

## How the System Helps
- Compact codebase with a small set of core files for quick onboarding.
- Constants and a minimal router make it straightforward to add new pages.
- Shared components encourage consistent styling across newly added views.
