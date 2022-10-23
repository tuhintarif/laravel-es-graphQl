<?php

use Elastic\Elasticsearch\ClientBuilder;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/es', function () {
    $client = ClientBuilder::create()
        ->setHosts(['elasticsearch:9200'])
        ->build();

    dump($client->info());
});

Route::get('/es/{name}/{age}', function($name , $age){
    $client = ClientBuilder::create()
        ->setHosts(['elasticsearch:9200'])
        ->build();

    $param = [
        'index' => 'test-es',
        'body' => [
            'name' => $name,
            'age' => $age,
        ]
    ];
    $result = $client->index($param);
    dump($param);

});
