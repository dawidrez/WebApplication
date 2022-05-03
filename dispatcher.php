<?php

const REDIRECT_PREFIX = 'redirect:';

function dispatch($routing, $action_url)
{    $controller_name='index';
     if(@$routing[$action_url])
    $controller_name = $routing[$action_url];
	if( $controller_name =='sesja')
		$_SESSION['priv']=0;
	if( $controller_name ==='sesja2')
	{$_SESSION['priv']=1;
$controller_name='sesja';
	}
switch($controller_name)
{
	case 'index':
	include 'static/index.html';
	exit;
	case 'koncerny':
	include 'static/koncerny.html';
	exit;
	case 'krafty':
	include 'static/krafty.html';
	exit;
}
    $model = [];
    $view_name = $controller_name($model);

    build_response($view_name, $model);
}

function build_response($view, $model)
{
    if (strpos($view, REDIRECT_PREFIX) === 0) {
        $url = substr($view, strlen(REDIRECT_PREFIX));
        header("Location: " . $url);
        exit;

    } else {
        render($view, $model);
    }
}

function render($view_name, $model)
{
    global $routing;
    extract($model);
    include 'views/' . $view_name . '.php';
}
