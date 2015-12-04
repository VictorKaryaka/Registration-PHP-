<?php
function autoload($className){
    $extensions = array(".php", ".class.php");
    $paths = array('src\application', 'src\models', 'src\util');
    $className = str_replace("_" , DIRECTORY_SEPARATOR, $className);
    foreach ($paths as $path) {
        $filename = __DIR__ . '\\'. $path . DIRECTORY_SEPARATOR . $className;
        foreach ($extensions as $ext) {
            if (is_file($filename . $ext)) {
                include_once $filename . $ext;
                break;
            }
        }
    }
}