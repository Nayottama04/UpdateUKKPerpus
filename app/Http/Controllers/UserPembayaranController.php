<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class UserPembayaranController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('anggota_id', Auth::user()->anggota->id)
            ->whereNull('tgl_pengembalian') // Hanya yang belum dikembalikan
            ->get()
            ->map(function ($transaksi) {
                $hari_telat = max(0, Carbon::now()->diffInDays($transaksi->tgl_pengembalian, false));
                $transaksi->hari_telat = $hari_telat;
                $transaksi->total_denda = $hari_telat > 0 ? $hari_telat * $transaksi->pustaka->denda_terlambat : 0;
                return $transaksi;
            });

        return view('user.pembayaran.index', compact('transaksis'));
    }

    public function bayar(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        // Pastikan transaksi benar-benar memiliki denda
        $hari_telat = max(0, Carbon::now()->diffInDays($transaksi->tgl_pengembalian, false));
        if ($hari_telat <= 0 || $transaksi->status_pembayaran == 'lunas') {
            return redirect()->route('user.pembayaran.index')->with('error', 'Denda tidak perlu dibayar.');
        }

        // Update status pembayaran menjadi lunas
        $transaksi->update([
            'status_pembayaran' => 'lunas'
        ]);

        return redirect()->route('user.pembayaran.index')->with('success', 'Denda berhasil dibayar.');
    }
    
}
