<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Menu;
use App\Models\Profile;
use App\Models\Statistik;
use App\Models\User;
use Carbon\Carbon;
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
        $promo = Profile::where("nama", "promo")->orderBy("tanggal_akhir")->get();

        $waktu = [];
        foreach ($promo as $pr) {
            $waktu[] = Carbon::parse($pr->tanggal_akhir)->isoFormat('dddd, D MMMM Y');
        }
        return view("dashboard.kelola", compact("deskripsi", "promo", "waktu"));
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
    public function promoHapus(Profile $id)
    {
        $id->delete();
        return back()->with("pesan", "Berhasil menghapus promo");
    }
    public function promoEdit(Request $request)
    {
        Profile::where("id", $request->id)
            ->update([
                "value" => $request->nama,
                "tanggal_akhir" => $request->tanggal_akhir
            ]);
        return back()->with("pesan", "Berhasil mengubah promo");
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
