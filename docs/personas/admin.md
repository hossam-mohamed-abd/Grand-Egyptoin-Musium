# Site Administrator

## Role
Museum staff responsible for publishing and maintaining website content, events, and media.

## Goals
- Ensure pages show accurate schedules, pricing, and contact information.
- Publish or update events, collection highlights, and donation campaigns.
- Verify navigation, assets, and links remain functional after updates.

## Typical Journey
1. Reviews live pages (home, events, plans, booking) for accuracy.
2. Updates view templates or assets in the repository to reflect new information.
3. Tests routing paths locally to confirm links resolve correctly.
4. Coordinates with designers or developers when new components are needed.

## Features Interacted With
- All view templates under `app/views/` and shared components.
- Static assets in `public/assets/` (images, CSS).
- Routing definitions in `app/routes.php` when adding new pages.

## Pain Points, Needs, and Expectations
- Wants a straightforward way to update content without breaking layout or links.
- Needs clarity on the correct `BASE_URL` for deployments to avoid broken assets.
- Expects a preview or staging environment before pushing changes live.

## Permissions and Limitations
- Repository write access; can modify templates and assets.
- Not responsible for backend feature development beyond content updates.

## How the System Helps
- Simple folder structure makes it easy to locate pages and shared components.
- Constants for `BASE_URL` and asset paths keep links consistent across deployments.
- Minimal router simplifies adding or adjusting routes for new content.
