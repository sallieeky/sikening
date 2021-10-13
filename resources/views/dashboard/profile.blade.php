@extends("base_views.dashboard")
@section("profile-active", "active")
@section("main")
<main class="content">
  <div class="container-fluid p-0">
    <div class="mb-3">
      <h1 class="h3 d-inline align-middle">Profile</h1>
    </div>
    <div class="row">
      <div class="col-md-4 col-xl-3">
        <div class="card mb-3">
          <div class="card-header">
            <h5 class="card-title mb-0">Profile Details</h5>
          </div>
          <div class="card-body text-center">
            <img src="{{ asset("dashboard_assets") }}/img/avatars/avatar-4.jpg" alt="Christina Mason" class="img-fluid rounded-circle mb-2" width="128" height="128" />
            <h5 class="card-title mb-0">Christina Mason</h5>
            <div class="text-muted mb-2">Lead Developer</div>

            <div>
              <a class="btn btn-primary btn-sm" href="#">Follow</a>
              <a class="btn btn-primary btn-sm" href="#"><span data-feather="message-square"></span> Message</a>
            </div>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <h5 class="h6 card-title">Skills</h5>
            <a href="#" class="badge bg-primary me-1 my-1">HTML</a>
            <a href="#" class="badge bg-primary me-1 my-1">JavaScript</a>
            <a href="#" class="badge bg-primary me-1 my-1">Sass</a>
            <a href="#" class="badge bg-primary me-1 my-1">Angular</a>
            <a href="#" class="badge bg-primary me-1 my-1">Vue</a>
            <a href="#" class="badge bg-primary me-1 my-1">React</a>
            <a href="#" class="badge bg-primary me-1 my-1">Redux</a>
            <a href="#" class="badge bg-primary me-1 my-1">UI</a>
            <a href="#" class="badge bg-primary me-1 my-1">UX</a>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <h5 class="h6 card-title">About</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span> Lives in <a href="#">San Francisco, SA</a></li>

              <li class="mb-1"><span data-feather="briefcase" class="feather-sm me-1"></span> Works at <a href="#">GitHub</a></li>
              <li class="mb-1"><span data-feather="map-pin" class="feather-sm me-1"></span> From <a href="#">Boston</a></li>
            </ul>
          </div>
          <hr class="my-0" />
          <div class="card-body">
            <h5 class="h6 card-title">Elsewhere</h5>
            <ul class="list-unstyled mb-0">
              <li class="mb-1"><a href="#">staciehall.co</a></li>
              <li class="mb-1"><a href="#">Twitter</a></li>
              <li class="mb-1"><a href="#">Facebook</a></li>
              <li class="mb-1"><a href="#">Instagram</a></li>
              <li class="mb-1"><a href="#">LinkedIn</a></li>
            </ul>
          </div>
        </div>
      </div>

      <div class="col-md-8 col-xl-9">
        <div class="tab-content">
          <div class="tab-pane fade show active" id="account" role="tabpanel">
            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Public info</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="col-md-8">
                      <div class="mb-3">
                        <label class="form-label" for="inputUsername">Username</label>
                        <input type="text" class="form-control" id="inputUsername" placeholder="Username">
                      </div>
                      <div class="mb-3">
                        <label class="form-label" for="inputUsername">Biography</label>
                        <textarea rows="2" class="form-control" id="inputBio"
                          placeholder="Tell something about yourself"></textarea>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="text-center">
                        <img id="img_foto_profile" alt="Charles Hall" src="{{ asset("dashboard_assets") }}/img/avatars/avatar.jpg" class="rounded-circle img-responsive mt-2"
                          width="128" height="128" style="object-fit: cover" />
                        <div class="mt-2">
                          <label for="foto_profile" class="btn btn-primary"><i class="align-middle" data-feather="upload"></i> Upload</label>
                          <input type="file" id="foto_profile" hidden accept="image/jpeg,image/jpg,image/png">
                        </div>
                        <small>For best results, use an image at least 128px by 128px in .jpg format</small>
                      </div>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h5 class="card-title mb-0">Private info</h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label class="form-label" for="inputFirstName">First name</label>
                      <input type="text" class="form-control" id="inputFirstName" placeholder="First name">
                    </div>
                    <div class="mb-3 col-md-6">
                      <label class="form-label" for="inputLastName">Last name</label>
                      <input type="text" class="form-control" id="inputLastName" placeholder="Last name">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputEmail4">Email</label>
                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                  </div>
                  <div class="row">
                    <div class="mb-3 col-md-6">
                      <label class="form-label" for="inputCity">City</label>
                      <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="mb-3 col-md-4">
                      <label class="form-label" for="inputState">State</label>
                      <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="mb-3 col-md-2">
                      <label class="form-label" for="inputZip">Zip</label>
                      <input type="text" class="form-control" id="inputZip">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="password" role="tabpanel">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Password</h5>
                <form>
                  <div class="mb-3">
                    <label class="form-label" for="inputPasswordCurrent">Current password</label>
                    <input type="password" class="form-control" id="inputPasswordCurrent">
                    <small><a href="#">Forgot your password?</a></small>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputPasswordNew">New password</label>
                    <input type="password" class="form-control" id="inputPasswordNew">
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputPasswordNew2">Verify password</label>
                    <input type="password" class="form-control" id="inputPasswordNew2">
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</main>

<script>
  const foto_profile = document.getElementById("foto_profile")
  const img_foto_profile = document.getElementById("img_foto_profile")

  foto_profile.onchange = evt => {
    const [file] = foto_profile.files
    if (file) {
        img_foto_profile.src = URL.createObjectURL(file)
    }
  }
</script>
@endsection