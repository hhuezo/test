<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrganizationController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\catalog\AnswersController;
use App\Http\Controllers\catalog\CohorteController;
use App\Http\Controllers\catalog\CourseController as CatalogCourseController;
use App\Http\Controllers\catalog\OrganizationStatusController;
use App\Http\Controllers\catalog\QuestionController;
use App\Http\Controllers\catalog\MemberStatusController;
use App\Http\Controllers\catalog\FilePerCourseController;
use App\Http\Controllers\catalog\IglesiaController;
use App\Http\Controllers\catalog\MemberController as CatalogMemberController;
use App\Http\Controllers\catalog\OrganizationController as CatalogOrganizationController;
use App\Http\Controllers\catalog\QuizController as CatalogQuizController;
use App\Http\Controllers\catalog\RegionController;
use App\Http\Controllers\catalog\SedeController;
use App\Http\Controllers\catalog\WizardQuestionsController;

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
Route::get('/get_map/{id}', [WelcomeController::class, 'get_map']);
Route::get('/get_dep/{id}', [WelcomeController::class, 'get_dep']);
Route::post('/iglesia_actualizar', [IglesiaController::class, 'actualizar_registro']);
Route::get('/iglesia/back_page', [IglesiaController::class, 'back_page'])->name('back_page');
Route::post('/iglesia/registro_respuesta', [IglesiaController::class, 'registro_respuesta']);
Route::post('/iglesia/registro_iglesia', [IglesiaController::class, 'registro_iglesia']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/registrar',[RegisterController::class,'index']);
Route::get('/register_edit/{id}',[IglesiaController::class, 'register_edit']);


Route::get('/test', [HomeController::class, 'test'])->name('test');
Route::get('/register_member', [WelcomeController::class, 'register_member'])->name('register_member');
Route::post('/store_member', [WelcomeController::class, 'store_member'])->name('store_member');
Route::get('/get_municipio/{id}', [WelcomeController::class, 'get_municipio'])->name('get_municipio');


Route::resource('seguridad/permission', PermissionController::class);
Route::post('seguridad/permission/update_permission', [PermissionController::class, 'update_permission']);
Route::resource('seguridad/usuario', UsuarioController::class);
Route::resource('seguridad/role', RoleController::class);
Route::post('seguridad/role/unlink_permission', [RoleController::class, 'unlink_permission']);
Route::post('seguridad/role/link_permission', [RoleController::class, 'link_permission']);

Route::resource('courses', CourseController::class);
Route::post('course/upload_file', [CourseController::class, 'upload_file']);

Route::post('organization/decline', [OrganizationController::class, 'decline']);
Route::post('organization/activate', [OrganizationController::class, 'activate']);
Route::resource('organizations', OrganizationController::class);


Route::post('member/decline', [MemberController::class, 'decline']);
Route::post('member/activate', [MemberController::class, 'activate']);
Route::resource('members', MemberController::class);


//Quiz
Route::post('catalog/question/attach_questions',[QuestionController::class,'attach_questions']);
Route::post('catalog/question/dettach_questions',[QuestionController::class,'dettach_questions']);
Route::post('catalog/question/correct_answer',[QuestionController::class, 'correct_answer']);
Route::post('catalog/question/delete_correct_answer',[QuestionController::class, 'delete_correct_answer']);
Route::post('catalog/add_answer',[AnswersController::class, 'store']);

Route::resource('Quiz', QuizController::class);

// //section
// Route::resource('section',SectionCourse::class);

//catalogo
Route::resource('catalog/question', QuestionController::class);

Route::resource('catalog/organization_status', OrganizationStatusController::class);

Route::resource('catalog/answer', AnswersController::class);

Route::resource('catalog/organization', CatalogOrganizationController::class);

//Route::resource('catalog/Quiz', CatalogQuizController::class);

Route::resource('catalog/course', CatalogCourseController::class);

Route::resource('catalog/cohorte', CohorteController::class);

Route::post('/images', [IglesiaController::class,'copiarImagen']);

Route::resource('catalog/iglesia', IglesiaController::class);

Route::resource('catalog/wizard_church_questions', WizardQuestionsController::class);

Route::resource('catalog/region', RegionController::class);

Route::resource('catalog/sede', SedeController::class);

Route::resource('catalog/MemberStatus', MemberStatusController::class);


Route::resource('catalog/member', CatalogMemberController::class);

Route::resource('catalog/FilePerCourse', FilePerCourseController::class);

