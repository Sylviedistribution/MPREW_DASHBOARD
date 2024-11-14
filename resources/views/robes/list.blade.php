@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">
        <div class="row d-flex align-items-center">
            <form method="GET" action="{{ route('robes.filter') }}" class="form-inline d-flex w-100 flex-wrap">
                @csrf
                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="dateInsertion">Date:</label>
                    <input type="date" class="form-control" id="dateInsertion" name="dateInsertion">
                </div>

                <div class="form-group col-sm-6 col-md-2 me-2">
                    <label style="color: white" for="clientId">Client:</label>
                    <input type="text" class="form-control" id="clientId" name="clientId"
                           value="{{ request()->get('clientId', '') }}">
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
                        <h6>Liste des robes</h6>
                    </div>

                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="text-center table table-bordered align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th class="">Identifiant</th>
                                    <th class="">Date</th>
                                    <th class="">Image</th>
                                    <th class="">Coupe</th>
                                    <th class="">Col</th>
                                    <th class="">Manches</th>
                                    <th class="">Tissu</th>
                                    <th class="">Options</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1234</td>
                                    <td>23/12/2023</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <img src="../assets/img/team-2.jpg" class="avatar avatar-sm"
                                                 alt="user1">
                                        </div>
                                    </td>
                                    <td>Coupe</td>
                                    <td>Col</td>
                                    <td>Manches</td>
                                    <td>Tissu</td>
                                    <td>
                                        <a href="#" class="btn btn-warning btn-sm">
                                            <i class="fas fa-edit"></i> Modifier
                                        </a>
                                        <a href="#" class="btn btn-danger btn-sm"
                                           onclick='return confirm("Êtes-vous sûr de vouloir supprimer cette robe ?")'>
                                            <i class="fas fa-trash-alt"></i> Supprimer
                                        </a>
                                    </td>

                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
