<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pustaka;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(): View
    {
        // Ambil data statistik dan pustaka terbaru untuk user
        $totalPustaka = Pustaka::count();
        $totalTransaksi = Transaksi::where('anggota_id', Auth::id())->count();
        $bukuTersedia = Pustaka::where('rp', '1')->count();
        $pustakaBaru = Pustaka::orderBy('created_at', 'desc')->take(8)->get();

        return view('home', compact('totalPustaka', 'totalTransaksi', 'bukuTersedia', 'pustakaBaru'));
    }

    /**
     * Show the admin dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome(): View
    {
        return view('admin.adminHome');
    }

    /**
     * Show the manager dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
}
