<?php

namespace App\Http\Controllers;

use App\Models\Aktifitas;
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
            $menu_terlaris = Menu::orderBy("count", "DESC")->get()->take(3);
            return view("dashboard.dashboard_user", compact("menu_terlaris"));
        }
    }

    // ================================================= HALAMAN PROFILE ========================================== \\ 

    public function profile()
    {
        return view("dashboard.profile");
    }
    public function profilePublicInfo(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "status" => "required|max:1000",
        ]);
        if ($request->foto) {
            $foto = $request->file("foto")->getClientOriginalName();
            $request->file("foto")->storeAs("public/users", $foto);
        } else {
            $foto = $request->foto_backup;
        }
        User::where("id", Auth::user()->id)
            ->update([
                "nama" => $request->nama,
                "status" => $request->status,
                "foto" => $foto
            ]);
        Aktifitas::create([
            "user_id" => Auth::user()->id,
            "keterangan_aktifitas" => "Mengubah public info"
        ]);
        return back()->with("pesan", "Berhasil menyimpan data");
    }
    public function profilePrivateInfo(Request $request)
    {
        $request->validate([
            "alamat" => "required",
            "kota" => "required",
            "provinsi" => "required",
            "kode_pos" => "required|numeric|digits:5",
        ]);
        User::where("id", Auth::user()->id)
            ->update([
                "alamat" => $request->alamat,
                "kota" => $request->kota,
                "provinsi" => $request->provinsi,
                "kode_pos" => $request->kode_pos,
            ]);
        Aktifitas::create([
            "user_id" => Auth::user()->id,
            "keterangan_aktifitas" => "Mengubah private info"
        ]);
        return back()->with("pesan", "Berhasil menyimpan data");
    }

    // =============================================== END HALAMAN PROFILE ========================================== \\ 


    // ================================================== HALAMAN KELOLA =========================================== \\ 

    public function kelola()
    {
        $deskripsi = Profile::where("nama", "deskripsi")->pluck("value")->first();
        $promo = Profile::where("nama", "promo")->orderBy("tanggal_akhir")->get();
        $menu = Menu::all();

        $waktu = [];
        foreach ($promo as $pr) {
            $waktu[] = Carbon::parse($pr->tanggal_akhir)->isoFormat('dddd, D MMMM Y');
        }
        return view("dashboard.kelola", compact("deskripsi", "promo", "waktu", "menu"));
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
    public function menuTambah(Request $request)
    {
        $request->validate([
            "nama" => "required",
            "gambar" => "required",
            "harga" => "required",
            "kategori" => "required",
            "stok" => "required"
        ]);
        Menu::create([
            "nama" => $request->nama,
            "gambar" => $request->file("gambar")->getClientOriginalName(),
            "harga" => $request->harga,
            "kategori" => $request->kategori,
            "stok" => $request->stok,
        ]);
        $request->file("gambar")->storeAs("public/menu", $request->file("gambar")->getClientOriginalName());
        return back()->with("pesan", "Berhasil menambahkan menu");
    }
    public function menuHapus(Menu $id)
    {
        $id->delete();
        return back()->with("pesan", "Berhasil menghapus menu");
    }
    public function menuEdit(Request $request)
    {
        $gambar = $request->gambar_backup;
        if ($request->gambar) {
            $gambar = $request->file("gambar")->getClientOriginalName();
            $request->file("gambar")->storeAs("public/menu", $request->file("gambar")->getClientOriginalName());
        }
        Menu::where("id", $request->id)
            ->update([
                "nama" => $request->nama,
                "gambar" => $gambar,
                "harga" => $request->harga,
                "kategori" => $request->kategori,
                "stok" => $request->stok
            ]);
        return back()->with("pesan", "Berhasil mengubah data menu");
    }

    // ================================================ END HALAMAN KELOLA ========================================== \\ 


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
