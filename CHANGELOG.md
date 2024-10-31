# Changelog

## 1.3.6 _(2023-05-21)_
* Change: Note compatibility through WP 6.3+
* Change: Update copyright date (2023)

## 1.3.5 _(2021-10-11)_
* Change: Note compatibility through WP 5.8+
* Change: Tweak installation instruction
* Unit tests:
    * Change: Restructure unit test directories
        * Change: Move `phpunit/` into `tests/`
        * Change: Move `phpunit/bin` into `tests/`
    * Change: Remove 'test-' prefix from unit test file
    * Change: Remove a sanity unit test which didn't test anything related to the plugin
    * Change: In bootstrap, store path to plugin file constant
    * Change: In bootstrap, add backcompat for PHPUnit pre-v6.0

## 1.3.4 _(2021-04-18)_
* Change: Note compatibility through WP 5.7+
* Change: Update copyright date (2021)

## 1.3.3 _(2020-08-29)_
* Change: Restructure unit test file structure
    * New: Create new subdirectory `phpunit/` to house all files related to unit testing
    * Change: Move `bin/` to `phpunit/bin/`
    * Change: Move `tests/bootstrap.php` to `phpunit/`
    * Change: Move `tests/` to `phpunit/tests/`
    * Change: Rename `phpunit.xml` to `phpunit.xml.dist` per best practices
* Change: Note compatibility through WP 5.5+
* Change: Unit tests: Remove unnecessary unregistering of hooks in `tearDown()`

## 1.3.2 _(2020-05-25)_
* New: Add TODO.md and move existing TODO list from top of main plugin file into it
* Change: Use HTTPS for link to WP SVN repository in bin script for configuring unit tests (and delete commented-out code)
* Change: Note compatibility through WP 5.4+
* Change: Update links to coffee2code.com to be HTTPS

## 1.3.1 _(2019-12-03)_
* Change: Update unit test install script and bootstrap to use latest WP unit test repo
* Change: Note compatibility through WP 5.3+
* Change: Update copyright date (2020)
* Change: Add link to CHANGELOG.md in README.md

## 1.3 _(2019-03-30)_
* Change: Hook the `pre_site_transient_browser_` filter later to ensure plugin doesn't conflict with other functions operating at default priority
* New: Add unit tests
* New: Add README.md file
* New: Add CHANGELOG.md file and move all but most recent changelog entries into it
* Change: Add some inline documentation to explain the approach taken by the plugin
* Change: Add GitHub link to readme
* Change: Note compatibility through WP 5.1+
* Change: Update copyright date (2019)
* Change: Update License URI to be HTTPS

## 1.2.2 _(2017-02-12)_
* Change: Check that there is a `HTTP_USER_AGENT` before doing attempting to use its value
* Change: Minor code and code documentation reformatting (spacing)
* Change: Minor readme.txt tweaks
* Change: Note compatibility through WP 4.7+
* Change: Update copyright date (2017)

## 1.2.1 _(2016-03-20)_
* New: Add LICENSE file.
* New: Add empty index.php to prevent files from being listed if web server has enabled directory listings.
* Change: Note compatibility through WP 4.4+.
* Change: Update copyright date (2016).

## 1.2 _(2015-02-28)_
* Hook `pre_site_transient_browser_` instead of `site_transient_browser_` to avoid unnecessary transient handling by WP
* Reformat plugin header
* Change documentation links to wp.org to be https
* Note compatibility through WP 4.1+
* Update copyright date (2015)
* Add plugin icon

## 1.1 _(2014-01-30)_
* Remove `__return_null()` it has since been added to core
* Add check to prevent execution of code if file is directly accessed
* Re-license as GPLv2 or later (from X11)
* Add 'License' and 'License URI' header tags to readme.txt and plugin file
* Remove ending PHP close tag
* Documentation improvements
* Minor code reformatting (spacing)
* Note compatibility through WP 3.8+
* Drop compatibility with versions of WP older than 3.4
* Update copyright date (2014)
* Change donate link
* Add assets directory to plugin repository checkout
* Add screenshot
* Add banner

## 1.0.1
* Note compatibility through WP 3.3+
* Add phpDoc for `__return_null()`
* Add link to plugin directory page to readme.txt
* Add Upgrade Notice section to readme.txt
* Update copyright date (2012)

## 1.0
* Initial release
