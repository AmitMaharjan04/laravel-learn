<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use Spatie\YamlFrontMatter\YamlFrontMatter;
use Illuminate\Support\Facades\File;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $posts=Post::all();
//    ddd($posts[3]->date);
    // $posts=collect($files)
    //     ->map(function ($file){
    //         $doc =YamlFrontMatter::parseFile($file);
    //         return new Post(
    //             $doc->title,
    //             $doc->excerpt,
    //             $doc->date,
    //             $doc->body(),
    //             $doc->slug,
    //         );
    //     });

    // $posts=array_map(function($file){
    //     $doc =YamlFrontMatter::parseFile($file);
    //     return new Post(
    //         $doc->title,
    //         $doc->excerpt,
    //         $doc->date,
    //         $doc->body(),
    //         $doc->slug,
    //     );
    // },$files);
    // foreach($files as $file){
    //     $doc =YamlFrontMatter::parseFile($file);
    //     $posts[]=new Post(
    //         $doc->title,
    //         $doc->excerpt,
    //         $doc->date,
    //         $doc->body(),
    //         $doc->slug,
    //     );
    // }
    // ddd($posts[2]->title);
    return view('welcome', [
        'posts' => $posts
    ]);
});

Route::get('/form',function(){
    return view('form');
});

Route::get('/post/{post}',function($test){
    $post=Post::find($test);
    return view('post', [
        'post' => $post
    ]);
});