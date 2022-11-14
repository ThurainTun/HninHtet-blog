<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;

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
    return view('welcome',[
        'blogs'=> Blog::all()
    ]);
});

Route::get('/blogs/{blogName}', function ($slug) {
    // $blogData = Blog::find($slug);
    return view('blog',[
        'blog' =>  Blog::find($slug)
    ]);
})->where('blogName','[A-z\d\-_]+');

/* wildcard */
// Route::get('/blogs/{blogName}', function ($slug) {
//     // dd($slug);
//     $path = __DIR__."/../resources/blogs/$slug.html";
//     if (!file_exists($path)) {
//         /* 3 helper functions */
//         //dd('hit');
//         // abort(404);
//        return redirect('/');
//     };
//     /* Catching cache()->remember */
//     $blogData= cache()->remember("posts.$slug",now()->addMinutes(2),function() use ($path){
//         print_r('filegetcontents');
//         return  file_get_contents($path);
//     });
    
//     return view('blog',[
//         'blog' =>  $blogData //$blog = '<h1>Hello</h1>'
//     ]);
// })->where('blogName','[A-z\d\-_]+');
