@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div>
            <form method="GET" action="{{ route('transactions.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="type">Type:</label>
                    <select class="form-control @error('type') is-invalid @enderror" id="type" name="type">
                        <option value="">-- Sélectionner --</option>
                        <option value="Entrée" {{ old('type') == 'Entrée' ? 'selected' : '' }}>Entrée</option>
                        <option value="Sortie" {{ old('type') == 'Sortie' ? 'selected' : '' }}>Sortie</option>
                    </select>
                    @error('type')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="montant">Montant:</label>
                    <input type="text" class="form-control @error('montant') is-invalid @enderror" id="montant"
                           name="montant"
                           placeholder="XX FCFA" value="{{ old('montant') }}">
                    @error('montant')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="date">Date:</label>
                    <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date"
                           value="{{ old('date') }}">
                    @error('date')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="artisanId">Identifiant Artisan:</label>
                    <input type="text" class="form-control @error('artisanId') is-invalid @enderror" id="artisanId"
                           name="artisanId"
                           value="{{ old('artisanId') }}">
                    @error('artisanId')
                    <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="paiementId">Identifiant Paiement:</label>
                    <input type="text" class="form-control @error('paiementId') is-invalid @enderror" id="paiementId"
                           name="paiementId"
                           value="{{ old('paiementId') }}">
                    @error('paiementId')
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
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($transactionsList as $transaction)
                                <tr>
                                    <td>{{$transaction->id}}</td>
                                    <td>{{$transaction->type}}</td>
                                    <td>{{$transaction->montant}}</td>
                                    <td>{{$transaction->date}}</td>
                                    <td>{{$transaction->artisan->email}}</td>
                                    <td>{{$transaction->paiementId}}</td>
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
