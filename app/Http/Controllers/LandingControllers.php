<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Profile;
use App\Models\Statistik;
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
        return view("landing", compact("deskripsi", "menu"));
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
