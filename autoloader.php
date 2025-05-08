<?php

function autocargador($clase) {
    $route = __DIR__ . "/class/" . $clase . ".php";
    require_once $route;
}

spl_autoload_register('autocargador');