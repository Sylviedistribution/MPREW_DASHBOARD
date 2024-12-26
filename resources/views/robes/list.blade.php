@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('robes.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateInsertion">Date de crétion:</label>
                    <input type="date" class="form-control @error('dateInsertion') is-invalid @enderror"
                           id="dateInsertion" name="dateInsertion" value="{{ request()->get('dateInsertion', '') }}">
                    @error('dateInsertion')
                    <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="client">Client:</label>
                    <select class="form-control @error('client') is-invalid @enderror" id="client" name="client">
                        <option value="">-- Sélectionnez --</option>
                        @foreach($client as $client)
                            <option value="{{ $client->id }}" {{ request()->get('client') == $client->id ? 'selected' : '' }}>{{ $client->username }}</option>
                        @endforeach
                    </select>
                    @error('client')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="coupe">Coupe:</label>
                    <select class="form-control @error('coupe') is-invalid @enderror" id="coupe" name="coupe">
                        <option value="">-- Sélectionnez --</option>
                        @foreach($coupe as $coupe)
                            <option value="{{ $coupe->id }}" {{ request()->get('coupe') == $coupe->id ? 'selected' : '' }}>{{ $coupe->nom }}</option>
                        @endforeach
                    </select>
                    @error('coupe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="col">Col:</label>
                    <select class="form-control @error('col') is-invalid @enderror" id="col" name="col">
                        <option value="">-- Sélectionnez --</option>
                        @foreach($col as $col)
                            <option value="{{ $col->id }}" {{ request()->get('col') == $col->id ? 'selected' : '' }}>{{ $col->nom }}</option>
                        @endforeach
                    </select>
                    @error('col')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="manche">Manches:</label>
                    <select class="form-control @error('manche') is-invalid @enderror" id="manche" name="manche">
                        <option value="">-- Sélectionnez --</option>
                        @foreach($manche as $manche)
                            <option value="{{ $manche->id }}" {{ request()->get('manche') == $manche->id ? 'selected' : '' }}>{{ $manche->nom }}</option>
                        @endforeach
                    </select>
                    @error('manche')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="jupe">Jupe:</label>
                    <select class="form-control @error('jupe') is-invalid @enderror" id="jupe" name="jupe">
                        <option value="">-- Sélectionnez --</option>
                        @foreach($jupe as $jupe)
                            <option value="{{ $jupe->id }}" {{ request()->get('jupe') == $jupe->id ? 'selected' : '' }}>{{ $jupe->nom }}</option>
                        @endforeach
                    </select>
                    @error('jupe')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="tissu">Tissu:</label>
                    <select class="form-control @error('tissu') is-invalid @enderror" id="tissu" name="tissu">
                        <option value="">-- Sélectionnez --</option>
                        @foreach($tissu as $tissu)
                            <option value="{{ $tissu->id }}" {{ request()->get('tissu') == $tissu->id ? 'selected' : '' }}>{{ $tissu->nom }}</option>
                        @endforeach
                    </select>
                    @error('tissu')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
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
                        <h6>Liste des robes</h6>
                        <a href="{{ route('robes.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Créer une robe pour un utilisateur
                        </a>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="text-center table table-bordered align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom</th>
                                    <th>Prix</th>
                                    <th>Date de création</th>
                                    <th>Createur</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($robesList as $robe)
                                    <tr>
                                        <td>{{$robe->id}}</td>
                                        <td>{{$robe->nom}}</td>
                                        <td>{{$robe->prix}}</td>
                                        <td>{{$robe->date}}</td>
                                        <td>{{$robe->client->username}}</td>
                                        <td>
                                            <a href="{{route('robes.edit',$robe)}}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Modifier
                                            </a>
                                            <a href="{{route('robes.delete',$robe)}}" class="btn btn-danger btn-sm"
                                               onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette robe ?")'>
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
