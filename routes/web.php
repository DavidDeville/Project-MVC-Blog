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

Route::get('/', function () {
    return view('welcome');
});

Route::get('billets/new', function () {
    return view('billets/new', ['user_type' => Auth::user()->type]);
})->name('billets');

// Route::get('billets/{id}/editBillet', array('as' => 'edit', function($id = null) {
//     if($id == null) {
//         return view('welcome');
//     }
//     else {
//         echo "id non trouvé";
//     }
// }));

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/delete', 'UserController@delete_user')->name('delete');

Route::post('billets/new', 'BilletsController@create_article')->name('billets');

Route::get('billets/read', 'BilletsController@read_all_articles')->name('billets_read');

Route::get('billets/{id}/edit', 'BilletsController@display_edit')->name('edit_display');

Route::get('billet/{id}', 'BilletsController@display_comments_page')->name('display_comments');

Route::post('billet/{id}', 'CommentsController@send_comment')->name('create_comment');

Route::post('billets/{id}/editBillet', 'BilletsController@billet_edit')->name('edit');

Route::post('billets/{id}/delete', 'BilletsController@destroy')->name('billets_delete');

/**
 * Admin routes
 */

Route::get('/home', 'HomeController@index')    
->name('home');

Route::get('/admin', 'AdminController@display_user_infos')->middleware('is_admin')->name('admin');

Route::get('/admin/users', 'AdminController@display_users')->middleware('is_admin')->name('admin_users');

Route::get('/admin/billets', 'AdminController@display_users_billets')->middleware('is_admin')->name('admin_billets');

Route::get('/admin/comments', 'AdminController@display_users_comments')->middleware('is_admin')->name('admin_comments');

Route::post('/admin/users', 'AdminController@modify_users')->middleware('is_admin')->name('admin_modify');