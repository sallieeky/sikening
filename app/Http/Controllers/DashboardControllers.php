<?php

namespace App\Http\Controllers;

use App\Models\AdminPesan;
use App\Models\Aktifitas;
use App\Models\Invoice;
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
            $pendapatan = Statistik::where("nama", "pendapatan")->pluck("value")->first();
            $pesanan = Invoice::all()->count();
            $menu = Menu::all()->pluck("count");

            $penjualan = 0;
            foreach ($menu as $mn) {
                $penjualan += $mn;
            }

            $menu_terlaris = Menu::orderBy("count", "DESC")->get()->take(5);
            return view("dashboard.dashboard_admin", compact("pengunjung", "menu_terlaris", "pendapatan", "pesanan", "penjualan"));
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
            "keterangan_aktifitas" => "Mengubah info publik"
        ]);
        return back()->with("pesan", "Berhasil menyimpan data");
    }
    public function profilePrivateInfo(Request $request)
    {
        $request->validate([
            "alamat" => "required",
            "kota" => "required",
            "no_telp" => "required",
            "provinsi" => "required",
            "kode_pos" => "required|numeric|digits:5",
        ]);
        User::where("id", Auth::user()->id)
            ->update([
                "alamat" => $request->alamat,
                "kota" => $request->kota,
                "no_telp" => $request->no_telp,
                "provinsi" => $request->provinsi,
                "kode_pos" => $request->kode_pos,
            ]);
        Aktifitas::create([
            "user_id" => Auth::user()->id,
            "keterangan_aktifitas" => "Mengubah info pribadi"
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
        $invoice = Invoice::all();
        $adminPesan = AdminPesan::all();

        $pInvoice = 0;
        $pAdmin = 0;

        $adminKode = [];
        foreach ($invoice->where("status", "Terima") as $iv) {
            $pInvoice += $iv->total_pembayaran;
        }
        foreach ($adminPesan as $ap) {
            $pAdmin += $ap->total;
            $adminKode[] = $ap->kode_pesan;
        }
        $adminKode = array_values(array_unique($adminKode));

        $total = $pInvoice + $pAdmin;

        return view("dashboard.keuangan", compact("invoice", "adminPesan", "pInvoice", "pAdmin", "total", "adminKode"));
    }
    public function pesanan()
    {
        $invoice = Invoice::where("status", "belum")->get();
        $menu = Menu::all();
        return view("dashboard.pesanan", compact('invoice', "menu"));
    }
    public function pesananKonfirmasi(Invoice $invoice, Request $request)
    {
        if ($request->status == "Terima") {
            Statistik::where("nama", "pendapatan")->first()->increment('value', $invoice->total_pembayaran);
        } else {
            $keranjang = Keranjang::where("kode_keranjang", $invoice->kode_keranjang)->get();
            foreach ($keranjang as $kr) {
                $kr->menu->decrement("count", $kr->jumlah);
                $kr->menu->increment("stok", $kr->jumlah);
            }
        }

        $invoice->update([
            "status" => $request->status
        ]);
        return back()->with("pesan", "Berhasil melakukan konfirmasi invoice");
    }
    public function pesananAdmin(Request $request)
    {
        $kode_pesan = "pa_" . Auth::user()->id . "_" . rand(10000, 99999);
        $jml_menu = Menu::all()->count();
        for ($i = 0; $i < $jml_menu; $i++) {
            $menu = Menu::where("id", $request->{'menu_' . $i})->first();
            if ($request->{'menu_' . $i}) {
                AdminPesan::create([
                    "kode_pesan" => $kode_pesan,
                    "menu_id" => $request->{'menu_' . $i},
                    "jumlah" => $request->{'jumlah_' . $i},
                    "total" => $menu->harga * $request->{'jumlah_' . $i}
                ]);
                Statistik::where("nama", "pendapatan")->first()->increment('value', $menu->harga * $request->{'jumlah_' . $i});
                $menu->increment("count", $request->{'jumlah_' . $i});
                $menu->decrement("stok", $request->{'jumlah_' . $i});
            }
        }
        return back()->with("pesan", "Berhasil melakukan pembelian");
    }
    public function akunPengguna()
    {
        $user = User::where("role", "user")->get();
        return view("dashboard.akun_pengguna", compact('user'));
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
        return view("dashboard.invoice_list");
    }
    public function invoiceDetail(Invoice $invoice)
    {
        if ($invoice->user_id == Auth::user()->id || Auth::user()->role == "admin") {
            $keranjang = Keranjang::where("kode_keranjang", $invoice->kode_keranjang)->get();
            return view("dashboard.invoice", compact("invoice", "keranjang"));
        } else {
            return "AW";
        }
    }

    // ================================================ HALAMAN KERANJANG ========================================== \\ 

    public function keranjang()
    {
        $keranjang = Keranjang::where([
            ["user_id", "=", Auth::user()->id],
            ["status", "=", "belum"],
        ])->get();

        $total = 0;
        foreach ($keranjang as $krj) {
            $total += $krj->menu->harga * $krj->jumlah;
        }

        return view("dashboard.keranjang", compact("keranjang", "total"));
    }
    public function tambahKeranjang(Menu $menu, Request $request)
    {
        $request->validate([
            "jumlah" => "required"
        ]);
        $kode_keranjang = Keranjang::where([
            ["status", "=", "belum"],
            ["user_id", "=", Auth::user()->id]
        ])->pluck("kode_keranjang")->first();

        if ($kode_keranjang) {
            $cek_menu = Keranjang::where([
                ["status", "=", "belum"],
                ["user_id", "=", Auth::user()->id],
                ["menu_id", "=", $menu->id]
            ])->first();
            if ($cek_menu) {
                Keranjang::where("menu_id", $menu->id)
                    ->update([
                        "jumlah" => $request->jumlah
                    ]);
                $menu->decrement("count", $cek_menu->jumlah);
                $menu->increment("count", $request->jumlah);
                $menu->increment("stok", $cek_menu->jumlah);
                $menu->decrement("stok", $request->jumlah);
                return back()->with("pesan", "Berhasil menambahkan ke keranjang");
            }
        } else {
            $kode_keranjang = "k_" . Auth::user()->id . "_" . rand(10000, 99999);
        }
        Keranjang::create([
            "kode_keranjang" => $kode_keranjang,
            "user_id" => Auth::user()->id,
            "menu_id" => $menu->id,
            "jumlah" => $request->jumlah
        ]);

        $menu->increment("count", $request->jumlah);
        $menu->decrement("stok", $request->jumlah);

        Aktifitas::create([
            "user_id" => Auth::user()->id,
            "keterangan_aktifitas" => "Menambahkan $menu->nama kedalam keranjang",
            "lampiran_1" => $menu->gambar
        ]);
        return back()->with("pesan", "Berhasil menambahkan ke keranjang");
    }
    public function hapusKeranjang(Keranjang $id)
    {
        $id->delete();
        $id->menu->increment('stok', $id->jumlah);
        $id->menu->decrement('count', $id->jumlah);
        Aktifitas::create([
            "user_id" => Auth::user()->id,
            "keterangan_aktifitas" => "Menghapus " . $id->menu->nama . " dari keranjang",
        ]);
        return back()->with("pesan", "Berhasil menghapus menu dari keranjang");
    }

    // =============================================== END HALAMAN KERANJANG ======================================== \\ 
    public function checkout(Request $request)
    {
        if ($request->checkout) {
            $keranjang = Keranjang::where([
                ["user_id", "=", Auth::user()->id],
                ["status", "=", "belum"],
            ])->get();

            $total = 0;
            foreach ($keranjang as $krj) {
                $total += $krj->menu->harga * $krj->jumlah;
            }

            $metode_pembayaran = $request->metode_pembayaran;
            $tanggal = Carbon::parse($request->tanggal_pengambilan)->isoFormat('dddd, D MMMM Y');
            $tanggal_pengambilan = $request->tanggal_pengambilan;
            return view("dashboard.checkout", compact("total", "metode_pembayaran", "tanggal", "tanggal_pengambilan", "keranjang"));
        } else {
            return back();
        }
    }
    public function checkoutPost(Request $request)
    {
        $kode_pembayaran = "p_" . Auth::user()->id . "_" . rand(10000, 99999);
        $bukti_pembayaran = "bayar ditempat";

        if ($request->bukti_pembayaran) {
            $bukti_pembayaran = $request->file("bukti_pembayaran")->getClientOriginalName();
            $request->file("bukti_pembayaran")->storeAs("public/bukti_pembayaran", $request->file("bukti_pembayaran")->getClientOriginalName());
        }

        Invoice::create([
            "user_id" => Auth::user()->id,
            "kode_pembayaran" => $kode_pembayaran,
            "kode_keranjang" => $request->kode_keranjang,
            "metode_pembayaran" => $request->metode_pembayaran,
            "total_pembayaran" => $request->total_pembayaran,
            "tanggal_pengambilan" => $request->tanggal_pengambilan,
            "bukti_pembayaran" => $bukti_pembayaran
        ]);

        Keranjang::where([
            ["user_id", "=", Auth::user()->id],
            ["status", "=", "belum"],
        ])->update([
            "status" => "sudah"
        ]);

        Aktifitas::create([
            "user_id" => Auth::user()->id,
            "keterangan_aktifitas" => "Melakukan checkout keranjang dengan kode pembayaran #$kode_pembayaran",
        ]);

        return redirect("/invoice/$kode_pembayaran")->with("pesan", "Berhasil melakukan pemesanan");
    }

    // =========================================== END USER =========================================== \\

}
