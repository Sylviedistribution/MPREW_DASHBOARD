@extends('#layouts.app')

@section('contents')
    <div class="offset-2 col-md-7">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center">PASSER UNE COMMANDE</h3>
            <div class="card-body">
                <!-- Section: User Information -->
                <p class="text-uppercase">1. SELECTION DE L'UTILISATEUR</p>
                <form method="POST" action="{{ route('commandes.update',$commande) }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email" class="form-control-label">Email utilisateur</label>
                                <select class="form-control @error('email') is-invalid @enderror" name="email">
                                    <option>Choissez l'email du client</option>
                                    @foreach($clientsList as $client)
                                        <option
                                            value="{{$client->email}}" {{ old('email') == $client->email ? 'selected' : '' }}>{{$client->email}}</option>
                                    @endforeach
                                </select>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Section de Création de la Robe -->
                    <hr class="horizontal dark">
                    <p class="text-uppercase">2. Création de la Robe</p>
                    <div class="form-group">
                        <label for="coupe_id" class="form-control-label">Coupe</label>
                        <select class="form-control @error('coupe_id') is-invalid @enderror" id="coupe_id"
                                name="coupe_id">
                            <option>Choisissez votre coupe</option>
                            @foreach($coupesList as $coupe)
                                <option
                                    value="{{$coupe->id}}" {{ old('coupe_id') == $coupe->id ? 'selected' : '' }}>{{$coupe->nom}}</option>
                            @endforeach
                        </select>
                        @error('coupe_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="col_id" class="form-control-label">Col</label>
                        <select class="form-control @error('col_id') is-invalid @enderror" id="col_id" name="col_id">
                            <option>Choisissez votre col</option>
                            @foreach($colsList as $col)
                                <option
                                    value="{{$col->id}}" {{ old('col_id') == $col->id ? 'selected' : '' }}>{{$col->nom}}</option>
                            @endforeach
                        </select>
                        @error('col_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="manche_id" class="form-control-label">Manches</label>
                        <select class="form-control @error('manche_id') is-invalid @enderror" id="manche_id"
                                name="manche_id">
                            <option>Choisissez vos manches</option>
                            @foreach($manchesList as $manche)
                                <option
                                    value="{{$manche->id}}" {{ old('manche_id') == $manche->id ? 'selected' : '' }}>{{$manche->nom}}</option>
                            @endforeach
                        </select>
                        @error('manche_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jupe_id" class="form-control-label">Jupes</label>
                        <select class="form-control @error('jupe_id') is-invalid @enderror" id="jupe_id" name="jupe_id">
                            <option>Choisissez votre jupe</option>
                            @foreach($jupesList as $jupe)
                                <option
                                    value="{{$jupe->id}}" {{ old('jupe_id') == $jupe->id ? 'selected' : '' }}>{{$jupe->nom}}</option>
                            @endforeach
                        </select>
                        @error('jupe_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Enregistrer la Commande</button>
                </form>
            </div>
        </div>
    </div>
@endsection
