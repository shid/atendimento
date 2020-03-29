@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-auto">Lista de Solicitação - {{Auth::user()->rule}}</div>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('ticket/new') }}" class="btn btn-sm btn-primary">Novo Chamado</a>
                        </div>
                    </div>
                </div>

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
                                <th> category </th>
                                <th> title </th>
                                <th> status  </th>
                                <th> updated_at </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($data->tickets as $ticket)
                                <tr onclick="window.location='{{ url("ticket/$ticket->id/edit") }}'" style="cursor: pointer;">
                                    <td> {{$ticket->priority}} </td>
                                    <td> {{$ticket->category}} </td>
                                    <td> <div class="d-inline-block text-truncate" style="max-width: 375px">{{$ticket->title}}</div> </td>
                                    <td> {{$ticket->status}} </td>
                                    <td> {{$ticket->updated_at}} </td>
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
