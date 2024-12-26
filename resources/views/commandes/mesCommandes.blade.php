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
                        <option value="En préparation">En préparation
                        </option>
                        <option value="Terminee">Terminée</option>
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
                                    <th>Date limite livraison</th>
                                    <th>Total</th>
                                    <th>Statut</th>
                                    <th>Adresse</th>
                                    <th>Téléphone client</th>
                                    <th>Voir articles</th>
                                    <th>Options</th>
                                    <th>Livrer</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($commandesList as $index => $commande)
                                    <tr>
                                        <td>{{ $commande->id }}</td>
                                        <td>{{ $commande->date }}</td>
                                        <td class="@if(\Carbon\Carbon::now() < $commande->dateFin()) text-success @else text-danger @endif">{{ $commande->dateFin() }}</td>
                                        <td>{{ $commande->total }} CFA</td>
                                        <td>{{ $commande->statut }}</td>
                                        <td>{{ $commande->client->adresse }}</td>
                                        <td>{{ $commande->client->telephone }}</td>
                                        <td>
                                            <a href="{{ route('commandes.articles', $commande) }}"
                                               class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Articles
                                            </a>
                                        </td>
                                        <td>
                                            <form method="POST"
                                                  action="{{ route('commandes.updateStatus', $commande) }}">
                                                @csrf
                                                <select name="statut" class="form-select form-select-sm">
                                                    <option></option>
                                                    @foreach($statut as $s)
                                                        <option value="{{ $s }}">{{ $s }}</option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="btn btn-sm btn-primary mt-2">MAJ</button>
                                            </form>
                                        </td>
                                        <td>
                                            @if(isset($coordinates[$index]))
                                                <div class="ya-taxi-widget"
                                                     data-ref="MPREW"
                                                     data-clid="ak240826"
                                                     data-apikey="xDOfBYEceqUpxtUYPGGhpYHDeWcjEpdsAC"
                                                     data-theme="dark"
                                                     data-size="xs"
                                                     data-title="Livrer robe"
                                                     data-use-location="true"
                                                     data-app="2187871"
                                                     data-point-b="14.738567,-17.456528"
                                                     data-proxy-url="https://yango.go.link/route?start-lat={start-lat}&start-lon={start-lon}&end-lat={end-lat}&end-lon={end-lon}&adj_adgroup=widget&ref={ref}&adj_t=vokme8e_nd9s9z9&lang=ru&adj_deeplink_js=1&utm_source=widget&adj_fallback=https%3A%2F%2Fyango.com%2Fen_int%2Forder%2F%3Fgfrom%3D{start-lon}%2C{start-lat}%26gto%3D{end-lon}%2C{end-lat}%26ref%3D{ref}"
                                                     data-lang="fr">
                                                </div>
                                            @endif
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
