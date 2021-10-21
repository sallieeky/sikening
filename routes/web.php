<?php

use App\Http\Controllers\AuthControllers;
use App\Http\Controllers\DashboardControllers;
use App\Http\Controllers\LandingControllers;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;

use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
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

  Route::post("/profile-public-info", [DashboardControllers::class, "profilePublicInfo"]);
  Route::post("/profile-private-info", [DashboardControllers::class, "profilePrivateInfo"]);


  // ############## HALAMAN ADMIN AJA YANG BISA AKSES ############# \\
  Route::middleware(['admin'])->group(function () {
    Route::get('/kelola', [DashboardControllers::class, 'kelola']);
    Route::get('/keuangan', [DashboardControllers::class, 'keuangan']);
    Route::get('/akun-pengguna', [DashboardControllers::class, 'akunPengguna']);

    Route::post("/kelola-profile", [DashboardControllers::class, "kelolaProfile"]);
    Route::post("/kelola-promo", [DashboardControllers::class, "kelolaPromo"]);

    Route::get("/promo-hapus/{id}", [DashboardControllers::class, "promoHapus"]);
    Route::post("/promo-edit", [DashboardControllers::class, "promoEdit"]);

    Route::get("/menu-hapus/{id}", [DashboardControllers::class, "menuHapus"]);
    Route::post("/menu-tambah", [DashboardControllers::class, "menuTambah"]);
    Route::post("/menu-edit", [DashboardControllers::class, "menuEdit"]);
  });


  // ############## HALAMAN USER AJA YANG BISA AKSES ############# \\
  Route::middleware(['user'])->group(function () {
    Route::get('/menu', [DashboardControllers::class, 'menu']);
    Route::get('/invoice', [DashboardControllers::class, 'invoice']);
    Route::get('/keranjang', [DashboardControllers::class, 'keranjang']);
    Route::get('/checkout', [DashboardControllers::class, 'checkout']);

    Route::post("/tambah-keranjang/{menu}", [DashboardControllers::class, "tambahKeranjang"]);
    Route::get("/hapus-keranjang/{id}", [DashboardControllers::class, "hapusKeranjang"]);
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

Route::get('/forgot-password', function () {
  return view('authenticate.forgot-password');
})->middleware('guest')->name('password.request');

Route::post('/forgot-password', function (Request $request) {
  $request->validate(['email' => 'required|email']);

  $status = Password::sendResetLink(
    $request->only('email')
  );

  return $status === Password::RESET_LINK_SENT
    ? back()->with(['status' => __($status)])
    : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
  return view('authenticate.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
  $request->validate([
    'token' => 'required',
    'email' => 'required|email',
    'password' => 'required|min:8|confirmed',
  ]);

  $status = Password::reset(
    $request->only('email', 'password', 'password_confirmation', 'token'),
    function ($user, $password) {
      $user->forceFill([
        'password' => bcrypt($password)
      ])->setRememberToken(Str::random(60));

      $user->save();

      event(new PasswordReset($user));
    }
  );

  return $status === Password::PASSWORD_RESET
    ? redirect()->route('login')->with('status', __($status))
    : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');

// ======================================================================================= \\

























// Route::get('/kirim', function () {
//   Mail::send('mail.tes', [], function ($message) {
//     $message->from('sikening.a6@gmail.com', 'Cake Nining');
//     $message->to('10191047@student.itk.ac.id', 'Majesty Samantha');
//     $message->subject("Tes Kirim Dari Sikening");
//   });
//   return "BERHASIL";
// });
