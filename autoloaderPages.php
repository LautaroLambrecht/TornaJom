<?php

function autocargadorPages($clase) {
    require_once 'pages/' . $clase . '.php';
}

spl_autoload_register('autocargadorPages');