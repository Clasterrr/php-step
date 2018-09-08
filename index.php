<?php

//echo 'Hi, Im MacOS X';

$array = ['str' => 23, 'str2' => 'value'];

function toArray($firstArg, $secondArg): ?array {
    return [
        $firstArg => $secondArg
    ];
}

//print_r(toArray(25,32));

print_r($_GET);
echo '<br>';

if (isset($_GET['get_product'])) {
    $response = [
        'name' => 'Product 1',
        'author' => 'Lev'
    ];

    print_r(json_encode($response));
}
if (isset($_GET['get_category'])) {
    $response = [
        'name' => 'Category 1',
        'author' => 'Lev'
    ];

    print_r(json_encode($response));
}

//print_r($_POST);
//echo '<br>';
//echo '<pre>';
//print_r($_SERVER);
//echo '<br>';
////print_r($_SESSION);
//echo '<br>';
//echo '<br>';
//print_r($_FILES);
//echo '<br>';
//print_r($_REQUEST);
//echo '<br>';

//var_dump($array);
//foreach ($array as $key => $value) {
//    $serializedValue = [];
//
//    if (is_array($value)) {
//        $newValue =  serialize($value);
//        print_r($newValue);
//
//        $value = [];
//    } else {
//        print_r($value);
//        echo '<br>';
//        print_r($key);
//        echo '<br>';
//        echo '<br>';
//    }
//}
//echo '<br>';
//var_dump($array);