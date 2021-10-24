@extends("base_views.dashboard")
@section("invoice-active", "active")
@section("linkcss")
<link class="js-stylesheet" href="https://demo.adminkit.io/css/light.css" rel="stylesheet">
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3">Invoice</h1>

    <div id="content-html" class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body m-sm-3 m-md-5">
            <div class="mb-4">
              Halo <strong>{{ Auth::user()->nama }}</strong>,
              <br />
              Ini adalah laporan pemesanan atau pembayaran <strong>Rp. {{ number_format($invoice->total_pembayaran,2,",",".") }}</strong> (Rupiah) yang anda lakukan melalui SIKENING.
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="text-muted">Kode Pembayaran.</div>
                <strong>#{{ $invoice->kode_pembayaran }}</strong>
              </div>
              <div class="col-md-6 text-md-end">
                <div class="text-muted">Tanggal Pembayaran</div>
                <strong>@if($invoice->metode_pembayaran == "langsung") Silakan membayar langsung di Cake Nining @else {{ $invoice->created_at->format("l, j F Y - h:m a") }} @endif</strong>
              </div>
            </div>

            <hr class="my-4" />

            <div class="row mb-4">
              <div class="col-md-6">
                <div class="text-muted">Pemesan</div>
                <strong>
                  {{ Auth::user()->nama }}
                </strong>
                <p>
                  {{ Auth::user()->alamat }} <br>
                  {{ Auth::user()->kota }} <br>
                  {{ Auth::user()->provinsi }} <br>
                  {{ Auth::user()->kode_pos }} <br>
                  <a href="#">
                    {{ Auth::user()->email }}
                  </a>
                </p>
              </div>
              <div class="col-md-6 text-md-end">
                <div class="text-muted">Pembayaran Kepada</div>
                @if($invoice->metode_pembayaran == "langsung")
                <strong>
                  Cake Nining
                </strong>
                <p>
                  Jl. Jend. Soedirman <br>
                  Sangatta <br>
                  Kalimantan Timur <br>
                  75312 <br>
                  <a href="#">
                    sikening.a6@gmail.com
                  </a>
                </p>
                @else
                <strong>
                  Cake Nining
                </strong>
                <p>
                  WA : 081243942304 <br>
                  Sallie Trixie Zebada Mansurina <br>
                  BNI <br>
                  0722323432 <br>
                  <a href="#">
                    sikening.a6@gmail.com
                  </a>
                </p>
                @endif
              </div>
            </div>

            <table class="table table-sm">
              <thead>
                <tr>
                  <th>Nama Menu</th>
                  <th>Jumlah</th>
                  <th class="text-end">Biaya</th>
                </tr>
              </thead>
              <tbody>
                <?php $harga = 0; ?>
                @foreach ($keranjang as $kr)
                <?php $harga += $kr->menu->harga * $kr->jumlah ?>
                <tr>
                  <td>{{ $kr->menu->nama }}</td>
                  <td>{{ $kr->jumlah }}</td>
                  <td class="text-end"> Rp. {{ number_format($kr->menu->harga * $kr->jumlah,2,",",".") }}</td>
                </tr>
                @endforeach
                <tr>
                  <th>&nbsp;</th>
                  <th>Subtotal </th>
                  <th class="text-end">Rp. {{ number_format($harga,2,",",".") }}</th>
                </tr>
                <tr>
                  <th>&nbsp;</th>
                  <th>Biaya Pengiriman </th>
                  <th class="text-end">@if($invoice->metode_pembayaran == "langsung") Rp. 0,00 @else Rp. 8.000,00 @endif</th>
                </tr>
                <tr>
                  <th>&nbsp;</th>
                  <th>Total </th>
                  <th class="text-end">Rp. {{ number_format($invoice->total_pembayaran,2,",",".") }}</th>
                </tr>
              </tbody>
            </table>
            <div class="text-center">
              <p class="text-sm">
                <strong>Catatan:</strong>
                Terima kasih telah memesan melalui SIKENING
                Pesanan anda akan segera kami proses, hubungi kami apabila memiliki kendala melalui 
                <a target="_blank" href="https://wa.me/+6281241944616?text=Saya%20ingin%20bertanya">Whatsapp</a> atau 
                <a href="mailto:sikening.a6@gmail.com">Email</a>
                {{-- Please send all items at the same time to the shipping address.
                Thanks in advance. --}}
              </p>
              <button type="button" id="cmd" class="btn btn-primary" disabled>
                Print this receipt
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<div id="editor-content"></div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>

{{-- <script>
  var doc = new jsPDF();
  var contenttoprint = document.getElementById("content-html");
  var specialElementHandlers = {
    '#editor-content': function (element, renderer) {
        return true;
    }
};


  $('#cmd').click(function () {
    html2canvas(contenttoprint, {width: 500}).then((canvas) => {
      doc.addImage(canvas.toDataURL("image/png"), "PNG", 5, 5, 500, 500)
    })
    doc.fromHTML($('#content-html').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});
</script> --}}
@endsection