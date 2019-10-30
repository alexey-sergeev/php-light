<?php

//
// Набор функций для примера простого сайта на PHP
//
//

// 
// Система комментариев
// 
// Данный пример реализован на основе хранения информации в файлах. Это сделано для
// иллюстрации общих принципов управления комментариями, а также принципов разработки сайтов
// на PHP. Но нет никаких причин использовать это в настоящих проектах. Хорошую систему
// комментариев можно сделать только на основе СУБД
// 


// 
// Отобразить комментарии для текущей страницы
// 

function show_comments()
{
    // Проверить наличие нового комментария (добавить к текущим, если есть)

    get_new_comment();

    // Получить имя файла, где хранятся комментарии для данной страницы

    global $page_id;
    $csv = "comments/page" . $page_id . "-comments.csv";

    // Если файл есть, то отобразить комментарии

    if ( file_exists( $csv ) ) {

        // Получить массив строк из файла

        $arr = file( $csv );

        // Навести в массиве порядок (удалить пробелы по концам и пустые строки)

        $arr = array_map( 'trim', $arr );
        $arr = array_diff( $arr, array( '' ) );
        
        // Перебрать все комментарии и вывести их на экран
        
        foreach ( $arr as $comment_data ) {
            
            // Построить массив элементов комментария
            
            $items = explode( '::', $comment_data );

            // Сформировать данные комментария

            $name = trim( $items[0] );
            $avatar = 'avatars/' . trim( $items[1] );
            $date = trim( $items[2] );
            $comment = trim( $items[3] );

            // Подключить шаблон комментария, чтобы вывести его на экран

            include "templates/comment.php";

        }

    } else {

        echo '<p>Пока нет ни одного комментария</p>';

    }
    
}    



// 
// Сохранить новый комментарий, если он есть
// 

function get_new_comment()
{
    // Если кнопка 'new_comment' не нажималась, то сразу выйти (ничего не делать)

    if ( empty( $_REQUEST['new_comment'] ) ) return false;

    // Кнопка нажималась. Сохраняем новый комментарий

    global $page_id;
    $csv = "comments/page" . $page_id . "-comments.csv";

    $name = trim( $_REQUEST['name'] );
    $avatar = 'mistery-man.png';
    $date = 'none';
    $comment = trim( $_REQUEST['comment'] );
    
    // Сформировать строку для записи в файл

    $str = $name . "::" . $avatar . "::" . $date . "::" . $comment . "\n";

    // Дописать строку в csv-файл
    
    $result = file_put_contents( $csv, $str, FILE_APPEND | LOCK_EX );

    return (boolean) $result;
}



// 
// Сформировать блок радиокнопок для выбора аватарки
// 

function show_radio_avatars()
{

    // Получить список всех файлов в каталоге аватарок

    $files = scandir( "avatars" );

    // Перебрать файлы и сформировать радиокнопки

    foreach ( $files as $file ) {

        // Если имя не заканчивается на ".png", то этот файл не учитывать

        if ( ! preg_match( '/\.png$/', $file ) ) continue;

        // Подключить шаблон радиокнопки, чтобы вывести ее на экран

        include "templates/radio-avatar.php";

    }

}


// 
// Сервисные функции
// 


// 
// Вывод отладочной информатции
// 

function p( $data )
{

    print_r( "<pre>" );
    print_r( $data );
    print_r( "</pre>" );

}

?>
