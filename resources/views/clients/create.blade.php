@extends('#layouts.app')

@section('contents')
    <div class="offset-2 col-md-8">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center">INSCRIRE UN CLIENT</h3>
            <div class="card-body">
                <p class="text-uppercase ">INFORMATIONS UTILISATEUR</p>
                <form method="POST" action="{{ route('clients.store') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username" class="form-control-label">Username</label>
                                <input class="form-control" name="username" type="text" value="lucky.jesse"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email</label>
                                <input class="form-control" name="email" type="email" value="jesse@example.com"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <input class="form-control" name="password" type="password" value="Jesse"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="genre" class="form-control-label">Genre</label>
                                <input class="form-control" name="genre" type="genre" value="Jesse"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="mesurations" class="form-control-label">Mensurations</label>
                                <span class="text-muted d-block mb-3">
                                    Veuillez entrer les mensurations suivantes en centimètres :
                                    {"tourCou": 0, "largeurEpaule": 0, "tourPoitrine": 0, "hauteurPoitrine": 0,"tourDessousPoitrine": 0, "tourTaille": 0, "tourTailleHaute": 0, "tourHanche": 0, "tourBras": 0, "longueurBras": 0, "longueurManches": 0, "tourPoignet": 0, "longueurDos": 0, "longueurRobe": 0}
                                </span>
                                <input class="form-control" name="mesurations" type="mesurations" value="Jesse"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>

                    <hr class="horizontal dark">
                    <p class="text-uppercase ">Contact Information</p>
                    <div class="row">
                        <div class="col-md-8 mb-0">
                            <div class="form-group">
                                <label for="address" class="form-control-label">Adresse</label>
                                <input class="form-control" name="address" type="text"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                        <div class="col-md-4 mb-0">
                            <div class="form-group">
                                <label for="phone" class="form-control-label">Telephone</label>
                                <input class="form-control" name="phone" type="text"
                                       onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                        </div>
                    </div>

                    <div class="form-group mt-3">
                        <a href="{{route("clients.store")}}" class="btn btn-primary">Inscrire</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
