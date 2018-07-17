    <?php

    class Router
    {

        private $routes;

        public function __construct()
        {
            $routesPath = ROOT . '/config/routes.php';
            $this->routes = require_once($routesPath);

        }

        public function getURI()
        {
            if (!empty($_SERVER['REQUEST_URI'])) {
                return trim($_SERVER['REQUEST_URI'],'/');
            }
        }

        public function run()
        {
            $uri = $this->getURI();

            //Get each pattern of existing URI => controllers/action
            foreach ($this->routes as $uriPattern => $path) {

                if (preg_match("~$uriPattern~", $uri)) {

                    $internalRoutes = preg_replace("~$uriPattern~", $path, $uri);

                    $segments = explode('/', $internalRoutes);

                    $controllerName = array_shift($segments) . 'Controller';
                    $controllerName = ucfirst($controllerName);

                    $actionName = 'action' . ucfirst(array_shift($segments));

                    $parameters = $segments;

                    $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';

                    //Include file with controllers class
                    if (file_exists($controllerFile)) {
                        include_once($controllerFile);
                    }

                    $controllerObject = new $controllerName;

                    session_start();

                    $result = call_user_func_array(array($controllerObject, $actionName), $parameters);

                    if($result!=null){
                        break;
                    }
                }
            }
        }

    }