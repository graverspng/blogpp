<?php
return [
    "/" => "BlogController@index",
    "/show/{id}" => "BlogController@show",
    "/create" => "BlogController@create",
    "/edit/{id}" => "BlogController@edit",
    "/update/{id}" => "BlogController@update",
    "/delete/{id}" => "BlogController@delete", // Added this route
];
