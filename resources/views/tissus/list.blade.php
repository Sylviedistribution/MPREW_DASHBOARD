@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('tissus.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="nom">Nom:</label>
                    <input type="text" class="form-control @e" id="nom" name="nom" placeholder="Nom"
                           value="{{ request()->get('nom', '') }}">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateInsertion">Date:</label>
                    <input type="date" class="form-control" id="dateInsertion" name="dateInsertion"
                           value="{{ request()->get('dateInsertion', '') }}">
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
                        <h6>Liste des tissus</h6>
                        <a href="{{ route('tissus.create') }}" class="btn btn-success">
                            <i class="fas fa-plus"></i> Ajouter un tissu
                        </a>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table table-bordered table-hover text-center mb-0">
                                <thead>
                                <tr>
                                    <th>Identifiant</th>
                                    <th>Nom</th>
                                    <th>Image</th>
                                    <th>Description</th>
                                    <th>Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tissusList as $tissu)
                                    <tr>
                                        <td>{{$tissu->id}}</td>
                                        <td>{{$tissu->nom}}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <img src="{{$tissu->imageUrl()}}" class="avatar avatar-gl" alt="tissu image">
                                            </div>
                                        </td>
                                        <td>{{$tissu->description}}</td>
                                        <td>
                                            <a href="{{route('tissus.edit',$tissu)}}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Modifier
                                            </a>
                                            <a href="{{route('tissus.delete',$tissu)}}" class="btn btn-danger btn-sm" onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette coupe ?")'>
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
