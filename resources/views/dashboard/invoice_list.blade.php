@extends("base_views.dashboard")
@section("invoice-active", "active")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <h1 class="h3 mb-3">Invoice</h1>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header mb-0">
            <h5 class="card-title mb-0">List invoice yang anda miliki</h5>
          </div>
          <div class="card-body ">
            <div class="row">
              <div class="col-md-12">
                @if (count(Auth::user()->invoice) == 0)
                
                <div class="alert alert-primary p-3" role="alert">
                  <p class="mb-0">Anda masih belum melakukan checkout, silakan untuk checkout <a href="/menu">keranjang</a> anda</p>
                </div>
                @endif
                <ul class="list-group">
                  @foreach (Auth::user()->invoice as $ivc)
                  <li class="list-group-item d-flex justify-content-between align-items-center">
                    <div class="ms-2 me-auto">
                      <div class="fw-bold">Kode Pembayaran #{{ $ivc->kode_pembayaran }}</div>
                      Tanggal Checkout : {{ $ivc->created_at->format("l, j F Y - h:m a") }}
                    </div>
                    <a href="/invoice/{{ $ivc->kode_pembayaran }}"><span class="badge bg-primary p-2">Lihat Detail</span></a>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection