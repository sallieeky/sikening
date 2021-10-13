@extends("base_views.authenticate_base")
@section("title", "Pendaftaran Akun")
@section("main")
	<main class="d-flex w-100">
		<div class="container d-flex flex-column">
			<div class="row vh-100">
				<div class="col-sm-10 col-md-8 col-lg-6 mx-auto d-table h-100">
					<div class="d-table-cell align-middle">

						<div class="text-center mt-4">
							<h1 class="h2">Pendaftaran</h1>
							<p class="lead">
								Silakan mendaftar untuk dapat masuk kedalam SIKENING 
							</p>
						</div>

						<div class="card">
							<div class="card-body">
								<div class="m-sm-4">
									<form action="/registration" method="POST">
                    @csrf
										<div class="mb-3">
											<label class="form-label">Nama</label>
											<input class="form-control form-control-lg @error("nama") is-invalid @enderror" type="text" name="nama" placeholder="Masukkan Nama" value="{{ old("nama") }}" />
											@error("nama")
											<div id="validationServer03Feedback" class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Email</label>
											<input class="form-control form-control-lg @error("email") is-invalid @enderror" type="email" name="email" placeholder="Masukkan Email" value="{{ old("email") }}" />
											@error("email")
											<div id="validationServer03Feedback" class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
										<div class="mb-3">
											<label class="form-label">Password</label>
											<input class="form-control form-control-lg @error("password") is-invalid @enderror" type="password" name="password" placeholder="Masukkan Password" />
											@error("password")
											<div class="invalid-feedback">
												{{ $message }}
											</div>
											@enderror
										</div>
										<div class="text-center mt-3">
											<button type="submit" class="btn btn-lg btn-primary">Daftar</button>
										</div>
										<a href="/login" style="text-align: center; display: block; margin-top: 5px">Sudah memiliki akun?</a>
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