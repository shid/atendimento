@extends('layouts.app')

@section('custom-style')
<style>

</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-auto">Solicitação</div>
                        <div class="d-flex align-items-center">
                            <a href="{{ url('home') }}" class="btn btn-sm btn-primary">Voltar</a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="">
                        <div class="form-group row">
                            <label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>
                            <div class="col-md-6">
                                @foreach($data->categories as $category)
                                    @if($category['id'] == $data->ticket->category_id)
                                        <div class="form-control">
                                            {{$category['name']}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>
                            <div class="col-md-6">
                                @foreach($data->priority as $priority)
                                    @if($priority['id'] == $data->ticket->priority)
                                        <div class="form-control">
                                            {{$priority['name']}}
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <div class="form-control">
                                    {{$data->ticket->title}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea rows="5" class="form-control" name="description" disabled>{{ $data->ticket->description }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-4">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-auto">Comentários</div>
                        <div class="d-flex align-items-center"></div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="">
{{--                        <form method="POST" action="{{ route('comment-store', ['ticket' => $data->ticket->id]) }}">--}}
{{--                            @csrf--}}




                            <chat-component user_id="{{auth()->user()->id}}" reply_to="0" ticket_id="{{$data->ticket->id}}"></chat-component>




{{--                        </form>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('custom-javascript')
    <script>

    </script>
@endsection
