# Changelog

All notable changes to this project will be documented in this file.
Format follows [Keep a Changelog](https://keepachangelog.com/en/1.1.0/).
Versions follow [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## Versioning rules

| Bump | When |
|------|------|
| **MAJOR** (x.0.0) | Breaking change requiring user action — e.g. config schema change, data migration |
| **MINOR** (0.x.0) | New feature or new add-on, backwards compatible |
| **PATCH** (0.0.x) | Bug fix, security update, dependency/DokuWiki version bump |

## Release process

1. Update `version` in `dokuwiki/config.yaml`
2. In this file: rename `[Unreleased]` to `[x.y.z] - YYYY-MM-DD`, add a new empty `[Unreleased]` section above it
3. `git add dokuwiki/config.yaml dokuwiki/CHANGELOG.md && git commit -m "Release vX.Y.Z"`
4. `git push`
5. Create a GitHub Release tagged `X.Y.Z` — Actions publishes the image to GHCR
6. HA shows an update notification for existing installs

---

## [Unreleased]

## [1.2.1] - 2026-03-28

### Fixed
- Added `php83-dom` PHP extension — fixes `DOMDocument` error when installing the Mikio template
- Added `php83-curl` PHP extension — fixes Bootstrap3 `css.php` returning 503

## [1.2.0] - 2026-03-28

### Added

- Re-enabled HA ingress (port 8099) alongside direct port 8080
- Sidebar toggle restored in add-on configuration page
- DokuWiki `basedir` is now resolved dynamically per request: ingress requests receive the correct ingress path prefix; direct port 8080 requests continue to use `/`

## [1.1.7] - 2026-03-21

### Fixed
- Added `listen [::]:8080` to nginx so DokuWiki is reachable via IPv6 (e.g. `homeassistant.local` on networks where mDNS resolves to IPv6 link-local)

## [1.1.6] - 2026-03-21

### Fixed
- Locked `basedir = /` via `local.protected.php` (DokuWiki autodetection produced `/null/` when served directly on port 8080, breaking all CSS/JS asset URLs)

## [1.1.5] - 2026-03-21

### Changed
- Removed `hassio_api` and `hassio_role` (forced container onto hassio Docker network, blocking port forwarding)
- Removed Supervisor API call for ingress URL from init script (no longer needed without ingress)
- Added `webui` field so HA shows an "Open Web UI" button linking directly to port 8080

## [1.1.4] - 2026-03-21

### Changed
- Removed ingress (was preventing standard Docker port mapping from working); DokuWiki now accessible directly on port 8080

## [1.1.3] - 2026-03-21

### Fixed
- Reverted `host_network: true` (caused nginx to crash binding to port 80 with insufficient privileges); restored standard Docker port mapping for port 8080

## [1.1.2] - 2026-03-21

### Fixed
- Added `host_network: true` so port 8080 binds directly to the host network, making it accessible from the LAN (Docker NAT was silently blocked by HAOS nftables)

## [1.1.1] - 2026-03-21

### Fixed
- Removed nginx IP restriction that blocked direct connections on port 8080 (only HA ingress proxy was allowed)

## [1.1.0] - 2026-03-21

### Added
- Exposed port 8080 externally to allow direct HTTP access for API/scripting use (e.g. XMLRPC)

## [1.0.0] - 2026-03-20

First stable production release. All components verified on production HA (HAOS 17.1).

### Added
- Custom AppArmor security profile (enforcing mode) — restricts nginx and php-fpm to minimum required access
- Data persistence to `/share/dokuwiki` verified to survive uninstall, reinstall, and upgrade

## [0.1.4] - 2026-03-20

### Changed
- AppArmor profile switched to enforcing mode
- Added missing capabilities and system file rules discovered via audit log

## [0.1.3] - 2026-03-20

### Added
- AppArmor profile (complain mode — audit phase before enforcing)

## [0.1.2] - 2026-03-20

### Fixed
- Moved CHANGELOG.md into add-on subfolder so it appears in the HA changelog dialog

## [0.1.1] - 2026-03-20

### Changed
- No functional changes — release to verify upgrade path on production HA

## [0.1.0] - 2026-03-20

### Added
- Initial release of DokuWiki add-on
- nginx + php-fpm serving DokuWiki "Librarian" (2025-05-14b)
- Data persistence to `/share/dokuwiki` (survives reinstalls)
- HA ingress support — accessible via sidebar, no port exposure
- First-run setup flow via `install.php` wizard
- Automatic removal of `install.php` after setup is complete
- Configurable PHP upload limit, memory limit, and timezone
- Watchdog support
