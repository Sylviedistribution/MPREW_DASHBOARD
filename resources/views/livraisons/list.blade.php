@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('livraisons.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateDebut">Date début:</label>
                    <input type="date"
                           class="form-control @error('dateDebut') is-invalid @enderror"
                           id="dateDebut"
                           name="dateDebut"
                           value="{{ request()->get('dateDebut', '') }}">
                    @error('dateDebut')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateFin">Date fin:</label>
                    <input type="date"
                           class="form-control @error('dateFin') is-invalid @enderror"
                           id="dateFin"
                           name="dateFin"
                           value="{{ request()->get('dateFin', '') }}">
                    @error('dateFin')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="statut">Statut</label>
                    <select class="form-select @error('statut') is-invalid @enderror" name="statut">
                        <option value="">-- Sélectionner --</option>
                        <option value="1" {{ request()->get('statut') == '1' ? 'selected' : '' }}>En préparation
                        </option>
                        <option value="0" {{ request()->get('statut') == '0' ? 'selected' : '' }}>Terminée</option>
                    </select>
                    @error('statut')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="commandeId">Commande Id</label>
                    <input type="text"
                           class="form-control @error('commandeId') is-invalid @enderror"
                           id="commandeId"
                           name="commandeId"
                           value="{{ request()->get('commandeId', '') }}">
                    @error('commandeId')
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
                    <div class="card-header pb-0">
                        <h6>Liste des livraisons</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered text-center align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Date</th>
                                    <th>Statut</th>
                                    <th>Identifiant commande</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($livraisonsList as $livraison)
                                    <tr>
                                        <td>{{$livraison->id}}</td>
                                        <td>{{$livraison->date}}</td>
                                        <td>{{$livraison->statut}}</td>
                                        <td>{{$livraison->commandeId}}</td>
                                        <td>
                                            <a href="{{route('livraison.edit',$livraison)}}"
                                               class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Modifier
                                            </a>
                                            <a href="{{route('livraison.delete',$livraison)}}"
                                               class="btn btn-danger btn-sm"
                                               onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette transaction ?")'>
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
