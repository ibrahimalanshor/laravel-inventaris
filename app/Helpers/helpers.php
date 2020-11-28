<?php 

function active(string $route, bool $group = null) : String
{
	$active = $group ? request()->is($route) || request()->is($route.'/*') : request()->is($route);
	return $active ? 'active' : $route;
}

function image(string $photo) : String
{
	return asset('storage/images/'.$photo);
}

function site(string $key)
{
	return cache('site')->$key;
}

function localDate($date) : String
{
	return date('d M Y', strtotime($date));
}

 ?>