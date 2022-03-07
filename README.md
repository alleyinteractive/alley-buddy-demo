# WP Starter Project

## Project Overview
WP Starter Project is a skeleton for scaffolding a project incorporating Alley's best practices. It preps a conventional, single-site WordPress project destined for VIP and includes:
* **File structure**: a general codebase,
* **Buddy**: `.buddy/pull-requests.yml` for running checks against pull requests,
* **Travis**: `.travis.yml` plus scripts for building and deploying,
* **phpcs**: a project-wide ruleset based on the [Alley Coding Standard](https://github.com/alleyinteractive/alley-coding-standards),
* **Composer**: commands for running `phpcs`, `phpcbf`, and `phpunit`, and
* **Other Stuff**: `.editorconfig`, `.gitignore`, a changelog template, and a GitHub pull release template.

## Get Started

### General

After setting up your project, do a case-sensitive search and replace for the following strings:
* `wp-starter-project` (Repo name, Composer project name)
* `WP Starter Project` (Project name)

In order for the proper localization textdomain and prefixes to be applied to your plugin(s) and theme(s), copy the example `.phpcs.xml` files from the `plugins/wp-starter-plugin` and `themes/wp-starter-theme` directories into your plugin and theme directories before performing the search and replace below. These files will extend the functionality of the root-level config to provide only the localization textdomain and prefixes for your plugins and themes, leaving all other settings in the root config.

Though this codebase does not include a theme or functionality plugin, references to the starter theme and plugin have been included as placeholders. After adding your theme and plugin, and adding the `.phpcs.xml` files mentioned above, do another search and replace for the following:
* `wp-starter-theme` (Slug, Localization domain)
* `wp_starter_theme` (Function prefix)
* `wp-starter-plugin` (Slug, Localization domain)
* `wp_starter_plugin` (Function prefix)

If you add your functionality plugin to a directory other than `/plugins/`, i.e. `/client-mu-plugins/` or `/mu-plugins/`, replace the plugin path in the following files:
* [`bin/before-script.sh`](https://github.com/alleyinteractive/wp-starter-project/blob/main/bin/before-script.sh)
* [`.buddy/pull-requests.yml`](https://github.com/alleyinteractive/wp-starter-project/blob/main/.buddy/pull-requests.yml)
* [`composer.json`](https://github.com/alleyinteractive/wp-starter-project/blob/main/composer.json)

Install `nvm` and the version of node specified in `.nvmrc` in both the plugin and the theme if you haven't already.

Run `composer setup` to install `composer` and `npm` dependencies and run an initial build.

### Plugin and Theme Integration

Assuming you create a theme based off of the [wp-starter-theme](https://github.com/alleyinteractive/wp-starter-theme) and a plugin based off of the [wp-starter-plugin](https://github.com/alleyinteractive/wp-starter-plugin), you will need to remove some files from the theme and plugin that are replaced by versions in this repo that cover the entire project:

* `(plugins|themes)/[name]/.gitignore` - Gitignore configuration is maintained at the project level in `wp-content/.gitignore`
* `(plugins|themes)/[name]/.phpcs/.gitkeep` - PHPCS cache is maintained at the project level in `wp-content/.phpcs`
* `(plugins|themes)/[name]/buddy.yml` - Buddy configuration is maintained at the project level in `wp-content/.buddy`
* `(plugins|themes)/[name]/composer.json` - Composer dependencies for PR tests are maintained at the project level in `wp-content/composer.json`
* `(plugins|themes)/[name]/composer.lock` - The Composer lockfile for dependencies for PR tests is maintained at the project level in `wp-content/composer.lock`

### PHPUnit

In order for PHPUnit to work properly starting with WordPress 5.9, you need to set the path to the PHPUnit polyfills installed by this project's `composer.json` in your plugin or theme's `bootstrap.php` file. To do this, assuming the `bootstrap.php` file is in a `tests` directory in your plugin or theme:

```php
const WP_TESTS_PHPUNIT_POLYFILLS_PATH = __DIR__ . '/../../../vendor/yoast/phpunit-polyfills';
```

Note that if you installed the plugin or theme using `scaffold plugin` or `scaffold theme` this path will be set assuming the vendor folder is in the same directory as the plugin or theme, whereas when using this project configuration, the vendor folder is in `wp-content` instead, and the path needs to be adjusted to what is above.

### Buddy

To get started with Buddy:
* Log in to [buddy.works](https://buddy.works).
* Click *Create a new project* at the top.
* Search for your project and select it. Ensure you are selecting the version in the `alleyinteractive` organization.
* Wait for it to sync with GitHub.
* On the right side, click *Pull Requests: OFF* and turn on pull requests. If you don't do this, Buddy will not be able to run against pull requests in your repo.
* In addition to the find and replace operations performed above, make changes to the `.buddy/pull-requests.yml` file as follows:
	* If starting a multisite project, simply change the Buddy environment variable for `WP_MULTISITE` to `1`.
    * Once you've configured any project-specific paths (eg. to plugins or themes), be sure to remove the `disabled: true` line for any actions you would like to run within your project.
	* Configure the Slack integration. You will need both the channel ID and the channel name. The channel ID can be obtained by configuring an action in Buddy's GUI and configuring the Slack notification for your channel of choice, then viewing the YAML for the action and copying the ID. Alternately, if you have a notification going to that channel already, you can copy it out of that project's configuration.
* When you are done, you should be able to push your branch, create a pull request against the `production` branch, and Buddy should run the configuration in your `.buddy/pull-requests.yml` file automatically. Once this happens and is successful, configure branch protections to require the Buddy task to pass.

### Travis

Make changes to `.travis.yml` to suit your deployment requirements.
* For a standalone site with one plugin and one theme, the find and replace operations performed above should be sufficient.
* The node version of the build process is set in `.travis.yml`. If you need a different version of node, you will need to change this value. If you need multiple versions of node, you will need to use `nvm` to switch between them.

### PHP Sniffs

A `.phpcs.xml` ruleset  is included in the project root to allow for a single global standard for all project files. To sniff the project, run the following:

    composer install
    composer phpcs

To fix errors with `phpcbf`, run:

    composer phpcbf

### IDE Configuration

To configure your IDE to work with the starter project, please refer to the IDE documentation on the Infosphere for either [PhpStorm](https://infosphere.alley.ws/production/IDE/PhpStorm/introduction.html) or [VS Code](https://infosphere.alley.ws/production/IDE/vscode.html).

## To Do

Ideas for enhancements and best practices are being logged on this project as [Github issues](https://github.com/alleyinteractive/wp-starter-project/issues). Feel free to create an issue or pick up an issue and iterate on the project!
