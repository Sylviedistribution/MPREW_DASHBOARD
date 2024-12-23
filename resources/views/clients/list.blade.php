@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('clients.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="username" class="form-label">Nom d'utilisateur:</label>
                    <input type="text" class="form-control  @error('username') is-invalid @enderror" id="username"
                           name="username" value="{{ request()->get('username', '') }}">
                    @error('username')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="email" class="form-label">Email:</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror" id="email"
                           name="email" value="{{ request()->get('email', '') }}">
                    @error('email')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="genre" class="form-label">Genre:</label>
                    <select class="form-select  @error('genre') is-invalid @enderror" name="genre">
                        <option value="">-- Sélectionner --</option>
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select> @error('genre')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="etat" class="form-label">État:</label>
                    <select class="form-select  @error('etat') is-invalid @enderror" name="etat">
                        <option value="">-- Sélectionner --</option>
                        <option value="1">Actif</option>
                        <option value="0">Bloqué</option>
                    </select>
                    @error('etat')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror

                </div>
                <div class="form-group col-sm-2 col-md-1 d-flex" style="margin-top: 14px; padding: 16px">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center pb-0">
                        <h6>Liste des clients</h6>
                        <a href="{{ route('clients.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Ajouter un client
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered text-center align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom d'utilisateur</th>
                                    <th>Email</th>
                                    <th>Adresse</th>
                                    <th>Mensurations</th>
                                    <th>Genre</th>
                                    <th>État</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($clientsList as $client)
                                    <tr>
                                        <td>{{ $client->id }}</td>
                                        <td>{{ $client->username }}</td>
                                        <td>{{ $client->email }}</td>
                                        <td>{{ $client->adresse }}</td>
                                        <td> <a href="{{route('clients.mensurations',$client)}}" class="btn btn-info btn-sm">
                                                <i class="fas fa-edit"></i> Afficher
                                            </a></td>
                                        <td>{{ $client->genre }}</td>
                                        <td>
                                            <span
                                                class="badge badge-sm bg-gradient-{{$client->etat?'success':'secondary'}}">{{$client->etat?'Actif':'Bloqué'}} </span>
                                        </td>
                                        <td>
                                            <a href="{{route('clients.edit',$client)}}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Modifier
                                            </a>
                                            <a href="{{route('clients.delete',$client)}}" class="btn btn-danger btn-sm"
                                               onclick='return confirm("Êtes-vous sûr de vouloir supprimer ce client ?")'>
                                                <i class="fas fa-trash-alt"></i> Supprimer
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3 d-flex justify-content-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
