<!doctype html>
<html lang="ru">
    <head>

        <!-- Подключить Bootstrap для оформления страницы -->

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <!-- Font Awesome - векторные иконки -->

        <link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
        
        <!-- Локальные настройки сайта -->

        <link rel="stylesheet" href="styles.css">
        <link rel="icon" href="interface/logo-o.png">

        <title>Времена года</title>

    </head>
    <body>

        <?php

            require_once "functions.php";

            // Определить глобальную переменную $page_id и сохранить в ней номер текущей страницы

            global $page_id;
            $page_id = ( isset( $_REQUEST['page'] ) ) ? (int) $_REQUEST['page'] : 1;

            // Вывод отладочной информации (полезно для понимания правильности работы скрипта)

            // p( $_REQUEST );
            // p( $page_id );

        ?>

        <!-- Заголовок и меню -->

        <?php include "header.php"; ?>
        <?php include "menu.php"; ?>

        <!-- Основной текст -->

        <div class="container mt-5">

            <?php 
            
                // Определить имя файла текущей страницы
                
                $page = "pages/page" . $page_id . ".php";

                // Если файл существует, то подключить его к документу

                if ( file_exists( $page ) ) {
                    
                    // Страница

                    include $page; 
                    
                    // Навигация и комментарии

                    include "navigation.php";
                    include "comments.php";
                    
                } else {
                    
                    include "404.php";

                }
                                
            ?>

        </div>

        <!-- Нижняя часть страницы -->

        <?php include "footer.php"; ?>


    </body>
</html>