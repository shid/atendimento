@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Lista de Solicitação - {{Auth::user()->rule}}</div>

                <div class="card-body" style="height: 557px">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="">
                        <table class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th> priority </th>
                                <th> title </th>
                                <th> status  </th>
                                <th> crested_at </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data->tickets as $ticket)
                                <tr>
                                    <td> {{$ticket->priority}} </td>
                                    <td> <div class="d-inline-block text-truncate" style="max-width: 400px">{{$ticket->title}}</div> </td>
                                    <td> {{$ticket->status}} </td>
                                    <td> {{$ticket->created_at}} </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-center">
                {{$data->links}}
            </div>
        </div>
    </div>
</div>
@endsection
