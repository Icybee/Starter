<?php

/*
 * This is the user's startup sequence, which gets evaluated before any website page is published.
 *
 * In the folowing example, we override the global document object and add some scripts that will
 * be used by pages.
 */

$document = $core->document;

$document->js->add(Icybee\ASSETS . 'mootools.js');
$document->js->add(ICanBoogie\ASSETS . 'icanboogie.js');
$document->js->add(Brickrouge\ASSETS . 'brickrouge.js');

$document->css->add(Brickrouge\ASSETS . 'brickrouge.css');
