<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Pustaka;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user dashboard.
     */
    public function index(): View
    {
        // Perbarui aktivitas terakhir pengguna
        if (Auth::check()) {
            User::where('id', Auth::id())->update(['last_activity' => now()]);
        }
        

        // Statistik pustaka dan transaksi untuk user
        $totalPustaka = Pustaka::count();
        $totalTransaksi = Transaksi::where('anggota_id', Auth::id())->count();
        $bukuTersedia = Pustaka::where('rp', '1')->count();
        $pustakaBaru = Pustaka::latest()->take(6)->get();

        return view('user.userHome', compact('totalPustaka', 'totalTransaksi', 'bukuTersedia', 'pustakaBaru'));
    }

    /**
     * Show the admin dashboard.
     */
    public function adminHome(): View
    {
        // Hitung pengguna yang online dalam 5 menit terakhir
        $onlineUsers = User::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();

        // Statistik login per hari dalam seminggu
        $loginStatistics = [
            'Senin' => User::whereDate('last_activity', now()->startOfWeek())->count(),
            'Selasa' => User::whereDate('last_activity', now()->startOfWeek()->addDay(1))->count(),
            'Rabu' => User::whereDate('last_activity', now()->startOfWeek()->addDay(2))->count(),
            'Kamis' => User::whereDate('last_activity', now()->startOfWeek()->addDay(3))->count(),
            'Jumat' => User::whereDate('last_activity', now()->startOfWeek()->addDay(4))->count(),
            'Sabtu' => User::whereDate('last_activity', now()->startOfWeek()->addDay(5))->count(),
            'Minggu' => User::whereDate('last_activity', now()->startOfWeek()->addDay(6))->count(),
        ];

        return view('admin.adminHome', compact('onlineUsers', 'loginStatistics'));
    }


    /**
     * Show the manager dashboard.
     */
    public function managerHome(): View
    {
        return view('managerHome');
    }
}
