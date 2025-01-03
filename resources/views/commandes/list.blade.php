@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('commandes.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateDebut">Date début:</label>
                    <input type="date" class="form-control @error('dateDebut') is-invalid @enderror" id="dateDebut"
                           name="dateDebut" value="{{ request()->get('dateDebut', '') }}">
                    @error('dateDebut')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateFin">Date fin:</label>
                    <input type="date" class="form-control @error('dateFin') is-invalid @enderror" id="dateFin"
                           name="dateFin" value="{{ request()->get('dateFin', '') }}">
                    @error('dateFin')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="total">Total:</label>
                    <input type="text" class="form-control @error('total') is-invalid @enderror" id="total" name="total"
                           placeholder="XX FCFA" value="{{ request()->get('total', '') }}">
                    @error('total')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="statut">Statut:</label>
                    <select class="form-select" name="statut">
                        <option value="">-- Sélectionner --</option>
                        <option value="EN_PREPARATION">EN ATTENTE</option>
                        <option value="EN_ATTENTE">EN PREPARATION</option>
                        <option value="TERMINEE">TERMINEE</option>
                    </select> @error('statut')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="email">Email:</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                           name="email" value="{{ request()->get('email', '') }}">
                    @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
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
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Liste des commandes</h6>
                        <a href="{{ route('commandes.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Passer une commande
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered text-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Date</th>
                                    <th>Total</th>
                                    <th>Statut</th>
                                    <th>Email client</th>
                                    <th>Téléphone</th>
                                    <th>Voir articles</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($commandesList as $commande)
                                <tr>
                                    <td>{{$commande->id}}</td>
                                    <td>{{$commande->date}}</td>
                                    <td>{{$commande->total}}</td>
                                    <td>{{$commande->statut}}</td>
                                    <td>{{$commande->client->email }}</td>
                                    <td>{{$commande->client->telephone }}</td>
                                    <td>
                                        <a href="{{route('commandes.articles',$commande)}}" class="btn btn-info btn-sm">
                                            <i class="fas fa-eye"></i> Articles
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{route('commandes.delete',$commande)}}" class="btn btn-danger btn-sm"
                                           onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette commande ?")'>
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
