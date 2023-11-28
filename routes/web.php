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
use App\Http\Controllers\catalog\ChurchQuestionController;
use App\Http\Controllers\catalog\CohorteController;
use App\Http\Controllers\catalog\CourseController as CatalogCourseController;
use App\Http\Controllers\catalog\OrganizationStatusController;
use App\Http\Controllers\catalog\QuestionController;
use App\Http\Controllers\catalog\MemberStatusController;
use App\Http\Controllers\catalog\FilePerCourseController;
use App\Http\Controllers\catalog\GrupoController;
use App\Http\Controllers\catalog\IglesiaController;
use App\Http\Controllers\catalog\MemberController as CatalogMemberController;
use App\Http\Controllers\catalog\OrganizationController as CatalogOrganizationController;
use App\Http\Controllers\catalog\RegionController;
use App\Http\Controllers\catalog\SedeController;
use App\Http\Controllers\catalog\UserController;
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
    return view('auth/message');
});

*/

Route::get('/', [WelcomeController::class, 'index']);


//registro iglesia

Route::get('/registrar', [RegisterController::class, 'index']);
Route::get('/register_edit/{id}', [RegisterController::class, 'register_edit']);
Route::post('/iglesia_actualizar', [RegisterController::class, 'actualizar_registro']);
Route::post('/iglesia/registro_respuesta', [RegisterController::class, 'registro_respuesta']);
Route::post('/iglesia/registro_iglesia', [RegisterController::class, 'registro_iglesia']);
Route::get('/iglesia/back_page', [RegisterController::class, 'back_page'])->name('back_page');


//registro participante
Route::get('/register_member', [MemberController::class, 'register_member'])->name('register_member');
Route::post('/store_member', [WelcomeController::class, 'store_member'])->name('store_member');
Route::get('registro_participantes/{iglesia}/{grupo}', [WelcomeController::class, 'registro_participantes']);



//seguridad
Route::resource('seguridad/permission', PermissionController::class);
Route::post('seguridad/permission/update_permission', [PermissionController::class, 'update_permission']);
Route::resource('seguridad/user', UsuarioController::class);

Route::post('seguridad/user/attach_roles', [UsuarioController::class, 'attach_roles']);
Route::post('seguridad/user/dettach_roles', [UsuarioController::class, 'dettach_roles']);


Route::resource('seguridad/role', RoleController::class);


Route::post('seguridad/role/unlink_permission', [RoleController::class, 'unlink_permission']);
Route::post('seguridad/role/link_permission', [RoleController::class, 'link_permission']);





Route::get('iglesia/datos_iglesia', [IglesiaController::class, 'datos_iglesia']);
Route::get('register_member_leader', [MemberController::class, 'register_member_leader']);
Route::post('attach_new_member', [WelcomeController::class, 'attach_new_member']);



Route::get('consulta_grupos/{id_grupo_iglesia}', [GrupoController::class, 'consulta_grupos']);

Route::get('reporte_grupos/{id_grupo_iglesia}', [GrupoController::class, 'reporte_grupos']);
Route::get('reasigna_grupos/{idpersona}', [GrupoController::class, 'reasigna_grupos']);
Route::post('update_group_member/{idpersona}', [MemberController::class, 'update_member_group']);





//Route::get('/', [WelcomeController::class, 'show']);

Route::get('lang/{lang}', [LanguageController::class, 'swap'])->name('lang.swap');


//Route::get('/', [HomeController::class, 'index']);
Route::get('/get_map/{id}', [WelcomeController::class, 'get_map']);
Route::get('/get_dep/{id}', [WelcomeController::class, 'get_dep']);
Route::get('/get_departamento/{id}', [WelcomeController::class, 'get_departamento']);












Route::post('/upload', [WelcomeController::class, 'store_file'])->name('dropzone.store');



Route::post('/iglesia/modificar_estado', [IglesiaController::class, 'modificar_estado']);


Route::post('catalog/iglesia/add_preguntaresp', [IglesiaController::class, 'add_preguntaresp']);
Route::post('catalog/iglesia/attach_preguntas', [IglesiaController::class, 'attach_preguntas']);
Route::post('catalog/iglesia/dettach_preguntas', [IglesiaController::class, 'dettach_preguntas']);


Route::post('catalog/Iglesiauser/dettach_iglesiauser', [UserController::class, 'dettach_iglesiauser']);
Route::post('catalog/Iglesiauser/attach_iglesiauser', [UserController::class, 'attach_iglesiauser']);

Route::post('catalog/grupo/dettach_iglesiagrupo', [GrupoController::class, 'dettach_iglesiagrupo']);
Route::post('catalog/grupo/attach_iglesiagrupo', [GrupoController::class, 'attach_iglesiagrupo']);

Route::post('catalog/iglesia/dettach_grupos', [IglesiaController::class, 'dettach_grupos']);
Route::post('catalog/iglesia/attach_grupos', [IglesiaController::class, 'attach_grupos']);


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/confirma', [HomeController::class, 'confirmacion'])->name('confirma');




Route::get('/test', [HomeController::class, 'test'])->name('test');

Route::get('/get_municipio/{id}', [WelcomeController::class, 'get_municipio'])->name('get_municipio');


Route::get('/get_grupo/{fecha}', [GrupoController::class, 'get_grupo'])->name('get_grupo');





Route::post('organization/decline', [OrganizationController::class, 'decline']);
Route::post('organization/activate', [OrganizationController::class, 'activate']);
Route::resource('organizations', OrganizationController::class);


Route::post('member/decline', [MemberController::class, 'decline']);
Route::post('member/activate', [MemberController::class, 'activate']);
Route::resource('members', MemberController::class);







Route::resource('courses', CourseController::class);
Route::post('course/upload_file', [CourseController::class, 'upload_file']);

//Quiz
Route::post('catalog/question/attach_questions', [QuestionController::class, 'attach_questions']);
Route::post('catalog/question/dettach_questions', [QuestionController::class, 'dettach_questions']);
Route::post('catalog/question/correct_answer', [QuestionController::class, 'correct_answer']);
Route::post('catalog/question/delete_correct_answer', [QuestionController::class, 'delete_correct_answer']);
Route::post('catalog/add_answer', [AnswersController::class, 'store']);

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

Route::post('/images', [IglesiaController::class, 'copiarImagen']);

Route::resource('catalog/iglesia', IglesiaController::class);

Route::resource('catalog/wizard_church_questions', WizardQuestionsController::class);

Route::resource('catalog/answerreg', ChurchQuestionController::class);

Route::resource('catalog/Iglesiauser', UserController::class);

Route::resource('catalog/region', RegionController::class);

Route::resource('catalog/sede', SedeController::class);

Route::resource('catalog/grupo', GrupoController::class);

Route::resource('catalog/member_status', MemberStatusController::class);


Route::resource('catalog/member', CatalogMemberController::class);

Route::resource('catalog/FilePerCourse', FilePerCourseController::class);

Route::resource('catalog/grupo', GrupoController::class);
