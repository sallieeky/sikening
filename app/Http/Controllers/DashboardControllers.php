<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\Statistik;
use App\Models\User;
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
    public function kelolaProfile(Request $request)
    {
        $request->validate([
            "deskripsi" => "required"
        ]);
        Profile::where("nama", "deskripsi")
            ->update([
                "value" => nl2br($request->deskripsi)
            ]);
        return back()->with("pesan", "Berhasil mengubah deskripsi Cake Nining");
    }
    public function kelolaPromo(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "tanggal_akhir" => "required"
        ]);
        Profile::create([
            "nama" => "promo",
            "value" => $request->nama,
            "tanggal_akhir" => $request->tanggal_akhir
        ]);
        return back()->with("pesan", "Berhasil menambah promo Cake Nining");
    }

    public function keuangan()
    {
        return view("dashboard.keuangan");
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
