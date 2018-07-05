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
    return redirect('/proyek/index');
});


Auth::routes();

Route::get('/homepage', 'HomeController@homepage')->name('homepage');
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/cart', 'CartController');

Route::prefix('admin')->group(function(){
    Route::get('/create', 'adminController@tambahAdmin') -> name('admin.create');
    Route::post('/create', 'adminController@tambahAdminStore') -> name('admin.store');
    Route::get('/proyek', 'adminController@adminProyek') -> name('admin.proyek');
    Route::get('/proyekKonfirmasi', 'adminController@proyekKonfirmasi') -> name('admin.proyekKonfirmasi');
    Route::get('/proyekDone', 'adminController@proyekDone') -> name('admin.proyekDone');
    Route::get('/{id}/listInvestor', 'adminController@listInvestor') -> name('admin.listInvestor');
    Route::get('/{id}/listInvestorDone', 'adminController@listInvestorDone') -> name('admin.listInvestorDone');
    Route::get('/member', 'adminController@adminMember') -> name('admin.member');
    Route::get('/{id}/editMember', 'adminController@editMember') -> name('admin.editMember');
    Route::patch('/{id}/editMember', 'adminController@editAdmin') -> name('admin.editAdmin');
    Route::get('/login', 'Auth\adminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\adminLoginController@login')->name('admin.login.submit');
    Route::get('/konfirmasi', 'adminController@konfirmasi')->name('admin.konfirmasi');
    Route::get('/sudahKonfirmasi', 'adminController@sudahKonfirmasi')->name('admin.sudahKonfirmasi');
    Route::patch('/{id}/konfirmasi', 'adminController@ubahKonfirmasi') -> name('admin.ubahKonfirmasi');
    Route::patch('/{id}/proyek', 'adminController@proyekSelesai') -> name('admin.proyekSelesai');
    Route::delete('/{id}/proyek', 'adminController@destroyProyek') -> name('admin.deleteProyek');
    Route::delete('/{id}/member', 'adminController@destroyMember') -> name('admin.deleteMember');
    Route::get('/', 'adminController@index')->name('admin.dashboard');
});

Route::get('/proyek/create', 'proyekController@create') -> name('proyek.create');
Route::post('/proyek/create', 'proyekController@store') -> name('proyek.store');
Route::get('/proyek/index', 'proyekController@index') -> name('proyek.index');
Route::get('/proyek/{id}/product', 'proyekController@product') -> name('proyek.product');
Route::get('/proyek/listProyek', 'proyekController@listProyek') -> name('proyek.listProyek');
Route::patch('/proyek/{id}/listProyek', 'proyekController@uploadBukti') -> name('proyek.uploadBukti');
Route::get('/proyek/{id}/listInvestor', 'proyekController@listInvestor') -> name('proyek.listInvestor');
Route::get('/proyek/{id}/editProyek', 'proyekController@editProyek') -> name('proyek.editProyek');
Route::patch('/proyek/{id}/updateProyek', 'proyekController@updateProyek') -> name('proyek.updateProyek');

Route::get('/proyek/{id}/investasi', 'investasiController@investasi') -> name('proyek.investasi');
Route::get('/cart', 'investasiController@cart') -> name('cart.index');
Route::get('/bukti', 'investasiController@bukti') -> name('bukti');
Route::get('/cart/{id}/shipping', 'investasiController@shipping') -> name('cart.shipping');
Route::patch('/cart/{id}/checkout', 'investasiController@update') -> name('cart.checkout');
Route::get('/cart/bank', 'investasiController@bank') -> name('cart.bank');
Route::get('/cart/uploadbukti', 'investasiController@uploadbukti')->name('cart.uploadbukti');
// Route::get('/cart/bukti', 'investasiController@bukti') -> name('cart.bukti');
Route::patch('/bukti/{id}', 'investasiController@uploadBukti') -> name('uploadBukti');

