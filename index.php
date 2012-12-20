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
require_once 'vendor/icybee/icybee/bootstrap.php';

$request = $core->initial_request;
$response = $request();
$response();
