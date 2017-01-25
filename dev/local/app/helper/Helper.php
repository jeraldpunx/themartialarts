<?php

class Helper{
    public static function setActive($route)
    {
        return (Route::currentRouteName() == $route) ? "active" : '';
    }
}