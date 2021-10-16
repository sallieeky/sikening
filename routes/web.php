<?php

use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\LandingControllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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

// ================================= PENGGUNA UMUM ======================================= \\

Route::get('/', [LandingControllers::class, 'index']);
Route::post('/', [LandingControllers::class, 'kirimPesan']);


// ================================= AUTH HANDLER ======================================= \\

Route::middleware(['auth', 'verified'])->group(function () {
  // ############## HALAMAN ADMIN DAN USER BISA AKSES ############# \\
  Route::get('/dashboard', [DashboardControllers::class, 'index']);
  Route::get('/profile', [DashboardControllers::class, 'profile']);

  // ############## HALAMAN ADMIN AJA YANG BISA AKSES ############# \\
  Route::middleware(['admin'])->group(function () {
    Route::get('/kelola', [DashboardControllers::class, 'kelola']);
    Route::get('/keuangan', [DashboardControllers::class, 'keuangan']);
    Route::get('/akun-pengguna', [DashboardControllers::class, 'akunPengguna']);

    Route::post("/kelola-profile", [DashboardControllers::class, "kelolaProfile"]);
    Route::post("/kelola-promo", [DashboardControllers::class, "kelolaPromo"]);

    Route::get("/promo-hapus/{id}", [DashboardControllers::class, "promoHapus"]);
    Route::post("/promo-edit", [DashboardControllers::class, "promoEdit"]);
  });


  // ############## HALAMAN USER AJA YANG BISA AKSES ############# \\
  Route::middleware(['user'])->group(function () {
    Route::get('/menu', [DashboardControllers::class, 'menu']);
    Route::get('/invoice', [DashboardControllers::class, 'invoice']);
    Route::get('/keranjang', [DashboardControllers::class, 'keranjang']);
    Route::get('/checkout', [DashboardControllers::class, 'checkout']);
  });
});

Route::middleware(['guest'])->group(function () {
  Route::get('/login', [AuthControllers::class, 'login'])->name("login");
  Route::post('/login', [AuthControllers::class, 'loginPost']);

  Route::get('/registration', [AuthControllers::class, 'registration']);
  Route::post('/registration', [AuthControllers::class, 'registrationPost']);
});

Route::get('/logout', function () {
  Auth::logout();
  return redirect("/");
});

// ======================================================================================= \\



// ================================= VERIFY HANDLER ======================================= \\

Route::get('/email/verify', function () {
  return view('authenticate.verify-email');
})->middleware('auth', 'not_verified')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
  $request->fulfill();
  return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
  $request->user()->sendEmailVerificationNotification();
  return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// ======================================================================================= \\

























// Route::get('/kirim', function () {
//   Mail::send('mail.tes', [], function ($message) {
//     $message->from('sikening.a6@gmail.com', 'Cake Nining');
//     $message->to('10191047@student.itk.ac.id', 'Majesty Samantha');
//     $message->subject("Tes Kirim Dari Sikening");
//   });
//   return "BERHASIL";
// });
