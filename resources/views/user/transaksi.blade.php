@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 text-center" style="font-weight: bold;">Riwayat Peminjaman</h2>
    
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>#</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Pinjam</th>
                    <th>Tanggal Kembali</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksis as $transaksi)
                <tr class="text-center">
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $transaksi->pustaka->judul_pustaka }}</td>
                    <td>{{ date('d-m-Y', strtotime($transaksi->tgl_pinjam)) }}</td>
                    <td>{{ date('d-m-Y', strtotime($transaksi->tgl_kembali)) }}</td>
                    <td>
                        @if($transaksi->tgl_pengembalian)
                            <span class="badge bg-success">Dikembalikan</span>
                        @else
                            @php
                                $hariTelat = max(0, now()->diffInDays($transaksi->tgl_pengembalian, false)); 
                                $totalDenda = $hariTelat * $transaksi->pustaka->denda_terlambat;
                            @endphp

                            @if($hariTelat > 0)
                                
                                <p class="text-danger">Denda: Rp {{ number_format($totalDenda, 0, ',', '.') }}</p>
                            @else
                                <span class="badge bg-warning">Dipinjam</span>
                            @endif
                        @endif
                    </td>
                    <td>
    @if(!$transaksi->tgl_pengembalian)
        <form action="{{ route('user.kembalikan', $transaksi->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PUT')

            <!-- Pilihan kondisi buku -->
            <div class="mb-2">
                <label for="kondisi_buku_{{ $transaksi->id }}" class="fw-semibold">Kondisi Buku</label>
                <select name="kondisi_buku" id="kondisi_buku_{{ $transaksi->id }}" class="form-select kondisi-buku" required>
                    <option value="Baik" data-denda="0">Baik</option>
                    <option value="Rusak" data-denda="{{ $transaksi->pustaka->denda_hilang / 2 }}">Rusak</option>
                    <option value="Hilang" data-denda="{{ $transaksi->pustaka->denda_hilang }}">Hilang</option>
                </select>
            </div>

            <!-- Menampilkan total denda -->
            <p class="text-danger fw-bold total-denda" id="denda_{{ $transaksi->id }}">Denda: Rp 0</p>

            <button type="submit" class="btn btn-sm btn-primary" style="border-radius: 8px;">
                Kembalikan Buku
            </button>
        </form>
    @else
        <span class="text-success">Buku telah dikembalikan</span>
    @endif
</td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<style>
    body {
        background-color: #f5f5f7;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
    }

    .table th, .table td {
        vertical-align: middle;
    }
</style>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".kondisi-buku").forEach(select => {
        select.addEventListener("change", function () {
            let denda = this.options[this.selectedIndex].getAttribute("data-denda");
            let transaksiId = this.id.split("_")[2]; // Ambil ID transaksi dari ID select
            document.getElementById("denda_" + transaksiId).innerText = "Denda: Rp " + new Intl.NumberFormat("id-ID").format(denda);
        });
    });
});
</script>

@endsection
