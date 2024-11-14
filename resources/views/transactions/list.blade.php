@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div>
            <form method="GET" action="{{ route('transactions.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="type">Type:</label>
                    <select class="form-control" id="type" name="type">
                        <option value="">-- Sélectionner --</option>
                        <option value="Entrée">Entrée</option>
                        <option value="Sortie">Sortie</option>
                    </select>
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="montant">Montant:</label>
                    <input type="text" class="form-control" id="montant" name="montant" placeholder="XX FCFA">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="date">Date:</label>
                    <input type="date" class="form-control" id="date" name="date">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="artisanId">Identifiant Artisan:</label>
                    <input type="text" class="form-control" id="artisanId" name="artisanId"
                           value="{{ request()->get('artisanId', '') }}">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="paiementId">Identifiant Paiement:</label>
                    <input type="text" class="form-control" id="paiementId" name="paiementId"
                           value="{{ request()->get('paiementId', '') }}">
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
                        <h6>Liste des transactions</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered text-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Type</th>
                                    <th>Montant</th>
                                    <th>Date</th>
                                    <th>Identifiant Artisan</th>
                                    <th>Identifiant Paiement</th>
                                    <th>Compte Séquestre Id</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>00123</td>
                                    <td>Entrée</td>
                                    <td>XX FCFA</td>
                                    <td>23/04/18</td>
                                    <td>001</td>
                                    <td>00234</td>
                                    <td>12345</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm"
                                           onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette transaction ?")'>
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </a>
                                    </td>
                                </tr>
                                <!-- Ajoutez des lignes supplémentaires si nécessaire -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
