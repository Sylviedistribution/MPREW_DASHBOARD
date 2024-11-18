@extends('#layouts.app')

@section('contents')
    <div class="offset-2 col-md-7">
        <div class="card" style="background-color: #b3d4fc">
            <h3 class="text-center">CRÉER UNE ROBE</h3>
            <div class="card-body">
                <!-- Section de Création de la Robe -->
                <form method="POST" action="{{ route('robes.store') }}">
                    @csrf

                    <!-- Coupe -->
                    <div class="form-group">
                        <label for="coupe_id" class="form-control-label">Coupe</label>
                        <select class="form-control @error('coupe_id') is-invalid @enderror" id="coupe_id" name="coupeId">
                            <option>Choisissez votre coupe</option>
                            @foreach($coupesList as $coupe)
                                <option value="{{ $coupe->id }}" data-image="{{$coupe->imageUrl()}}">
                                    {{ $coupe->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('coupe_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Col -->
                    <div class="form-group">
                        <label for="col_id" class="form-control-label">Col</label>
                        <select class="form-control @error('col_id') is-invalid @enderror" id="col_id" name="colId">
                            <option>Choisissez votre col</option>
                            @foreach($colsList as $col)
                                <option value="{{ $col->id }}" data-image="{{ $col->imageUrl() }}">
                                    {{ $col->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('col_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Manches -->
                    <div class="form-group">
                        <label for="manche_id" class="form-control-label">Manches</label>
                        <select class="form-control @error('manche_id') is-invalid @enderror" id="manche_id" name="mancheId">
                            <option>Choisissez vos manches</option>
                            @foreach($manchesList as $manche)
                                <option value="{{ $manche->id }}" data-image="{{ $manche->imageUrl() }}">
                                    {{ $manche->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('manche_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jupe -->
                    <div class="form-group">
                        <label for="jupe_id" class="form-control-label">Jupe</label>
                        <select class="form-control @error('jupe_id') is-invalid @enderror" id="jupe_id" name="jupeId">
                            <option>Choisissez votre jupe</option>
                            @foreach($jupesList as $jupe)
                                <option value="{{ $jupe->id }}" data-image="{{ $jupe->imageUrl() }}">
                                    {{ $jupe->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('jupe_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tissu -->
                    <div class="form-group">
                        <label for="tissu_id" class="form-control-label">Tissu</label>
                        <select class="form-control @error('tissu_id') is-invalid @enderror" id="tissu_id" name="tissuId">
                            <option>Choisissez votre tissu</option>
                            @foreach($tissusList as $tissu)
                                <option value="{{ $tissu->id }}" data-image="{{ $tissu->imageUrl() }}">
                                    {{ $tissu->nom }}
                                </option>
                            @endforeach
                        </select>
                        @error('tissu_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Client -->
                    <div class="form-group">
                        <label for="email_client" class="form-control-label">Client email</label>
                        <select class="form-control" name="clientId" id="email_client" required>
                            <option value="">Choisissez l'email du client</option>
                            @foreach($clientsList as $client)
                                <option value="{{$client->id}}">{{$client->email}}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary">Enregistrer la robe</button>
                </form>
            </div>
        </div>
    </div>
    <style>
    #coupe_id,#col_id,#manche_id,#jupe_id,#tissu_id{
        height: 800px;
    }
    </style>
@endsection
