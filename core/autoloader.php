<?php
/**
 * Created by PhpStorm.
 * User: Ferencz
 * Date: 11/15/2015
 * Time: 12:20 AM
 */

function searchFile($fileName)
{
    // $appDirectory = new RecursiveDirectoryIterator(dirname(__FILE__).'../../'); 
    $appDirectory = new RecursiveDirectoryIterator(dirname(__FILE__).'/../'); 
    foreach (new RecursiveIteratorIterator($appDirectory) as $filename => $file) {

        if ($file->getFilename() === $fileName . ".php") {
            $path = $filename;
            return $path;
        }
    }
}

function __autoload($className)
{
    $fileLocation = searchFile($className);
    require_once($fileLocation);
}
