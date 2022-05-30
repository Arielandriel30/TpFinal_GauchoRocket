<?php

class MustachePrinter {

    private $mustache;
    private $viewPath;

    public function __construct($viewPath){
        $this->viewPath = $viewPath;
        Mustache_Autoloader::register();
        $this->mustache = new Mustache_Engine(
            [
                'partials_loader' => new Mustache_Loader_FilesystemLoader( $viewPath )
            ]);
    }

    public function generateView($template , $data = []){
        $contentAsString =  file_get_contents($this->viewPath . "/" .$template);
        echo  $this->mustache->render($contentAsString, $data);
    }
}