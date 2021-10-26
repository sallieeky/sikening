@extends("base_views.dashboard")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("keuangan-active", "active")
@section("main")



<main class="content">
  <div class="container-fluid p-0">
    <div class="mb-3">
      <h1 class="h3 d-inline align-middle"><strong>Kelola</strong> Keuangan</h1>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col mt-0">
                <h5 class="card-title">Pendapatan Via SIKENING</h5>
              </div>
              <div class="col-auto">
                <div class="stat text-primary">
                  <i class="align-middle" data-feather="dollar-sign"></i>
                </div>
              </div>
            </div>
            <h4 class="mt-1 mb-3">Rp. {{ number_format($pInvoice,2,",",".") }}</h1>
            <div class="mb-0">
              <span class="text-muted"><small>Data di hitung secara otomatis</small></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col mt-0">
                <h5 class="card-title">Pendapatan Via Cake Nining</h5>
              </div>
              <div class="col-auto">
                <div class="stat text-primary">
                  <i class="align-middle" data-feather="dollar-sign"></i>
                </div>
              </div>
            </div>
            <h4 class="mt-1 mb-3">Rp. {{ number_format($pAdmin,2,",",".") }}</h4>
            <div class="mb-0">
              <span class="text-muted"><small>Data di hitung secara otomatis</small></span>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col mt-0">
                <h5 class="card-title">Total Pendapatan</h5>
              </div>
              <div class="col-auto">
                <div class="stat text-primary">
                  <i class="align-middle" data-feather="dollar-sign"></i>
                </div>
              </div>
            </div>
            <h4 class="mt-1 mb-3">Rp. {{ number_format($total,2,",",".") }}</h4>
            <div class="mb-0">
              <span class="text-muted"><small>Data di hitung secara otomatis</small></span>                  
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Data keuangan Cake Nining</h5>
          </div>
          <div class="card-body">
            @if(count($adminPesan) == 0)
            <div class="alert alert-primary p-3" role="alert">
              Belum ada pesanan yang masuk
            </div>
            @else
            @foreach ($adminKode as $ak)
            <?php $totalBiayaAk = 0; ?>
            @foreach ($adminPesan->where("kode_pesan", $ak) as $ap)
            <?php $totalBiayaAk += $ap->total; ?>
            @endforeach
            <ol class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="ms-2 me-auto">
                  <div class="fw-bold">Kode Pesanan #{{ $ak }}</div>
                  <strong>Total :</strong> Rp. {{ number_format($totalBiayaAk,2,",",".") }}
                </div>
                <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detail-{{ $ak }}">Detail</button>
              </li>
            </ol>
            @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
    
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Pendapatan Berdasarkan Invoice dari SIKENING</h5>
          </div>
          <div class="card-body">
            @if(count($invoice) == 0)
            <div class="alert alert-primary p-3" role="alert">
              Belum ada pesanan yang masuk
            </div>
            @else
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">Kode Pembayaran</th>
                  <th scope="col">Metode Pembayaran</th>
                  <th scope="col">Tanggal Pengiriman / Pengambilan</th>
                  <th scope="col">Bukti Pembayaran</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($invoice as $iv)
                <tr>
                  <td>#{{ $iv->kode_pembayaran }}</td>
                  <td>{{ $iv->metode_pembayaran }}</td>
                  <td>{{ $iv->tanggal_pengambilan }}</td>
                  <td>
                    @if($iv->bukti_pembayaran == "bayar ditempat")
                      {{ $iv->bukti_pembayaran}}
                    @else
                      <a target="_blank" href="{{ asset("storage/bukti_pembayaran/" . $iv->bukti_pembayaran) }}">Lihat bukti pembayaran</a>
                    @endif
                  </td>
                  <td>
                    @if ($iv->status == "belum")
                      <span class="badge bg-warning">Belum Dikonfirmasi</span>
                    @elseif ($iv->status == "Terima")
                      <span class="badge bg-success">Konfirmasi Diterima</span>
                    @elseif ($iv->status == "Tolak")
                      <span class="badge bg-danger">Konfirmasi Ditolak</span>
                    @endif
                  </td>
                  <td>
                    <a target="_blank" href="/invoice/{{ $iv->kode_pembayaran }}" class="btn btn-outline-primary">Detail</a>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#konfirmasi-{{ $iv->id }}">Ubah Status</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            @endif
          </div>
        </div>
      </div>
    </div>

  </div>
</main>



<!-- Modal -->
@foreach ($invoice as $iv)
<div class="modal fade" id="konfirmasi-{{ $iv->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Invoice</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/pesanan-konfirmasi/{{ $iv->id }}" method="POST">
          @csrf
        <div class="input-group mb-3">
          <label class="input-group-text" for="inputGroupSelect01">Konfirmasi</label>
          <select name="status" class="form-select" id="inputGroupSelect01">
            <option value="Terima" selected>Terima</option>
            <option value="Tolak">Tolak</option>
          </select>
        </div>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

<!-- Modal -->
@foreach ($adminKode as $ak)
<div class="modal fade" id="detail-{{ $ak }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan #{{ $ak }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Jumlah</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php $totalBiaya = 0; ?>
            @foreach ($adminPesan->where("kode_pesan", $ak) as $ap)
            <?php $totalBiaya += $ap->total; ?>
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $ap->menu->nama }}</td>
              <td>{{ $ap->jumlah }}</td>
              <td>Rp. {{ number_format($ap->total,2,",",".") }}</td>
            </tr>
            @endforeach
            <tr>
              <td colspan="3"><strong>Total</strong></td>
              <td><strong>Rp. {{ number_format($totalBiaya,2,",",".") }}</strong></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        {{-- <button type="submit" class="btn btn-primary">Konfirmasi</button> --}}
      </div>
    </div>
  </div>
</div>
@endforeach

@endsection