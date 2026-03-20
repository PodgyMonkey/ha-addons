# DokuWiki

A simple, fast wiki that stores all data in plain text files — no database required.

## First-run setup

1. Start the add-on.
2. Open the web UI (click **Open web UI** on the add-on info page).
3. You will be redirected to the DokuWiki installer (`install.php`). Complete the wizard to create your admin user and configure the wiki.
4. After setup, restart the add-on. On restart, `install.php` is automatically removed and the wiki opens normally.

## Data persistence

All wiki data is stored in `/share/dokuwiki` and survives add-on uninstall and reinstall. The directory structure is:

```
/share/dokuwiki/
├── conf/       # Wiki configuration
├── data/       # Pages, media, and indexes
├── plugins/    # Installed plugins
└── tpl/        # Installed templates
```

## Configuration

```yaml
log_level: info
php_upload_limit: 16M
php_memory_limit: 256M
php_timezone: UTC
```

### Option: `log_level`

Controls the verbosity of add-on log output.

| Value | Description |
|-------|-------------|
| `trace` | Very verbose — all internal operations |
| `debug` | Verbose — useful for troubleshooting |
| `info` | Normal operational messages (default) |
| `notice` | Significant events only |
| `warning` | Warnings and above |
| `error` | Errors and above |
| `fatal` | Fatal errors only |

### Option: `php_upload_limit`

Maximum file size for uploads (applies to both `upload_max_filesize` and `post_max_size`).

Accepts PHP size shorthand: `16M`, `128M`, `1G`, etc.

Default: `16M`

### Option: `php_memory_limit`

Maximum memory a PHP request may consume.

Accepts PHP size shorthand: `128M`, `256M`, `512M`, etc.

Default: `256M`

### Option: `php_timezone`

PHP timezone used for timestamps in logs and wiki pages.

Must be a valid [PHP timezone identifier](https://www.php.net/manual/en/timezones.php), e.g. `UTC`, `Europe/London`, `America/New_York`.

Default: `UTC`

## Upgrading

When the add-on is updated, the DokuWiki application files are replaced with the new version. Your data, configuration, plugins, and templates in `/share/dokuwiki` are not affected.

## Support

- [DokuWiki documentation](https://www.dokuwiki.org/manual)
- [DokuWiki plugin repository](https://www.dokuwiki.org/plugins)
