@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <!-- Formulaire de recherche -->
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('articles.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <!-- Filtre par Quantité -->
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="quantite">Quantité :</label>
                    <input type="number" class="form-control @error('quantite') is-invalid @enderror" id="quantite"
                           name="quantite" placeholder="Quantité" value="{{ request()->get('quantite', '') }}">
                    @error('quantite')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Filtre par Prix Unitaire -->
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="prixUnitaire">Prix Unitaire :</label>
                    <input type="number" step="0.01" class="form-control @error('prixUnitaire') is-invalid @enderror"
                           id="prixUnitaire" name="prixUnitaire" placeholder="Prix Unitaire"
                           value="{{ request()->get('prixUnitaire', '') }}">
                    @error('prixUnitaire')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <!-- Bouton de soumission -->
                <div class="form-group col-sm-2 col-md-1 d-flex" style="margin-top: 14px; padding: 16px">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </form>
        </div>

        <!-- Tableau des résultats -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Liste des articles</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered table-hover text-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom Robe</th>
                                    <th>Quantité</th>
                                    <th>Prix Unitaire</th>
                                    <th>Date</th>
                                    <th>Mensurations</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($articlesList as $articles)
                                    <tr>
                                        <td>{{ $articles->id }}</td>
                                        <td>{{ $articles->robe->nom}}</td>
                                        <td>{{ $articles->quantite }}</td>
                                        <td>{{ $articles->prixUnitaire }}</td>
                                        <td>{{ $articles->created_at }}</td>
                                        <td>
                                            @if(auth('admin')->check())
                                                <!-- Boutons Modifier/Supprimer -->
                                                <a href="{{ route('articles.edit', $articles) }}"
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i> Modifier
                                                </a>
                                                <a href="{{ route('articles.delete', $articles) }}"
                                                   class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">
                                                    <i class="fas fa-trash-alt"></i> Supprimer
                                                </a>
                                            @endif
                                            <a href="{{ route('articles.mensurations', $articles) }}"
                                               class="btn btn-primary btn-sm">
                                                Voir mensurations
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7">Aucun article trouvé.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
