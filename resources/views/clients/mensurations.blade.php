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
                                @foreach($keys as $index => $key)
                                    <tr>
                                        <td>{{ $key }}</td>
                                        <td>{{ $values[$index] }}</td>
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
