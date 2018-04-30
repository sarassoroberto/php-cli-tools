<?php

class FileTool 
{


    public static function create($path,$content=''){

        $p = pathinfo($path);

        $is_file = isset($p['extension']);
        if($is_file){
            $dir = $p['dirname'];
            mkdir($dir);
            file_put_contents($path,$content);
        }

        return $path;
    } 
}