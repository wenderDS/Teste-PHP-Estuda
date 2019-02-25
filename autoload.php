<?php
/**
 * Created by PhpStorm.
 * User: Mec
 * Date: 24/02/2019
 * Time: 13:08
 */

    spl_autoload_register(
        /**
         * @param $class
         */
        function ($class) {
            $baseDir = __DIR__ . DIRECTORY_SEPARATOR;

            $file = $baseDir . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

            if (file_exists($file)) {
                require_once $file;
            }
        }
    );
