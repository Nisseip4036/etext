<?php

spl_autoload_register(function($class) {

    if($class != "usuarios\PDO") {

        $baseDir = __DIR__.'/classes/';

        $file = $baseDir.str_replace('\\', '/', $class).'.php';
            
        if(file_exists($file)) {

            require $file;

        }
    
    }

});