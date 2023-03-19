<?php

namespace App\Models;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post{

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;
    

    public function __construct($title,$excerpt,$date,$body,$slug)
    {
        $this->title=$title;
        $this->excerpt=$excerpt;
        $this->date=$date;
        $this->body=$body;
        $this->slug=$slug;
    }
    public static function all(){
        // $files= File::files(resource_path("posts/"));
        // return array_map(function($file){
        //     return $file->getContents();
        // }, $files);
        
    return cache()->rememberForever('posts.all', function(){
        return collect(File::files(resource_path("posts")))
        ->map(function ($file){
            return YamlFrontMatter::parseFile($file);
        })
            ->map(function ($doc){
            return new Post(
                $doc->title,
                $doc->excerpt,
                $doc->date,
                $doc->body(),
                $doc->slug,
            );
        })->sortByDesc('date');
    });
    
   
    }
    
    public static function find($test){
    // if(!file_exists($path=resource_path("posts/{$test}.html"))){
    //    throw new ModelNotFoundException();
    // }
    // // return cache()->remember("post.{$test}", now()->addMinutes(2), function() use($path) {
    // //    file_get_contents($path);
    // // });
    // return file_get_contents($path);

        $posts= static::all()->firstWhere('slug', $test);
        if(! $posts){
            throw new ModelNotFoundException();
        }
        return $posts;
    }
}