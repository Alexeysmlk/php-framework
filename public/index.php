<?php

require_once dirname(__DIR__) . '/vendor/autoload.php';

use Alexeysmlk\Framework\Http\Request;
use Alexeysmlk\Framework\Http\Response;

$request = Request::createFromGlobals();

$content = '<h1>Hello world</h1>';

$response = new Response($content);
$response->send();