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
/**
 * vc_component_name 
            vc_component_name.php
            
            admin
                vc_component_name_admin.js
                vc_component_name_admin.css
            
            front
                vc_component_name_front.css
                vc_component_name_front.js
            
            templates
                vc_component_name.twig
 */







class Project
{
    public $name;
    
    public function __construct($name)
    {
        $this->name = $name;
        $this->lname = strtolower($name);
    }

    private function getConfiguration(){
        
        return array(
           "$this->lname/$this->name.php"                  => 'vc_component',
   
           "$this->lname/admin/$this->lname"."_admin.js"       => '',
           "$this->lname/admin/$this->lname"."_admin.css"      => '',
   
           "$this->lname/front/$this->lname"."_front.js"       => '',
           "$this->lname/front/$this->lname"."_front.css"      => '',   
           "$this->lname/front/$this->lname"."_front.twig"     => ''
   
   
       );
    } 



    public function generate(){
        foreach ( $this->getConfiguration() as $folder => $template) {
          
            echo FileTool::create($folder,$template) . "\n";


        }
    }    
}


class Template 
{
    public $data;
    public $path;
    public $template;

    public function __construct($path,$data,$template){
        $this->data = $data;
        $this->path = $path ;
        $this->template = $template;
    }
}

$p = new Project('VC_Carousel');
$p->generate();