<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (!file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'vendor/autoload.php'))
{
	exit
	(
<<<EOT
<p>Dependecies are missing, please check the
<a href="https://github.com/Icybee/Starter#readme">installation guide</a>.</p>
EOT
	);
}

require_once 'user-access.php';
require_once 'vendor/autoload.php';

#
# Checking that "core" config is available. If it is not available the installer is ran. If the
# installer is not available an error message is displayed.
#

if (!file_exists(__DIR__ . '/protected/all/config/core.php'))
{
	if (!defined('Icybee\Installer\DIR'))
	{
		exit("The core configuration is missing and there is no installer to create it.");
	}

	require_once Icybee\Installer\DIR . 'run.php';
}
else
{
	require_once Icybee\DIR . 'run.php';
}

#
# Respond to the initial request
#

$request = $core->initial_request;
$response = $request();
$response();