# Omar Nabil – Site Administrator

## Role / Who They Are
Museum staff member responsible for maintaining site content accuracy and ensuring the web experience runs smoothly.

## Goals When Using the System
- Verify that navigation links and assets load correctly after updates.
- Publish timely information for events, booking guidance, and donations.
- Coordinate with developers to resolve routing or hosting issues.

## Journey / Workflow
1. Logs into the hosting environment or CMS replacement (future) to review content updates.
2. Checks `BASE_URL` and routing configuration when deploying to new environments.
3. Opens key pages (home, events, plans, kids zone, booking, donate) to validate layout and links.
4. Monitors visitor feedback about broken links or outdated information and prioritizes fixes.

## Features They Interact With
- Static pages across `/`, `/plans`, `/event-details`, `/kids-zone`, `/booking`, and `/donate`.
- Asset hosting and routing configuration under `app/config/config.php` and `app/routes.php`.
- Error responses (404) when links are incorrect.

## Pain Points / Needs
- Merge conflicts in configuration can break URLs; needs clear guidance on the correct `BASE_URL` value.
- Lacks built-in CMS or authentication, so content edits require developer assistance.
- No analytics or monitoring; relies on manual checks or user reports.

## Permissions or Limitations
- Can manage hosting configuration and coordinate deployments.
- Cannot directly edit templates without code changes unless CMS support is added.

## How the System Benefits Them
- Simple file-based structure is easy to deploy on basic PHP hosting.
- Shared components reduce the risk of inconsistent navigation across pages.
- Clear routing map makes it straightforward to verify available pages and URLs.
