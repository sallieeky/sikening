@extends("base_views.dashboard")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("pesanan-active", "active")
@section("main")

<main class="content">
  <div class="container-fluid p-0">
    <div class="mb-3">
      <h1 class="h3 d-inline align-middle"><strong>Kelola</strong> Pesanan</h1>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">List pesanan yang masuk</h5>
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
                      {{-- <img src="{{ asset("storage/bukti_pembayaran/" . $iv->bukti_pembayaran) }}" alt="{{ $iv->kode_pembayaran }}" style="height: 100px"> --}}
                    @endif
                  </td>
                  <td>
                    <span class="badge bg-danger">Belum Dikonfirmasi</span>
                  </td>
                  <td>
                    <a target="_blank" href="/invoice/{{ $iv->kode_pembayaran }}" class="btn btn-outline-primary">Detail</a>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#konfirmasi-{{ $iv->id }}">Konfirmasi</button>
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

    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header d-flex align-items-center" style="justify-content: space-between">
            <h5 class="card-title mb-0 pull-left">Pembelian langsung di Cake Nining</h5>
          </div>
          <div class="card-body">
            <form action="/pesanan-admin" method="POST">
            @csrf
            <div class="row">
              @foreach ($menu as $mn)
              <div class="col-md-3 mb-3 ">
                <div class="form-check">
                  <input name="menu_{{ $mn->id }}" class="form-check-input" type="checkbox" value="{{ $mn->id }}" id="menu-{{ $mn->id }}">
                  <label class="form-check-label" for="menu-{{ $mn->id }}">
                    {{ $mn->nama }}
                  </label><br>
                  <div class="d-flex align-items-center" style="justify-content: space-around">
                    <label for="jumlah-{{ $mn->id }}" class="form-label">Jumlah</label>
                    <input name="jumlah_{{ $mn->id }}" min="0" max="{{ $mn->stok }}" value="0" type="number" class="form-control" style="width: 25%" id="jumlah-{{ $mn->id }}" aria-describedby="emailHelp">
                  </div>
                </div>
              </div>
              @endforeach
              <button type="submit" class="btn btn-primary">Submit Pembelian</button>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>

  </div>
</main>

{{-- ALERT BERHASIL --}}
@if (session("pesan"))
<div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
@endif

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
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Konfirmasi</button>
      </div>
    </form>
    </div>
  </div>
</div>
@endforeach

<script>
  const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)

</script>

@endsection