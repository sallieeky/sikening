@extends("base_views.dashboard")
@section("keranjang-active", "active")
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <section>
      <div class="row">
        <div class="col-lg-8 mb-4">
          <div class="card wish-list pb-1">
            <div class="card-body">
              <h5 class="mb-2">Billing details</h5>
              <div class="row">
                <div class="col-lg-6">
                  <div class="md-form md-outline mb-0 mb-lg-4">
                    <label for="firstName">First name</label>
                    <input type="text" id="firstName" class="form-control mb-0 mb-lg-2">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="md-form md-outline">
                    <label for="lastName">Last name</label>
                    <input type="text" id="lastName" class="form-control">
                  </div>
                </div>
              </div>
              <div class="md-form md-outline my-0">
                <label for="companyName">Company name (optional)</label>
                <input type="text" id="companyName" class="form-control mb-0">
              </div>
              <div class="d-flex flex-wrap">
                <div class="select-outline position-relative w-100">
                  <label>Country</label>
                  <select class="form-control">
                    <option value="" disabled selected>Choose your option</option>
                    <option value="1">Option 1</option>
                    <option value="2">Option 2</option>
                    <option value="3">Option 3</option>
                  </select>
                </div>
              </div>
              <div class="md-form md-outline mt-0">
                <label for="form14">Address</label>
                <input type="text" id="form14" placeholder="House number and street name" class="form-control">
              </div>
              <div class="md-form md-outline">
                <label for="form15">Address</label>
                <input type="text" id="form15" placeholder="Apartment, suite, unit etc. (optional)"
                  class="form-control">
              </div>
              <div class="md-form md-outline">
                <label for="form16">Postcode / ZIP</label>
                <input type="text" id="form16" class="form-control">
              </div>
              <div class="md-form md-outline">
                <label for="form17">Town / City</label>
                <input type="text" id="form17" class="form-control">
              </div>
              <div class="md-form md-outline">
                <label for="form18">Phone</label>
                <input type="number" id="form18" class="form-control">
              </div>
              <div class="md-form md-outline">
                <label for="form19">Email address</label>
                <input type="email" id="form19" class="form-control">
              </div>
              <div class="md-form md-outline">
                <label for="form76">Additional information</label>
                <textarea id="form76" class="md-textarea form-control" rows="4"></textarea>
              </div>
              <div class="form-check pl-0 mb-4 mb-lg-0">
                <label class="form-check-label small text-uppercase card-link-secondary" for="new3">Create an
                  account?</label>
                <input type="checkbox" class="form-check-input filled-in" id="new3">
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card mb-4">
            <div class="card-body">
              <h5 class="mb-3">The total amount of</h5>
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                  Temporary amount
                  <span>$53.98</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                  Shipping
                  <span>Gratis</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                  <div>
                    <strong>The total amount of</strong>
                    <strong>
                      <p class="mb-0">(including VAT)</p>
                    </strong>
                  </div>
                  <span><strong>$53.98</strong></span>
                </li>
              </ul>
              <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Make purchase</button>
            </div>
          </div>
          <div class="card mb-4">
            <div class="card-body">
              <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
                aria-expanded="false" aria-controls="collapseExample">
                Add a discount code (optional)
                <span><i class="fas fa-chevron-down pt-1"></i></span>
              </a>
              <div class="collapse" id="collapseExample">
                <div class="mt-3">
                  <div class="md-form md-outline mb-0">
                    <input type="text" id="discount-code" class="form-control font-weight-light"
                      placeholder="Enter discount code">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
</main>

@endsection