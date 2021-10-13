<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Profile;
use App\Models\Statistik;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingControllers extends Controller
{
    public function index()
    {
        $pengunjung = Statistik::where("nama", "kunjungan")->first();
        $pengunjung->increment('value', 1);

        $deskripsi = Profile::where("nama", "deskripsi")->pluck("value")->first();
        $menu = Menu::orderBy("count", "DESC")->get()->take(6);

        $promo = Profile::where("nama", "promo")->get();
        $waktu = [];
        foreach ($promo as $pr) {
            $waktu[] = Carbon::parse($pr->tanggal_akhir)->diffForHumans();
        }
        return view("landing", compact("deskripsi", "menu", "promo", "waktu"));
    }
    public function kirimPesan(Request $request)
    {
        Mail::send('mail.kirim_pesan', ["pesan" => $request->message], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('sikening.a6@gmail.com', 'Cake Nining');
            $message->subject($request->subject);
        });
        return redirect("/#contact-form");
    }
}
