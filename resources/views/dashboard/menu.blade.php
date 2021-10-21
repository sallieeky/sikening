@extends("base_views.dashboard")
@section("menu-active", "active")
@section("linkcss")
  <link rel="stylesheet" href="{{ asset("assets/css/dashboard_product.css") }}">

  <style>
    .product-grid:hover {
      background-color: #E3C26980; 
    }
  </style>
@endsection
@section("main")
<main class="content">
  <div class="container-fluid p-0">

    <h1 class="h3 mb-3"><strong>Menu</strong> SIKENING</h1>

    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex align-items-center" style="justify-content: space-between">
            <h5 class="card-title mb-0 pull-left">Menu-menu yang ada di Cake Nining</h5>
            <div class="d-flex align-items-center pull-right">
              <label for="myFilter" class="card-title mb-0">Cari:</label>
              <input type="text" class="form-control " onkeyup="myFunctionSearch()" id="myFilter">
            </div>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row" id="myProducts">
                @foreach ($menu as $mn)
                <div class="col-12 col-sm-8 col-md-6 col-lg-4 card-col-get">
                  <div class="card">
                    <img class="card-img" style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/" . $mn->gambar) }}" alt="{{ $mn->nama }}">
                    <div class="card-body">
                      <h4 class="card-title">{{ $mn->nama }}</h4>
                      <h6 class="card-subtitle mb-2 text-muted">Kategori : {{ $mn->kategori }}</h6>
                      <h6 class="card-subtitle mb-2 text-muted">Sisa Stok : {{ $mn->stok }}</h6>
                      <div class="options d-flex flex-fill my-1">
                          <input type="number" class="form-control" name="jumlah" id="jumlah" min="1" max="{{ $mn->stok }}" placeholder="Jumlah">
                      </div>
                      <div class="buy d-flex justify-content-between align-items-center">
                        <div class="price text-success"><h5 class="mt-4">Rp. {{ number_format($mn->harga,2,",",".") }}</h5></div>
                         <a href="#" class="btn btn-danger mt-3"><i class="align-middle" data-feather="shopping-cart"></i> Masukkan keranjang</a>
                      </div>
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
  </div>
</main>

<script>
function myFunctionSearch() {
  var input, filter, cards, cardContainer, title, i;
  input = document.getElementById("myFilter");
  filter = input.value.toUpperCase();
  cardContainer = document.getElementById("myProducts");
  cards = cardContainer.getElementsByClassName("card");
  cardscol = cardContainer.getElementsByClassName("card-col-get");
  for (i = 0; i < cards.length; i++) {
    title = cards[i].querySelector(".card-title");
    if (title.innerText.toUpperCase().indexOf(filter) > -1) {
      cards[i].style.display = "";
      cardscol[i].style.display = "";
    } else {
      cards[i].style.display = "none";
      cardscol[i].style.display = "none";
    }
  }
}

</script>
@endsection