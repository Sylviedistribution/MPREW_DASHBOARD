@extends('#layouts.app')

@section('contents')
    <div class="offset-2 col-md-8">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center">INSCRIRE UN ARTISAN</h3>
            <div class="card-body">
                <p class="text-uppercase ">INFORMATIONS UTILISATEUR</p>
                <form method="POST" action="{{ route('artisans.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="form-control-label">Nom d'utilisateur</label>
                                <input class="form-control @error('username') is-invalid @enderror"
                                       name="username" type="text" value="{{ old('username') }}"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('username')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control @error('email') is-invalid @enderror"
                                       name="email" type="email" value="{{ old('email') }}"
                                       placeholder="jesse@example.com" onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-control-label">Mot de passe</label>
                                <input class="form-control @error('password') is-invalid @enderror"
                                       name="password" type="password" onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <p class="text-uppercase ">Informations de prise de contact</p>
                    <div class="row">
                        <div class="col-md-8 mb-0">
                            <div class="form-group">
                                <label for="adresse" class="form-control-label">Adresse</label>
                                <input class="form-control @error('adresse') is-invalid @enderror"
                                       name="adresse" type="text" value="{{ old('adresse') }}"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('adresse')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4 mb-0">
                            <div class="form-group">
                                <label for="telephone" class="form-control-label">Telephone</label>
                                <input class="form-control @error('telephone') is-invalid @enderror"
                                       name="telephone" type="text" value="{{ old('telephone') }}"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                                @error('telephone')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Inscrire</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
