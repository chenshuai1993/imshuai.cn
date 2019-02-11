<?php

function route_class(){
	return str_replace('.', '-', Route::currentRouteName());
}

/**
 * Get the active class if the condition is not falsy
 *
 * @param        $condition
 * @param string $activeClass
 * @param string $inactiveClass
 *
 * @return string
 */
function active_class($condition, $activeClass = 'active', $inactiveClass = '')
{
	
}