<?php

class Router
{
    /**
     * @var string $controllerName
     */
    private $controllerName;

    /**
     * @param $controller
     *
     * @throws Exception
     */
    public function dispatch($controller)
    {
        $this->controllerName = sprintf('%sRest', ucfirst($controller));
        $requestMethod = strtolower($_SERVER['REQUEST_METHOD']);
        $requestAction = sprintf('%sAction', $requestMethod);

        $controllerClass = $this->buildController();

        if (!$this->isValidRequestActionForController($requestAction)) {
            throw new Exception(sprintf('The request method "%s" is not valid.', $requestMethod));
        }

        echo $controllerClass->$requestAction();
    }

    /**
     * @return mixed
     *
     * @throws Exception
     */
    private function buildController()
    {
        if (!class_exists($this->controllerName)) {
            throw new Exception(sprintf('The controller %s is not defined', $this->controllerName));
        }

        $controllerClass = new $this->controllerName();

        return $controllerClass;
    }

    /**
     * @param string $requestAction
     *
     * @return bool
     */
    private function isValidRequestActionForController($requestAction)
    {
        return in_array($requestAction, get_class_methods($this->controllerName));
    }
}
