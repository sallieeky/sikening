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
          <div class="card-header">
            <h5 class="card-title mb-0">Menu-menu yang ada di Cake Nining</h5>
          </div>
          <div class="card-body">
            <div class="container">
              <div class="row">
                @foreach ($menu as $mn)
                  <div class="col-md-3 col-sm-6 mb-3">
                      <div class="product-grid" style="border-radius: 5px">
                          <div class="product-image">
                              <a href="#" class="image">
                                  <img class="pic-1" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/" . $mn->gambar) }}">
                                  <img class="pic-2" style="height: 150px; object-fit: cover" src="{{ asset("storage/menu/" . $mn->gambar) }}">
                              </a>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">{{ $mn->nama }}</a></h3>
                              <div class="price">Rp. {{ number_format($mn->harga,2,",",".") }}</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div>
                @endforeach
                  {{-- <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#" class="image">
                                <img class="pic-1" style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                                <img class="pic-2"style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">Women's Shirt</a></h3>
                              <div class="price">$12.30</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#" class="image">
                                <img class="pic-1" style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                                <img class="pic-2"style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">Women's Shirt</a></h3>
                              <div class="price">$12.30</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                      <div class="product-grid">
                          <div class="product-image">
                              <a href="#" class="image">
                                <img class="pic-1" style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                                <img class="pic-2"style="height: 200px; object-fit: cover" src="{{ asset("storage/menu/risoles.jpg") }}">
                              </a>
                              <span class="product-sale-label">hot</span>
                          </div>
                          <div class="product-content">
                              <h3 class="title"><a href="#">Women's Shirt</a></h3>
                              <div class="price">$12.30</div>
                              <div class="product-button-group">
                                  <a class="add-to-cart" href="#"><i class="fa fa-shopping-bag"></i>ADD TO CART</a>
                              </div>
                          </div>
                      </div>
                  </div> --}}
              </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection