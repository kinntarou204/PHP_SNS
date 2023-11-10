<?php 
class View
{
    static string $layout_name = 'app';
    
    static function render(string $name, array $data = null)
    {
        $layout = LAYOUT_DIR . self::$layout_name . '.layout.php';
        $view_path = VIEW_DIR . "{$name}.view.php";

        if ($data) extract($data);

        include $layout;
    }
}
?>