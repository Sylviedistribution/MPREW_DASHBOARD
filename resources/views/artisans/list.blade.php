@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('artisans.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="username">Nom d'utilisateur:</label>
                    <input type="text" class="form-control" id="username" name="username"
                           value="{{ request()->get('username', '') }}">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="{{ request()->get('email', '') }}">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="telephone">Telephone:</label>
                    <input type="text" class="form-control" id="telephone" name="telephone"
                           value="{{ request()->get('telephone', '') }}">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="etat">Etat:</label>
                    <select class="form-control" id="etat" name="etat">
                        <option value="">-- Sélectionner --</option>
                        <option value="1">Actif</option>
                        <option value="0">Bloqué</option>
                    </select>
                </div>

                <div class="form-group col-sm-2 col-md-1 d-flex" style="margin-top: 14px; padding: 16px">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Liste des artisans</h6>
                        <a href="{{ route('artisans.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Ajouter un artisan
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
                                    <th>Téléphone</th>
                                    <th>Adresse</th>
                                    <th>Etat</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($artisansList as $artisan)
                                <tr>
                                    <td>{{$artisan->id}}</td>
                                    <td>{{$artisan->username}}</td>
                                    <td>{{$artisan->email}}</td>
                                    <td>{{$artisan->telephone}}</td>
                                    <td>{{$artisan->adresse}}</td>
                                    <td>
                                        <span class="badge badge-sm bg-gradient-{{$artisan->etat?'success':'secondary'}}">{{$artisan->etat?'Actif':'Bloqué'}} </span></td>
                                    <td>
                                        <a href="{{route('artisans.edit',$artisan)}}" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <a href="{{route('artisans.delete',$artisan)}}" class="btn btn-danger btn-sm" onclick='return confirm("Êtes-vous sûr de vouloir supprimer cet artisan ?")'>
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </a>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
