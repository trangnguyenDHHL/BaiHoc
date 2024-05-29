
<?php
class Application
{
    protected $controller = "ProductController";
    protected $action = "getProductsbyCID";
    protected $params = [];

    function urlProcess()
    {
        if (isset($_SERVER["REQUEST_URI"])){
            return explode( "/", filter_var(trim($_SERVER['REQUEST_URI'], "/")));
        }

    }

    function __construct()
    {
        $arr = $this->urlProcess();
        $n = count($arr);

        #Xử lý controller
        if (file_exists("./MVC/controllers/". $arr[$n-2]. ".php"))#Kiểm tra file còn tồn tại ko, vì class là 1 file
        {
            $this->controller = $arr[$n-2];
            unset ($arr[$n-2]);
        }
        require_once "./MVC/controllers/" . $this->controller .".php";
        $this->controller = new $this->controller;

        if (isset($arr[$n-1]))
        {
            if (method_exists($this->controller, $arr[$n-1]))#Kiểm tra method còn tồn tại ko, vì action là 1 method
            {
            {
                $this->action = $arr[$n-1];
            }
            unset ($arr[$n-1]);
        }

        #Xử lý Params
        $this->params = $arr ? array_values($arr) : [];
        call_user_func_array([new $this->controller, $this->action], $this->params);

    }
    

}
}
?>