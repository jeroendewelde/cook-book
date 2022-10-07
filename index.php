<?php
    require 'app.php';

    $route = explode('/', strtolower($_SERVER['REQUEST_URI']));
    array_shift($route);

    // don't template when calling 'api'
    if($route[0] !== 'api') {
        $controller = 'Home';
        $method = 'index';
        $params = [];

?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.6/dist/css/autoComplete.min.css">

        <link rel="stylesheet" href="<?= BASE_URL; ?>/css/main.css">
        <title><?php 
            if(isset($title)) {
                echo $title;
            } else {
                echo 'CookBook';
            }
            ?>
        </title>
    </head>
    <body>
        <?php include_once BASE_DIR . '/views/_templates/_partials/header.php'; ?>
        <main>
<?php
    }

    // Check if there is a query & split up route
    if(isset($route[0]) && $route[0] != '') {
        $queryCheck = explode('?', $route[0]);

        if(count($queryCheck) > 1) {
            $query = $queryCheck[1];
            $controller = $queryCheck[0];
        } else {
            $controller = ucfirst(array_shift($route));
        }

        if(isset($route[0])) {
            $method = array_shift($route);  
        }
    
        $params = $route;
    } 

    $controller_path =  BASE_DIR . '/controllers/' . $controller . '.php';
    if(!file_exists($controller_path)) {
        // echo 'TODO: 404 inladen';
        include_once BASE_DIR . '/views/_templates/_partials/404.php';
        exit;
    }

    require_once $controller_path;


    $controller_name = $controller . 'Controller';
    $title = $controller;

    $controller = new $controller_name();

    $controller->{$method}($params);
?>

        </main>    
        <?php include_once BASE_DIR . '/views/_templates/_partials/footer.php'; ?>
        <script src="<?= BASE_URL; ?>/js/main.js"></script>
    </body>
</html>