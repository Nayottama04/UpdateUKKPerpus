<?php

namespace App\Http\Controllers;

use App\Models\Pustaka;
use Illuminate\Http\Request;

class UserPustakaController extends Controller
{
    /**
     * Menampilkan detail pustaka untuk user.
     */
    public function show($id)
    {
        $pustaka = Pustaka::with(['pengarang', 'penerbit', 'ddc', 'format'])->findOrFail($id);
    
        return view('user.pustaka.show', compact('pustaka'));
    }
    
}
