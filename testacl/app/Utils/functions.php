<?php

function test_autoload(){
	echo "auto load";
}
function cur_nav($route = '')
{
    //explode切分法
    $routeArray = explode('.', $route);
    if ((is_array($routeArray)) && (count($routeArray)>=2)) {
        $route1 = $routeArray[0].'.'.$routeArray[1].'.index';
        $route2 = $routeArray[0].'.'.$routeArray[1];
        if (Route::getRoutes()->hasNamedRoute($route1)) {  //优先判断是否存在尾缀名为'.index'的路由
            return route($route1);
        } else {
            return route($route2);
            }
    	} else {
        return route($route);
    }
}

	
?>