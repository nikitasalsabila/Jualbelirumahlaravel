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

//halaman depan
//------------------------------------------------------------------------
Route::get('/','DepanController@index')->name('depan.home');

// Halaman Kontak
Route::get('/kontak','DepanController@kontak')->name('depan.kontak');

// Private Message
Route::get('/pm/{sender_id}/{receiver_id}','PrivateMessageController@index')->name('depan.pm');
Route::post('/pm/{sender_id}/{receiver_id}','PrivateMessageController@store')->name('depan.pm.store');
Route::get('/pm', 'PrivateMessageController@userCekPesan')->name('depan.pm.cek');

// Halaman Pengaduan
Route::resource('/pengaduan', 'PengaduanController');

// autentikasi
//------------------------------------------------------------------------
Auth::routes();

// halaman user
//------------------------------------------------------------------------
// Route::get('/home', 'HomeController@index');
Route::get('/profil/{id}','ProfilController@index')->name('depan.profil');
Route::put('/profil/{id}','ProfilController@ubahprofil')->name('depan.profil.ubahprofil');
Route::post('/profil/{id}','ProfilController@tambahkomentar')->name('depan.profil.tambahkomentar');
Route::get('/profil/{id}/pemesanankos','ProfilController@pemesanankos')->name('depan.profil.pemesanankos');
Route::get('/profil/{id}/pemesanankontrakan','ProfilController@pemesanankontrakan')->name('depan.profil.pemesanankontrakan');
Route::get('/profil/{id}/riwayat','ProfilController@riwayatpemesanan')->name('depan.profil.riwayatpemesanan');

// halaman depan kontrakan
//------------------------------------------------------------------------
Route::get('/kontrakan/Cikampek', 'FilterKontrakanController@tampilPontianakKota')->name('kontrakan.pontianakkota');
Route::get('/kontrakan/Jatisari', 'FilterKontrakanController@tampilPontianakUtara')->name('kontrakan.pontianakutara');
Route::get('/kontrakan/KarawangBarat', 'FilterKontrakanController@tampilPontianakTimur')->name('kontrakan.pontianaktimur');
Route::get('/kontrakan/Klari', 'FilterKontrakanController@tampilPontianakBarat')->name('kontrakan.pontianakbarat');
Route::get('/kontrakan/CilamayaWetan', 'FilterKontrakanController@tampilPontianakSelatan')->name('kontrakan.pontianakselatan');
Route::get('/kontrakan/KarawangTimur', 'FilterKontrakanController@tampilPontianakTenggara')->name('kontrakan.pontianaktenggara');
Route::resource('/kontrakan','KontrakanController');
Route::resource('/komentarkontrakan','KomentarKontrakanController');
Route::get('/orderkontrakan/{id}', 'OrderKontrakanController@tambahpemesanan')->name('kontrakan.tambahpemesanan');
Route::post('/orderkontrakan/{id}', 'OrderKontrakanController@store')->name('kontrakan.simpan');
Route::put('/orderkontrakan/{id}/terima', 'OrderKontrakanController@terima')->name('kontrakan.terima');
Route::delete('/orderkontrakan/{id}/tolak', 'OrderKontrakanController@tolak')->name('kontrakan.tolak');
Route::put('/orderkontrakan/{id}/hapuspemesan', 'OrderKontrakanController@hapuspemesan')->name('kontrakan.hapuspemesan');
Route::get('/kontrakansaya', 'DepanController@kontrakansaya')->name('kontrakan.saya');

// halaman depan kos
//------------------------------------------------------------------------
// Route::get('/rumahkos/pontianakkota', 'FilterKosController@tampilPontianakKota')->name('kos.pontianakkota');
// Route::get('/rumahkos/pontianakutara', 'FilterKosController@tampilPontianakUtara')->name('kos.pontianakutara');
// Route::get('/rumahkos/pontianaktimur', 'FilterKosController@tampilPontianakTimur')->name('kos.pontianaktimur');
// Route::get('/rumahkos/pontianakbarat', 'FilterKosController@tampilPontianakBarat')->name('kos.pontianakbarat');
// Route::get('/rumahkos/pontianakselatan', 'FilterKosController@tampilPontianakSelatan')->name('kos.pontianakselatan');
// Route::get('/rumahkos/pontianaktenggara', 'FilterKosController@tampilPontianakTenggara')->name('kos.pontianaktenggara');
// Route::resource('/rumahkos','KosController');
// Route::resource('/komentarkos','KomentarKosController');
// Route::get('/orderkos/{kos}/{kamar}', 'OrderKosController@tambahpemesanan')->name('kos.orderkos.tambah');
// Route::post('/orderkos/{kos}/{kamar}', 'OrderKosController@store')->name('kos.orderkos.simpan');
// Route::put('/orderkos/{id}/terima', 'OrderKosController@terima')->name('kos.orderkos.terima');
// Route::delete('/orderkos/{id}/tolak', 'OrderKosController@tolak')->name('kos.orderkos.tolak');
// Route::put('/orderkos/{id}/hapuspemesan', 'OrderKosController@hapuspemesan')->name('kos.orderkos.hapuspemesan');
// Route::get('/kossaya', 'DepanController@kossaya')->name('kos.saya');

// halaman admin
//----------------------------------------------------------------------------------------

// halaman login admin
//-----------------------------------------------------------------------------------------
Route::get('/admin/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

// Halaman kelola Pengaduan
Route::resource('/admin/pengaduans', 'AdminPengaduanController');

// halaman kos verifikasi kontrakan
Route::get('/admin/verifikasikos', 'AdminKosController@belumTampil')->name('admin.verifikasikos');
Route::put('/admin/verifikasikos/{id}/edit','AdminKosController@store')->name('admin.verifikasikos.submit');
Route::delete('/admin/verifikasikos/{id}/delete','AdminKosController@destroy')->name('admin.datakos.destroy');
Route::get('/admin/datakos', 'AdminKosController@tampil')->name('admin.datakos');

// halaman admin verifikasi kontrakan
//---------------------------------------------------------------------------------------------------------------
Route::get('/admin/verifikasikontrakan','AdminKontrakanController@belumTampil')->name('admin.verifikasikontrakan');
Route::put('/admin/verifikasikontrakan/{id}/edit','AdminKontrakanController@store')->name('admin.verifikasikontrakan.submit');

// halaman tampil data kontrakan yang telah diverifikasi
//-------------------------------------------------------------------------------------------------
Route::get('/admin/datakontrakan', 'AdminKontrakanController@tampil')->name('admin.datakontrakan');
Route::delete('/admin/datakontrakan/{id}/delete', 'AdminKontrakanController@destroy')->name('admin.datakontrakan.destroy');

// Halaman Admin untuk kelola user
Route::resource('/admin/user','AdminUserController');

// halaman depan admin
//--------------------------------------------------------------------
Route::get('/admin', 'AdminController@index')->name('admin.dashboard');
