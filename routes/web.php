<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/system/clear-cache', function() {
    $exitCode = Artisan::call('config:clear');
    $exitCode = Artisan::call('cache:clear');
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('route:cache');
    $exitCode = Artisan::call('route:clear');   
    return 'DONE'; //Return anything
});

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('front.index')->middleware('visitor');
Route::get('/sejarah', [App\Http\Controllers\FrontController::class, 'sejarah'])->name('front.sejarah')->middleware('visitor');
Route::get('/profil', [App\Http\Controllers\FrontController::class, 'profil'])->name('front.profil')->middleware('visitor');
Route::get('/struktur', [App\Http\Controllers\FrontController::class, 'struktur'])->name('front.struktur')->middleware('visitor');
Route::get('/kurikulum', [App\Http\Controllers\FrontController::class, 'kurikulum'])->name('front.kurikulum')->middleware('visitor');

Route::get('/kabar-sespim/post/category/{id}', [App\Http\Controllers\PublishedPostController::class, 'kabarSespimByCategori'])->name('front.kabar-sespim')->middleware('visitor');
Route::get('/post/{id}/{slug}', [App\Http\Controllers\PublishedPostController::class, 'postDetail'])->name('front.post.detail')->middleware('visitor');

Route::get('/galeri/images', [App\Http\Controllers\FrontController::class, 'galeri'])->name('front.galeri')->middleware('visitor');
Route::get('/galeri/videos', [App\Http\Controllers\FrontController::class, 'galeriVideo'])->name('front.galeri.video')->middleware('visitor');
Route::get('/perpustakaan', [App\Http\Controllers\FrontController::class, 'perpustakaan'])->name('front.perpustakaan')->middleware('visitor');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/user', [App\Http\Controllers\UserController::class, 'index'])->name('user.index');
Route::get('/admin/user/create', [App\Http\Controllers\UserController::class, 'create'])->name('user.create');
Route::post('/admin/user/save', [App\Http\Controllers\UserController::class, 'save'])->name('user.save');
Route::get('/admin/user/edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('user.edit');
Route::post('/admin/user/update', [App\Http\Controllers\UserController::class, 'update'])->name('user.update');
Route::get('/admin/user/delete/{id}', [App\Http\Controllers\UserController::class, 'delete'])->name('user.delete');

Route::get('/admin/user/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->name('user.change-password');
Route::post('/admin/user/change-password/update', [App\Http\Controllers\UserController::class, 'storeChangedPassword'])->name('user.update.change-password');

Route::get('/admin/role', [App\Http\Controllers\RoleController::class, 'index'])->name('role.index');
Route::get('/admin/role/create', [App\Http\Controllers\RoleController::class, 'create'])->name('role.create');
Route::post('/admin/role/save', [App\Http\Controllers\RoleController::class, 'save'])->name('role.save');
Route::get('/admin/role/edit/{id}', [App\Http\Controllers\RoleController::class, 'edit'])->name('role.edit');
Route::post('/admin/role/update', [App\Http\Controllers\RoleController::class, 'update'])->name('role.update');
Route::get('/admin/role/delete/{id}', [App\Http\Controllers\RoleController::class, 'delete'])->name('role.delete');

Route::get('/admin/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/admin/posts/save', [App\Http\Controllers\PostController::class, 'save'])->name('post.save');
Route::get('/admin/posts/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::post('/admin/posts/update', [App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::get('/admin/posts/delete/{id}', [App\Http\Controllers\PostController::class, 'delete'])->name('post.delete');

Route::get('/admin/category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('/admin/category/create', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('/admin/category/save', [App\Http\Controllers\CategoryController::class, 'save'])->name('category.save');
Route::get('/admin/category/edit/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('category.edit');
Route::post('/admin/category/update', [App\Http\Controllers\CategoryController::class, 'update'])->name('category.update');
Route::get('/admin/category/delete/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('category.delete');

Route::get('/admin/beranda', [App\Http\Controllers\BerandaController::class, 'index'])->name('beranda.index');
Route::get('/admin/beranda/create', [App\Http\Controllers\BerandaController::class, 'create'])->name('beranda.create');
Route::post('/admin/beranda/save', [App\Http\Controllers\BerandaController::class, 'save'])->name('beranda.save');
Route::get('/admin/beranda/edit/{id}', [App\Http\Controllers\BerandaController::class, 'edit'])->name('beranda.edit');
Route::post('/admin/beranda/update', [App\Http\Controllers\BerandaController::class, 'update'])->name('beranda.update');
Route::get('/admin/beranda/delete/{id}', [App\Http\Controllers\BerandaController::class, 'delete'])->name('beranda.delete');

Route::get('/admin/sejarah', [App\Http\Controllers\SejarahController::class, 'index'])->name('sejarah.index');
Route::get('/admin/sejarah/create', [App\Http\Controllers\SejarahController::class, 'create'])->name('sejarah.create');
Route::post('/admin/sejarah/save', [App\Http\Controllers\SejarahController::class, 'save'])->name('sejarah.save');
Route::get('/admin/sejarah/edit/{id}', [App\Http\Controllers\SejarahController::class, 'edit'])->name('sejarah.edit');
Route::post('/admin/sejarah/update', [App\Http\Controllers\SejarahController::class, 'update'])->name('sejarah.update');
Route::get('/admin/sejarah/delete/{id}', [App\Http\Controllers\SejarahController::class, 'delete'])->name('sejarah.delete');

Route::get('/admin/profil', [App\Http\Controllers\ProfilController::class, 'index'])->name('profil.index');
Route::get('/admin/profil/create', [App\Http\Controllers\ProfilController::class, 'create'])->name('profil.create');
Route::post('/admin/profil/save', [App\Http\Controllers\ProfilController::class, 'save'])->name('profil.save');
Route::get('/admin/profil/edit/{id}', [App\Http\Controllers\ProfilController::class, 'edit'])->name('profil.edit');
Route::post('/admin/profil/update', [App\Http\Controllers\ProfilController::class, 'update'])->name('profil.update');
Route::get('/admin/profil/delete/{id}', [App\Http\Controllers\ProfilController::class, 'delete'])->name('profil.delete');

Route::get('/admin/struktur', [App\Http\Controllers\StrukturController::class, 'index'])->name('struktur.index');
Route::get('/admin/struktur/create', [App\Http\Controllers\StrukturController::class, 'create'])->name('struktur.create');
Route::post('/admin/struktur/save', [App\Http\Controllers\StrukturController::class, 'save'])->name('struktur.save');
Route::get('/admin/struktur/edit/{id}', [App\Http\Controllers\StrukturController::class, 'edit'])->name('struktur.edit');
Route::post('/admin/struktur/update', [App\Http\Controllers\StrukturController::class, 'update'])->name('struktur.update');
Route::get('/admin/struktur/delete/{id}', [App\Http\Controllers\StrukturController::class, 'delete'])->name('struktur.delete');

Route::get('/admin/kurikulum', [App\Http\Controllers\KurikulumController::class, 'index'])->name('kurikulum.index');
Route::get('/admin/kurikulum/create', [App\Http\Controllers\KurikulumController::class, 'create'])->name('kurikulum.create');
Route::post('/admin/kurikulum/save', [App\Http\Controllers\KurikulumController::class, 'save'])->name('kurikulum.save');
Route::get('/admin/kurikulum/edit/{id}', [App\Http\Controllers\KurikulumController::class, 'edit'])->name('kurikulum.edit');
Route::post('/admin/kurikulum/update', [App\Http\Controllers\KurikulumController::class, 'update'])->name('kurikulum.update');
Route::get('/admin/kurikulum/delete/{id}', [App\Http\Controllers\KurikulumController::class, 'delete'])->name('kurikulum.delete');

Route::get('/admin/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');
Route::get('/admin/galeri/create', [App\Http\Controllers\GaleriController::class, 'create'])->name('galeri.create');
Route::post('/admin/galeri/save', [App\Http\Controllers\GaleriController::class, 'save'])->name('galeri.save');
Route::get('/admin/galeri/edit/{id}', [App\Http\Controllers\GaleriController::class, 'edit'])->name('galeri.edit');
Route::post('/admin/galeri/update', [App\Http\Controllers\GaleriController::class, 'update'])->name('galeri.update');
Route::get('/admin/galeri/delete/{id}', [App\Http\Controllers\GaleriController::class, 'delete'])->name('galeri.delete');

Route::get('/admin/perpustakaan', [App\Http\Controllers\PerpustakaanController::class, 'index'])->name('perpustakaan.index');
Route::get('/admin/perpustakaan/create', [App\Http\Controllers\PerpustakaanController::class, 'create'])->name('perpustakaan.create');
Route::post('/admin/perpustakaan/save', [App\Http\Controllers\PerpustakaanController::class, 'save'])->name('perpustakaan.save');
Route::get('/admin/perpustakaan/edit/{id}', [App\Http\Controllers\PerpustakaanController::class, 'edit'])->name('perpustakaan.edit');
Route::post('/admin/perpustakaan/update', [App\Http\Controllers\PerpustakaanController::class, 'update'])->name('perpustakaan.update');
Route::get('/admin/perpustakaan/delete/{id}', [App\Http\Controllers\PerpustakaanController::class, 'delete'])->name('perpustakaan.delete');

Route::get('/admin/tentang', [App\Http\Controllers\TentangController::class, 'index'])->name('tentang.index');
Route::get('/admin/tentang/create', [App\Http\Controllers\TentangController::class, 'create'])->name('tentang.create');
Route::post('/admin/tentang/save', [App\Http\Controllers\TentangController::class, 'save'])->name('tentang.save');
Route::get('/admin/tentang/edit/{id}', [App\Http\Controllers\TentangController::class, 'edit'])->name('tentang.edit');
Route::post('/admin/tentang/update', [App\Http\Controllers\TentangController::class, 'update'])->name('tentang.update');
Route::get('/admin/tentang/delete/{id}', [App\Http\Controllers\TentangController::class, 'delete'])->name('tentang.delete');

