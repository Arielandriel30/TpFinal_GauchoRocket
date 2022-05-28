<?php

class Router
{

private  $configuration;
private $defaultController;
private $methodController;

public function __construct($configuration, $defaultController, $defaultMethod)
{
 $this->configuration = $configuration;
 $this->defaultController = $defaultController;
 $this->defaultMethod = $defaultMethod;

}

public function executeMethodFromController($controllerName, $methodName)
{
    $controller = $this->getControllerFrom($controllerName);
    $method = $this->getValidMethod($controller, $methodName, $this->defaultMethod);
    call_user_func([$controller, $method]);
}

private function getControllerFrom($page)
{
$controllerName = $this->createMethodName($page);
$validController = $this->getValidMethod($this->configuration, $controllerName, $this->defaultController);
return $this->createController($validController);

}

private function getValidMethod($class, $method, $defaultMethod)
{
    return method_exists($class, $method) ? $method : $defaultMethod;
}

private function createMethodName($page): string
{
    return 'get' . ucfirst($page) . 'Controller';
}

private function createController(string $validController)
{
    return call_user_func(array($this->configuration, $validController));
}

}






?>