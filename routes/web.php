<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Userhomecontroller;
use App\Http\Controllers\categoriescontroller;
use App\Http\Controllers\dashboardcontroller;
use App\Http\Controllers\postscontroller;
use App\Http\Controllers\TagController;
use App\Http\Controllers\commentscontroller;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\paymentcontroller;
use App\Http\Controllers\ordercontroller;

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
/*smtp.googlemail.com :host  port:465
mmed40089@gmail.com :username + password:*****
mmed40089@gmail.com :Address
encryption          :ssl
-------
Route::get('/send-mail',function(){
	$details=[
     'title'=>'Mail from Surfside Media',
     'body'=>'this is from testing email using smtp'
	];
	\Mail::to('mmed40089@gmail.com')->send(new \App\Mail\TestMail($details));
	echo 'Email Has Been Sent!';
});
*/
Route::get('/', function () {
    return view('welcome'); 
});
Route::get('/About', function () {
    return view('about'); 
});
Route::get('/faq', function () {
    return view('faq'); 
});
/*same_view[search]*/
/*start bar menu*/
Route::get('/allproducts',[Userhomecontroller::class,'allproducts'])->name('allproducts');
Route::get('/clothes',[Userhomecontroller::class,'clothes'])->name('clothes');
Route::get('/sacs',[Userhomecontroller::class,'sacs'])->name('sacs');
Route::get('/accessoires',[Userhomecontroller::class,'accessoires'])->name('accessoires');
Route::get('/others',[Userhomecontroller::class,'others'])->name('others');
/*end bar menu*/
Route::get('/search',[Userhomecontroller::class,'search'])->name('search');
/*New Payment Controller*/
Route::middleware(['auth:sanctum', 'verified'])->post('/payment',[paymentcontroller::class,'payWithPaypal'])->name('pay');
Route::middleware(['auth:sanctum', 'verified'])->get('/status',[paymentcontroller::class,'status'])->name('status');
Route::middleware(['auth:sanctum', 'verified'])->post('/canceled',[paymentcontroller::class,'canceled'])->name('canceled');
Route::middleware(['auth:sanctum', 'verified'])->get('/canceled',[paymentcontroller::class,'canceled'])->name('canceled');

/*Old Payment Controller 
Route::middleware(['auth:sanctum', 'verified'])->get('/payment',[Userhomecontroller::class,'payment']); */
/*__Get&Post__*/
Route::middleware(['auth:sanctum', 'verified'])->get('/Mycard',[Userhomecontroller::class,'Card']);
Route::middleware(['auth:sanctum', 'verified'])->post('/Mycard',[Userhomecontroller::class,'store']);
Route::get('/Mycard/{id}',[Userhomecontroller::class,'destroy'])->name('trashed.index');
/*__Contact__*/
Route::get('/Contact',[Userhomecontroller::class,'contactpage']);//->name('contact')
Route::middleware(['auth:sanctum', 'verified'])->post('/Contact',[Userhomecontroller::class,'SendToSupport']);
/*__Home__*/
Route::get('home',[Userhomecontroller::class,'index'])->name('home');
Route::get('product/{post}/show',[commentscontroller::class,'show'])->name('details');

Route::middleware(['auth:sanctum', 'verified'])->post('/product/{post}/show',[commentscontroller::class,'store']);

Route::middleware([protectedpage::class])->group(function(){
//Permission Of Admins
/*========CATEGORIES=======*/
/*Route::get('/categories',[categoriescontroller::class,'index']);
Route::get('/categories/create',[categoriescontroller::class,'create']);
Route::post('/categories/create',[categoriescontroller::class,'store']);
Route::get('/categories/{id}',[categoriescontroller::class,'edit']);
Route::post('/categories/{id}',[categoriescontroller::class,'update']);*/
Route::resource('/categories',categoriescontroller::class);
Route::resource('/orders',ordercontroller::class);
/*========POSTS=======*/
Route::resource('/posts',postscontroller::class);
/*========Tags========*/
Route::resource('/tags',TagController::class);
/*========Comments========*/
Route::resource('/comments',commentscontroller::class);
/*========Users========*/
Route::resource('/users',usercontroller::class);
/*__________________________________*/
Route::get('/trashed-posts',[postscontroller::class,'trashed'])->name('trashed.index');
Route::get('/trashed-posts/{id}',[postscontroller::class,'restore'])->name('trashed.restore');
});


Route::middleware(['auth:sanctum', 'verified','protectedpage'])->get('/dashboard',[dashboardcontroller::class,'index'])->name('dashboard');