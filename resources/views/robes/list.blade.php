@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('robes.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateInsertion">Date:</label>
                    <input type="date" class="form-control @error('dateInsertion') is-invalid @enderror" id="dateInsertion" name="dateInsertion" value="{{ request()->get('dateInsertion', '') }}">
                    @error('dateInsertion')
                    <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                    @enderror
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="clientId">Client:</label>
                    <input type="text" class="form-control @error('clientId') is-invalid @enderror" id="clientId" name="clientId" value="{{ request()->get('clientId', '') }}">
                    @error('clientId')
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
                                    <th>Date</th>
                                    <th>Coupe</th>
                                    <th>Col</th>
                                    <th>Manches</th>
                                    <th>Jupes</th>
                                    <th>Tissu</th>
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
                                    <td>{{$robe->coupe->id}}</td>
                                    <td>{{$robe->col->id}}</td>
                                    <td>{{$robe->manche->id}}</td>
                                    <td>{{$robe->jupe->id}}</td>
                                    <td>{{$robe->tissu->id}}</td>
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
