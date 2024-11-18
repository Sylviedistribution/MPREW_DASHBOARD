@extends('#layouts.app')

@section('contents')
    <div class="offset-2 col-md-7">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center">PASSER UNE COMMANDE</h3>
            <div class="card-body">
                <form method="POST" action="{{ route('commandes.store') }}">
                    @csrf

                    <!-- Section: User Information -->
                    <p class="text-uppercase">1. SELECTION DE L'UTILISATEUR</p>
                    <div class="form-group">
                        <label for="clientId" class="form-control-label">Email utilisateur</label>
                        <select class="form-control @error('clientId') is-invalid @enderror" name="clientId">
                            <option>Choissez l'email du client</option>
                            @foreach($clientsList as $client)
                                <option value="{{ $client->id }}">{{ $client->email }}</option>
                            @endforeach
                        </select>
                        @error('clientId')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Section: Création de Robes -->
                    <hr class="horizontal dark">
                    <p class="text-uppercase">2. Ajouter des Robes</p>
                    <div id="robes-container">
                        <div class="robe-item">
                            <p><strong>Robe 1</strong></p>

                            <!-- Coupe -->
                            <div class="form-group">
                                <label for="coupe_id" class="form-control-label">Coupe</label>
                                <select class="form-control @error('coupe_id') is-invalid @enderror"
                                        name="robes[0][coupe_id]" id="coupe_id">
                                    <option>Choisissez votre coupe</option>
                                    @foreach($coupesList as $coupe)
                                        <option value="{{ $coupe->id }}"
                                                data-image="{{ $coupe->imageUrl()}}">{{ $coupe->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Col -->
                            <div class="form-group">
                                <label for="col_id" class="form-control-label">Col</label>
                                <select class="form-control" name="robes[0][col_id]" id="col_id">
                                    <option>Choisissez votre col</option>
                                    @foreach($colsList as $col)
                                        <option value="{{ $col->id }}"
                                                data-image="{{ $col->imageUrl()}}">{{ $col->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Manches -->
                            <div class="form-group">
                                <label for="manche_id" class="form-control-label">Manches</label>
                                <select class="form-control" name="robes[0][manche_id]" id="manche_id">
                                    <option>Choisissez vos manches</option>
                                    @foreach($manchesList as $manche)
                                        <option value="{{ $manche->id }}"
                                                data-image="{{ $manche->imageUrl()}}">{{ $manche->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Jupes -->
                            <div class="form-group">
                                <label for="jupe_id" class="form-control-label">Jupe</label>
                                <select class="form-control" name="robes[0][jupe_id]" id="jupe_id">
                                    <option>Choisissez votre jupe</option>
                                    @foreach($jupesList as $jupe)
                                        <option value="{{ $jupe->id }}"
                                                data-image="{{ $jupe->imageUrl()}}">{{ $jupe->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tissus -->
                            <div class="form-group">
                                <label for="tissu_id" class="form-control-label">Tissu</label>
                                <select class="form-control" name="robes[0][tissu_id]" id="tissu_id">
                                    <option>Choisissez votre tissu</option>
                                    @foreach($tissusList as $tissu)
                                        <option value="{{ $tissu->id }}"
                                                data-image="{{ $tissu->imageUrl()}}">{{ $tissu->nom }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Quantité -->
                            <div class="form-group">
                                <label for="quantite" class="form-control-label">Quantité</label>
                                <input type="number" class="form-control" name="robes[0][quantite]" min="1" value="1">
                            </div>

                            <hr class="horizontal dark">
                        </div>
                    </div>

                    <button type="button" class="btn btn-secondary" id="add-robe">Ajouter une autre robe</button>
                    <button type="submit" class="btn btn-primary">Enregistrer la Commande</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        let robeIndex = 1; // Compteur pour gérer l'index des robes ajoutées dynamiquement

        document.getElementById('add-robe').addEventListener('click', function () {
            const container = document.getElementById('robes-container');
            const newRobe = `
             <div class="robe-item">
                <p><strong>Robe ${robeIndex + 1}</strong></p>
                <div class="form-group">
                    <label>Coupe</label>
                    <select class="form-control element-robe" name="robes[${robeIndex}][coupe_id]">
                        @foreach($coupesList as $coupe)
                            <option value="{{ $coupe->id }}">{{ $coupe->nom }}</option>
                        @endforeach
                     </select>
                  </div>

                <div class="form-group">
                    <label>Col</label>
                    <select class="form-control element-robe" name="robes[${robeIndex}][col_id]">
                        @foreach($colsList as $col)
                            <option value="{{ $col->id }}">{{ $col->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Manches</label>
                    <select class="form-control element-robe" name="robes[${robeIndex}][manche_id]">
                        @foreach($manchesList as $manche)
                             <option value="{{ $manche->id }}">{{ $manche->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Jupe</label>
                    <select class="form-control element-robe" name="robes[${robeIndex}][jupe_id]">
                        @foreach($jupesList as $jupe)
                            <option value="{{ $jupe->id }}">{{ $jupe->nom }}</option>
                        @endforeach
                      </select>
                </div>

                <div class="form-group">
                    <label>Tissu</label>
                    <select class="form-control element-robe" name="robes[${robeIndex}][tissu_id]">
                        @foreach($tissusList as $tissu)
                            <option value="{{ $tissu->id }}">{{ $tissu->nom }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Quantité -->

                <div class="form-group">
                    <label for="quantite" class="form-control-label">Quantité</label>
                    <input type="number" class="form-control" name="robes[${robeIndex}][quantite]" min="1" value="1">
                </div>

             </div>
        <button type="button" class="btn btn-danger remove-robe">Supprimer</button>
        <hr class="horizontal dark">
    </div>`;

    container.insertAdjacentHTML('beforeend', newRobe); // Ajout de la robe dans le DOM
            robeIndex++; // Incrémenter l'index
    });

        document.getElementById('robes-container').addEventListener('click', function (event) {
            if (event.target.classList.contains('remove-robe')) {
                event.target.closest('.robe-item').remove();
            }
        });
    </script>
@endsection
