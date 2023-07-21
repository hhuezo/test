<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganizacionesController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WelcomeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|


Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [WelcomeController::class, 'index']);

Route::get('lang/{lang}', [LanguageController::class, 'swap'])->name('lang.swap');



//Route::get('/', [HomeController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/register_member', [WelcomeController::class, 'register_member'])->name('register_member');
Route::post('/store_member', [WelcomeController::class, 'store_member'])->name('store_member');
Route::get('/get_municipio/{id}', [WelcomeController::class, 'get_municipio'])->name('get_municipio');

Route::resource('seguridad/permission', PermissionController::class);
Route::post('seguridad/permission/update_permission', [PermissionController::class,'update_permission']);
Route::resource('seguridad/usuario', UsuarioController::class);
Route::resource('seguridad/role', RoleController::class);
Route::post('seguridad/role/unlink_permission', [RoleController::class,'unlink_permission']);
Route::post('seguridad/role/link_permission', [RoleController::class,'link_permission']);





Route::post('organization/decline', [OrganizationController::class,'decline']);
Route::post('organization/activate', [OrganizationController::class,'activate']);
Route::resource('organization', OrganizationController::class);


Route::post('member/decline', [MemberController::class,'decline']);
Route::post('member/activate', [MemberController::class,'activate']);
Route::resource('member', MemberController::class);

Route::resource('course', CourseController::class);

//quiz
Route::resource('quiz', QuizController::class);

