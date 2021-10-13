<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Profile;
use App\Models\Statistik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardControllers extends Controller
{

    // =========================================== ADMIN ============================================== \\

    public function index()
    {
        if (Auth::user()->role == "admin") {
            $pengunjung = Statistik::where("nama", "kunjungan")->pluck("value")->first();
            $menu_terlaris = Menu::orderBy("count", "DESC")->get()->take(5);
            return view("dashboard.dashboard_admin", compact("pengunjung", "menu_terlaris"));
        } else {
            $menu_terlaris = Menu::orderBy("count", "DESC")->get()->take(4);
            return view("dashboard.dashboard_user", compact("menu_terlaris"));
        }
    }
    public function profile()
    {
        return view("dashboard.profile");
    }
    public function kelola()
    {
        $deskripsi = Profile::where("nama", "deskripsi")->pluck("value")->first();
        return view("dashboard.kelola", compact("deskripsi"));
    }
    public function akunPengguna()
    {
        return view("dashboard.akun_pengguna");
    }

    // =========================================== END ADMIN =========================================== \\

    // ============================================== USER ============================================= \\

    public function menu()
    {
        $menu = Menu::all();
        return view("dashboard.menu", compact("menu"));
    }
    public function invoice()
    {
        return view("dashboard.invoice");
    }
    public function keranjang()
    {
        return view("dashboard.keranjang");
    }
    public function checkout(Request $request)
    {
        if ($request->checkout) {
            return view("dashboard.checkout");
        } else {
            return back();
        }
    }

    // =========================================== END USER =========================================== \\

}
