@extends('#layouts.app')

@section('contents')
    <div class="offset-3 col-md-6">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center">AJOUTER UN COL</h3>
            <div class="card-body offset-2">
                <form method="POST" action="{{ route('cols.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="nom" class="form-control-label">Nom</label>
                            <input class="form-control @error('nom') is-invalid @enderror" name="nom" type="text"
                                   onfocus="focused(this)" onfocusout="defocused(this)">
                            @error('nom')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="description" class="form-control-label">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description"
                                      name="description" placeholder="Décrivez votre col..."></textarea>
                            @error('description')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="image" class="form-control-label">Choisir une photo</label>
                            <input type="file" id="image" name="image" accept="image/*"
                                   onchange="previewImage(event)"
                                   class="form-control @error('image') is-invalid @enderror"><br>
                            @error('image')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Image Preview -->
                    <div class="col-md-8">
                        <img id="preview" src="#" alt="Aperçu de l'image"
                             style="display: none; width: 50%; height: 150px;">
                    </div>

                    <div class="form-group mt-3">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
