<?php

/*
 * This file is part of the Icybee package.
 *
 * (c) Olivier Laviale <olivier.laviale@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

require_once 'user-access.php';
require_once 'vendor/autoload.php';

#
# Checking that "core" config is available. If it is not available the installer is ran. If the
# installer is not available an error message is displayed.
#

if (!file_exists(__DIR__ . '/protected/all/config/core.php'))
{
	$bootstrap = __DIR__ . '/vendor/icybee/installer/run.php';

	if (file_exists($bootstrap))
	{
		require_once $bootstrap;
	}
	else
	{
		throw new Exception("The core configuration is missing and there is no installer to create it.");
	}
}
else
{
	require_once 'vendor/icybee/icybee/bootstrap.php';
	require_once 'vendor/icybee/icybee/run.php';
}

#
# Respond to the initial request
#

$request = $core->initial_request;
$response = $request();
$response();