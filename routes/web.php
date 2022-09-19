<?php

use App\Http\Controllers\AdsController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookChapterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\ApiController;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MyBookController;
use App\Http\Controllers\MyCategoryController;
use App\Http\Controllers\MyPostController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PublicRelationController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\SitemapController;
use App\Models\Book;
use App\Models\Role;
use App\Models\UserData;
use App\Models\UserSuggestion;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//option function
Route::get('/funct', function(){
	Artisan::call('storage:link');
});

//sitemap
Route::get('/sitemappost', [SitemapController::class, 'index']);

// reader routes or homepage user reader
Route::get('/', [PostController::class, 'index']);
Route::get('/search', [PostController::class, 'search']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::post('/contact/sendmessage', [PageController::class, 'sendMessage']);
Route::get('/read/{post:slug}', [PostController::class, 'read'])->name('read');
Route::get('/latest', [PostController::class, 'latestNews']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/{category:slug}', [CategoryController::class, 'allpost']);
Route::get('/books', [BookController::class, 'index']);
Route::get('/books/{book:slug}', [BookController::class, 'allchapter']);
Route::get('/books/chapters/{bookchapter:slug}', [BookController::class, 'readChapter']);

// api
Route::get('/api/trending', [ApiController::class, 'trending']);
Route::get('/api/newpost', [ApiController::class, 'newPost']);

//user data
Route::post('/user/changepassword', [UserDataController::class, 'changePassword'])->middleware('auth');
Route::post('/user/changerole/{user:id}', [UserDataController::class, 'changeRole'])->middleware('auth');
Route::resource('/user', UserDataController::class)->middleware(['auth', 'verified']);

// admin routes
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('founder');

//*founder
Route::get('/founder/user/allauthor', [FounderController::class, 'allauthor'])->middleware('founder');
Route::get('/founder/user/alluser', [FounderController::class, 'alluser'])->middleware('founder');
Route::post('/founder/user/rekrut/{user:username}', [FounderController::class, 'recruit'])->middleware('founder');

Route::get('/founder/post/all', [FounderController::class, 'allpost'])->middleware('founder');
Route::post('/founder/post/publish/{post:slug}', [FounderController::class, 'publishPost'])->middleware('founder');
Route::delete('/founder/post/delete/{post:slug}', [FounderController::class, 'deletePost'])->middleware('founder');
Route::get('/founder/readpost/{post:slug}', [FounderController::class, 'readpost'])->middleware('founder');

Route::get('/founder/post/book/all', [FounderController::class, 'allbook'])->middleware('founder');
Route::get('/founder/post/book/show/{book:slug}', [FounderController::class, 'showBook'])->middleware('founder');
Route::get('/founder/post/book/showchapter/{bookchapter:slug}', [FounderController::class, 'showChapter'])->middleware('founder');
Route::post('/founder/post/book/publish/{book:slug}', [FounderController::class, 'publishBook'])->middleware('founder');
Route::delete('/founder/post/book/delete/{book:slug}', [FounderController::class, 'deleteBook'])->middleware('founder');

//*public relation
Route::get('/relation/usersuggestions', [PublicRelationController::class, 'index'])->middleware('public_relation');
Route::get('/relation/showusersuggestion/{userSuggestion:id}', [PublicRelationController::class, 'showUserSuggestion'])->middleware('public_relation');
Route::delete('/relation/deleteusersuggestion/{userSuggestion:id}', [PublicRelationController::class, 'deleteUserSuggestion'])->middleware('public_relation');

Route::get('/founder/post/allcategory', [FounderController::class, 'allcategory'])->middleware('founder');
Route::post('/founder/post/activatecategory/{category:slug}', [FounderController::class, 'activatecategory'])->middleware('founder');
Route::resource('/roles', RoleController::class)->middleware('founder');

//*author
//apply category
Route::get('/mycategory/categories/createSlug', [MyCategoryController::class, 'createSlug'])->middleware('auth');
Route::resource('/mycategory/categories', MyCategoryController::class)->middleware('auth')->except('show');
//news or post
Route::get('/mypost/posts/createSlug', [MyPostController::class, 'createSlug'])->middleware('auth');
Route::resource('/mypost/posts', MyPostController::class)->middleware('auth');

//book
Route::get('/mybook/books/createSlug', [MyBookController::class, 'createSlug'])->middleware('auth');
Route::resource('/mybook/books', MyBookController::class)->middleware('auth');
//chapter
Route::get('/mybook/chapters/createSlug', [BookChapterController::class, 'createSlug'])->middleware('auth');
Route::resource('/mybook/chapters', BookChapterController::class)->middleware('auth');


//periklanan
Route::delete('ads/{ads}', [AdsController::class, 'destroy'])->middleware('designer'); //solusi ads null
Route::resource('/ads', AdsController::class)->middleware('designer');
