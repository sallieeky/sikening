@extends("base_views.dashboard")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
<style>
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>
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
            <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#tambahKeuangan"><i class="align-middle" data-feather="plus-square"></i> Tambah Data Keuangan</button>
          </div>
          <div class="card-body">
            <table id="datatables-reponsive" class="table table-striped" style="width:100%">
              <thead>
                <tr>
                  <th>Bukti Keuangan</th>
                  <th>Waktu</th>
                  <th>Total</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($keuangan as $ku)
                <tr>
                  <td><img src="{{ asset("storage/keuangan/" . $ku->bukti) }}" alt="Bolu Gulung" style="max-height: 100px" class="img-responsive img-thumbnail"></td>
                  <td>{{ $ku->created_at->diffForHumans() }}</td>
                  <td>Rp. {{ number_format($ku->total,2,",",".") }}</td>
                  <td class="table-action">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit-keuangan-modal-{{ $ku->id }}">Ubah</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-keuangan-modal-{{ $ku->id }}">Hapus</button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Data pemesanan Cake Nining</h5>
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
                <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#ubah-{{ $ak }}">Ubah</button>
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

<!-- Tambah Keuangan Modal -->
<div class="modal fade" id="tambahKeuangan" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data Keuangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <form action="/keuangan-tambah" method="POST" enctype="multipart/form-data">
          @csrf
        <div class="form-group mb-3">
          <label for="gambar-menu">Gambar</label><br>
          <img src="" alt="Pilih Gambar" style="height: 200px" id="img-menu" class="img img-thumbnail my-3">
          <input type="file" required name="bukti" id="gambar-menu" class="form-control" aria-describedby="helpId">
        </div>
        <div class="form-group mb-3">
          <label for="harga-menu-modal">Harga</label>
          <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input required type="number" name="total" id="harga-menu-modal" class="form-control" placeholder="Harga" aria-label="Dollar amount (with dot and two decimal places)">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- END Tambah Keuangan Modal -->

@foreach ($keuangan as $ku)
<!-- Ubah Keuangan Modal -->
<div class="modal fade" id="edit-keuangan-modal-{{ $ku->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ubah Data Keuangan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <form action="/keuangan-ubah" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="hidden" name="id" value="{{ $ku->id }}">
        <input type="hidden" name="bukti_backup" value="{{ $ku->bukti }}">
        <div class="form-group mb-3">
          <label for="gambar-menu">Gambar</label><br>
          <img src="" alt="Pilih Gambar" style="height: 200px" id="img-menu" class="img img-thumbnail my-3">
          <input type="file" name="bukti" id="gambar-menu" class="form-control" aria-describedby="helpId">
        </div>
        <div class="form-group mb-3">
          <label for="harga-menu-modal">Harga</label>
          <div class="input-group">
            <span class="input-group-text">Rp.</span>
            <input required type="number" name="total" value="{{ $ku->total }}" id="harga-menu-modal" class="form-control" placeholder="Harga" aria-label="Dollar amount (with dot and two decimal places)">
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="submit" class="btn btn-primary">Ubah</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- END Ubah Keuangan Modal -->

<!-- Hapus Keuangan Modal -->
<div class="modal fade" id="hapus-keuangan-modal-{{ $ku->id }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Keuangan Modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body m-3">
        <p class="mb-0">Apakah anda yakin untuk menghapus data ini?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <a href="/keuangan-hapus/{{ $ku->id }}" class="btn btn-danger">Hapus</a>
      </div>
    </div>
  </div>
</div>
<!-- END Hapus Keuangan Modal -->
@endforeach

@foreach ($adminKode as $ak)
<!-- Modal DETAIL -->
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
        <a href="/pemesanan-hapus/{{ $ak }}" class="btn btn-outline-danger">Hapus</a>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        {{-- <button type="submit" class="btn btn-primary">Konfirmasi</button> --}}
      </div>
    </div>
  </div>
</div>
{{-- END MODAL DETAIL --}}

<!-- Modal UBAH -->
<div class="modal fade" id="ubah-{{ $ak }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Pemesanan #{{ $ak }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Nama Menu</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <form action="pemesanan-ubah" method="POST">
              @csrf
            <?php $totalBiaya = 0; ?>
            @foreach ($adminPesan->where("kode_pesan", $ak) as $ap)
            <?php $totalBiaya += $ap->total; ?>
            <tr>
              <th scope="row">{{ $loop->iteration }}</th>
              <td>{{ $ap->menu->nama }}</td>
              <td><input name="{{ $ap->id }}" type="number" class="form-control" value="{{ $ap->jumlah }}"></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="submit" name="kode_pesan" value="{{ $ak }}" class="btn btn-info">Ubah</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </form>

      </div>
    </div>
  </div>
</div>
{{-- END UBAH DETAIL --}}
@endforeach

  {{-- ALERT BERHASIL --}}
  @if (session("pesan"))
    <div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
  @endif


<script>

document.addEventListener("DOMContentLoaded", function() {
			// Datatables Responsive
			$("#datatables-reponsive").DataTable({
				responsive: true
			});
      const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)
		});

  const img_btn = document.getElementById("gambar-menu")
  const img = document.getElementById("img-menu")

  img_btn.onchange = evt => {
    const [file] = img_btn.files
    if (file) {
        img.src = URL.createObjectURL(file)
    }
  }
</script>

@endsection