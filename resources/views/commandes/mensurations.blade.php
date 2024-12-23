@extends('#layouts.app')

@section('contents')
    <div class="container-fluid py-4">

        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between">
                        <h6>Mensurations</h6>

                    </div>
                    <div class="card-body px-0 pt-0 pb-2">

                        <div class="table-responsive p-0">

                            <table class="table table-bordered text-center mb-0">

                                <tbody>
                                    <tr>
                                        @foreach($keys as $k)
                                        <td>{{$k}}</td>
                                        @endforeach
                                    </tr>
                                    <tr>
                                        @foreach($values as $v)
                                            <td>{{$v}}</td>
                                        @endforeach

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
