@extends("base_views.dashboard")
@section("dashboard-active", "active")
@section("linkcss")
  <link rel="stylesheet" href="{{ asset("assets/css/dashboard_product.css") }}">
  <link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">

  <style>
    .product-grid:hover {
      background-color: #E3C26980; 
    }
  </style>
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3"><strong>Menu</strong> Terlaris</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0"><a href="/menu">Lihat Menu Lainnya</a></h5>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                @foreach ($menu_terlaris as $mt)
                <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                  <div class="card">
                    <img class="card-img" style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/" . $mt->gambar) }}" alt="{{ $mt->nama }}">
                    <div class="card-body">
                      <h4 class="card-title">{{ $mt->nama }}</h4>
                      <h6 class="card-subtitle mb-2 text-muted">Kategori : {{ $mt->kategori }}</h6>
                      <h6 class="card-subtitle mb-2 text-muted">Sisa Stok : {{ $mt->stok }}</h6>
                      <form action="/tambah-keranjang/{{ $mt->id }}" method="POST">
                        @csrf
                        <div class="options d-flex flex-fill my-1">
                          <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" max="{{ $mt->stok }}" placeholder="Jumlah">
                      </div>
                      <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success"><h5 class="mt-4">Rp. {{ number_format($mt->harga,2,",",".") }}</h5></div>
                         <button type="submit" class="btn btn-danger mt-3"><i class="align-middle" data-feather="shopping-cart"></i> Masukkan keranjang</button>
                      </div>
                    </form>
                    </div>
                  </div>
                </div>
                  @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">

    <h1 class="h3 mb-3"><strong>Aktifitas</strong></h1>

      <div class="col-md-12 col-xl-12">
        <div class="card">
          <div class="card-header">

            <h5 class="card-title mb-0">Aktifitas</h5>
          </div>
          <div class="card-body h-100">
            @foreach (Auth::user()->aktifitas->take(10) as $akt)
            <div class="d-flex align-items-start">
              <img src="{{ asset("storage/users/" . Auth::user()->foto) }}" width="36" height="36" class="rounded-circle me-2" alt="{{ Auth::user()->nama }}">
              <div class="flex-grow-1">
                <small class="float-end text-navy">{{ $akt->created_at->diffForHumans() }}</small>
                <strong>{{ Auth::user()->nama }}</strong> {{ $akt->keterangan_aktifitas }} <br />
                <small class="text-muted">{{ $akt->created_at->format("l, j F Y g:i a") }}</small><br />
                
                @if ($akt->lampiran_1)
                <div class="row g-0 mt-1">
                  <div class="col-6 col-md-4 col-lg-4 col-xl-3">
                    <img src="{{ asset("storage/menu/" . $akt->lampiran_1) }}" class="img-fluid pe-2" alt="{{ $akt->lampiran_1 }}">
                  </div>
                </div>
                @endif

              </div>
            </div>
            <hr />
            @endforeach
        </div>
      </div>
    </div>
  </div>

{{-- ALERT BERHASIL --}}
@if (session("pesan"))
<div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--success" style="color: rgb(59, 125, 221);"></i></div><div class="notyf__message">{{ session("pesan") }}</div></div><div class="notyf__ripple" style="background: rgb(59, 125, 221);"></div></div></div>
@endif

{{-- ALERT ERROR --}}
@if ($errors->any())
<div class="notyf" style="justify-content: flex-end; align-items: flex-end;"><div id="notify-custom-eror" class="notyf__toast notyf__toast--lower"><div class="notyf__wrapper"><div class="notyf__icon"><i class="notyf__icon--danger" style="color: #DC3646;"></i></div><div class="notyf__message">{{ $errors->all()[0] }}</div></div><div class="notyf__ripple" style="background: #DC3646;"></div></div></div>
@endif


</main>

<script>
  const notify = document.getElementById("notify-custom")
      setTimeout(() => {
        notify.classList.add("notyf__toast--disappear")
      }, 7500)
  
  const notify2 = document.getElementById("notify-custom-eror")
      setTimeout(() => {
        notify2.classList.add("notyf__toast--disappear")
      }, 7500)
</script>
@endsection