# Alley Buddy Demo

## Project Overview

`alley-buddy-demo` is a skeleton project for a [Buddy](https://buddy.works) webinar demonstration that Alley presented 2022-04-06.

## Get Started

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
