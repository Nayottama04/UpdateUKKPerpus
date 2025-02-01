<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    /**
     * Menampilkan jumlah pengguna yang sedang online.
     */
    public function getOnlineUsers()
    {
        // Menghitung pengguna yang aktif dalam 5 menit terakhir
        $onlineUsers = User::where('last_activity', '>=', Carbon::now()->subMinutes(5))->count();

        return response()->json(['onlineUsers' => $onlineUsers]);
    }

    /**
     * Menampilkan statistik login pengguna selama 7 hari terakhir.
     */
    public function getLoginStatistics()
    {
        $statistics = [
            'Senin' => User::whereDate('last_activity', now()->startOfWeek())->count(),
            'Selasa' => User::whereDate('last_activity', now()->startOfWeek()->addDay(1))->count(),
            'Rabu' => User::whereDate('last_activity', now()->startOfWeek()->addDay(2))->count(),
            'Kamis' => User::whereDate('last_activity', now()->startOfWeek()->addDay(3))->count(),
            'Jumat' => User::whereDate('last_activity', now()->startOfWeek()->addDay(4))->count(),
            'Sabtu' => User::whereDate('last_activity', now()->startOfWeek()->addDay(5))->count(),
            'Minggu' => User::whereDate('last_activity', now()->startOfWeek()->addDay(6))->count(),
        ];

        return response()->json($statistics);
    }
}
