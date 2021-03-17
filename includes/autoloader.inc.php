<?php 
    spl_autoload_register('autoLoader');

    function autoLoader($className) {
        $path = "classes/";
        $extension = ".class.php";
        $fullPath = $path . $className . $extension;

        if (!file_exists($fullPath)) {
            return false;
        }

        include_once $fullPath;
    }
?>