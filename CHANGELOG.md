# Changelog

## 2026-09-07

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

