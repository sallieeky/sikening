@extends("base_views.authenticate_base")
@section("title", "Login")
@section("main")
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">
						<div class="text-center mt-4">
							<h1 class="h2">Selamat Datang di SIKENING</h1>
							<p class="lead">
								Login menggunakan akunmu untuk melanjutkan
							</p>
						</div>
						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<div class="text-center">
										<img src="{{ asset("assets/logo.png") }}" alt="Cake Nining" class="img-fluid rounded-circle" width="132" height="132" />
									</div>
									@if (session("pesan"))
									<div class="alert alert-warning alert-dismissible fade show" style="display: flex; padding: 12px 12px; border-radius: 3px; margin: 5px 0; background-color:#dc3545; justify-content: space-between" role="alert">
										<strong style="color: white">{{ session("pesan") }}</strong>
										<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
									</div>
									@endif
									<form action="/login" method="POST">
										@csrf
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg @error("email") is-invalid @enderror" type="email" name="email" placeholder="Masukkan Emailmu" value="{{ old("email") }}" />
											@error("email")
												<div id="validationServer03Feedback" class="invalid-feedback">
													{{ $message }}
												</div>
											@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg @error("password") is-invalid @enderror" type="password" name="password" placeholder="Masukkan Passwordmu" />
											@error("password")
												<div class="invalid-feedback">
													{{ $message }}
												</div>
											@enderror
											<small>
                        <a href="index.html">Lupa Password?</a>
                      </small>
										</div>
										<div class="text-center mt-3">
											{{-- <a href="index.html" class="btn btn-lg btn-primary">Sign in</a> --}}
											<button type="submit" class="btn btn-lg btn-primary">Login</button>
										</div>
										<a href="/registration" style="text-align: center; display: block; margin-top: 5px">Belum punya akun?</a>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
@endsection