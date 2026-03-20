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
3. `git add -A && git commit -m "Release vX.Y.Z"`
4. `git push`
5. Create a GitHub Release tagged `X.Y.Z` — Actions publishes the image to GHCR
6. HA shows an update notification for existing installs

---

## [Unreleased]

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
