<?php

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

// Route::get('/', function () {
//     return view('blog.posts');
// });
//route web

Route::get('/', 'BlogController@landpage')->name('landpage');

Route::get('/showpost/{post}', 'BlogController@showpost')->name('showpost');

Route::get('/posts', 'BlogController@posts')->name('posts');

Route::get('/event/{event}', 'BlogController@event')->name('event');

Route::get('/sd', 'BlogController@sd')->name('sd');
Route::get('/smp', 'BlogController@smp')->name('smp');
Route::get('/sma', 'BlogController@sma')->name('sma');
Route::get('/tba', 'BlogController@tba')->name('tba');
Route::get('/ma', 'BlogController@ma')->name('ma');
Route::get('/galeri', 'BlogController@galeri')->name('galeri');
Route::get('/videos', 'BlogController@videos')->name('videos');

Route::get('/category/{category}', [
	'uses' => 'BlogController@category',
	'as' => 'category'
]);

// Route::get('/dashboard', 'BlogController@dashboard')->name('dashboard');

// // Route::get('/posts', 'BlogController@posts')->name('posts');

// Route::get('/posts/{post}', 'BlogController@post')->name('post');

// Route::get('/postform', 'BlogController@postform')->name('postform');

// Route::get('/postlist', 'BlogController@postlist')->name('postlist');

// Route::get('/agendalist', 'BlogController@agendalist')->name('agendalist');

// Route::get('/agendaform', 'BlogController@agendaform')->name('agendaform');

// Route::get('/linkterkait', 'BlogController@linkterkait')->name('linkterkait');

// Route::get('/linkinfo', 'BlogController@linkinfo')->name('linkinfo');

// Route::get('/iklan', 'BlogController@iklan')->name('iklan');

// Route::get('/agenda', 'BlogController@agenda')->name('agenda');



// Route::get('/webcategory/{category}', [
// 	'uses' => 'BlogController@kategori',
// 	'as' => 'category'
// ]);





Route::get('/admin', 'UserController@admin')->name('admin');

Route::get('/siswa', 'UserController@siswa')->name('siswa');

Route::get('/guru', 'UserController@guru')->name('tenagakerja');

Route::get('/staff', 'UserController@staff')->name('tenagakerja');

Route::post('/blog/{post}/comments', [
    'uses' => 'CommentsController@store',
    'as'   => 'blog.comments'
]);

Route::delete('/blog/{post}/comments', [
    'uses' => 'CommentsController@destroy',
    'as'   => 'comment.delete'
]);

Auth::routes();

Route::group(['middleware' => ['auth', 'checkRole:superadmin']], function(){

Route::resource('/backend/admin', 'Backend\AdminController');


Route::get('/backend/admin/confirm/{users}', [
	'uses' => 'Backend\AdminController@confirm',
	'as' => 'backend.admin.confirm']);

Route::resource('/backend/santri', 'Backend\SantriController');

Route::get('export-santri', [
			'uses' =>'Backend\SantriController@export', 
			'as' => 'backend.santri.export']);

Route::resource('/backend/staff', 'Backend\StaffController');

Route::get('export-staff', [
	'uses' =>'Backend\StaffController@export', 
	'as' => 'backend.staff.export']);

});


Route::group(['middleware' => ['auth', 'checkRole:superadmin,admin']], function(){

Route::get('/home', 'Backend\HomeController@index')->name('home');

Route::resource('/backend/blog', 'Backend\BlogController');

Route::resource('/backend/iklan', 'Backend\IklanController');

Route::resource('/backend/link', 'Backend\LinkController');

Route::resource('/backend/agenda', 'Backend\AgendaController');

Route::resource('/backend/photo', 'Backend\PhotoController');

Route::resource('/backend/video', 'Backend\VideoController');

});


Route::group(['middleware' => ['auth', 'checkRole:superadmin,santri']], function(){


Route::resource('/backend/profilsantri', 'Backend\ProfilSantriController');


Route::get('beranda-santri', [
			'uses' =>'Backend\SantriController@beranda', 
			'as' => 'backend.santri.beranda']);

});

Route::group(['middleware' => ['auth', 'checkRole:superadmin,staff,admin']], function(){


Route::resource('/backend/profilstaff', 'Backend\ProfilStaffController');


Route::get('beranda-staff', [
			'uses' =>'Backend\StaffController@beranda', 
			'as' => 'backend.staff.beranda']);

});


