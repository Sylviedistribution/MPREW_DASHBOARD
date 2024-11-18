@extends('#layouts.app')

@section('contents')
    <div class="offset-3 col-md-6">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center mt-3">AJOUTER DES TISSUS</h3>
            <div class="card-body">
                <form method="POST" action="{{ route('tissus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <!-- Nom -->
                    <div class="form-group">
                        <label for="nom" class="form-control-label">Nom</label>
                        <input class="form-control" name="nom" type="text" id="nom" required
                               placeholder="Entrez le nom du tissu">
                    </div>

                    <!-- Description -->
                    <div class="form-group">
                        <label for="description" class="form-control-label">Description</label>
                        <textarea class="form-control" id="description" name="description" required
                                  placeholder="Décrivez vos tissus..."></textarea>
                    </div>

                    <!-- Image -->
                    <div class="form-group">
                        <label for="image" class="form-control-label">Choisir une photo</label>
                        <input type="file" id="image" name="image" accept="image/*" required
                               onchange="previewImage(event)"
                               class="form-control @error('image') is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Prévisualisation -->
                    <div class="form-group">
                        <img id="preview" src="#" alt="Aperçu de l'image"
                             style="display: none; width: 100%; max-height: 200px; object-fit: contain; margin-top: 10px;">
                    </div>

                    <!-- Bouton de soumission -->
                    <div class="form-group text-center mt-3">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
