# Changelog

## September 2026

### Added

- Added localized homepage SEO titles and meta descriptions for English and French.
- Added meaningful fallback alt text for homepage logos, property cards, news thumbnails, and team images.
- Added keyboard-accessible mobile navigation with expanded state, Escape handling, submenu controls, and visible focus indicators.
- Added descriptive screen-reader labels to footer social links.

### Changed

- Simplified the language switcher so English pages show only `Français` and French pages show only `English`.
- Updated footer menu and email links to remain white, display an underline by default, and remove it on hover.

### Fixed

- Preserved intentional `<br>` line breaks in homepage card headings without allowing arbitrary HTML.

### Operations

- Completed and verified automatic WordPress theme deployment through GitHub Actions.
- Rotated the deployment SSH credential after the original private key was exposed.
- Removed obsolete hosting keys and retained only the verified replacement deployment key.
- Confirmed production deployment version tracking and LiteSpeed cache purging.

## August 2026

### Added

- Imported the Mandevco WordPress theme into version control.
- Added automatic theme deployment through GitHub Actions for changes pushed to `main`.
- Added a production `version.txt` marker containing the deployed commit, timestamp, workflow run, and repository.
- Added a manual rollback workflow for deploying a previous commit.

### Changed

- Improved frontend stylesheet, script, and Google Fonts loading.
- Added file-based cache versions for the theme's primary CSS and JavaScript assets.

### Fixed

- Corrected the frontend jQuery no-conflict error.
- Corrected JavaScript dependency declarations and loading order.
- Removed duplicate Google Fonts requests.
