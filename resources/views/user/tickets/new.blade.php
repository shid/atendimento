@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex">
                        <div class="d-flex align-items-center mr-auto">Nova solicitação</div>
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
                        <form method="POST" action="{{ route('ticket-store') }}">

                            @csrf

                            <div class="form-group row">
                                <label for="categories" class="col-md-4 col-form-label text-md-right">{{ __('Categories') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="category_id" required>
                                        <option></option>
                                        @foreach($data->categories as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priority" class="col-md-4 col-form-label text-md-right">{{ __('Priority') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="priority" required>
                                        <option></option>
                                        @foreach($data->priority as $priority)
                                            <option value="{{$priority['id']}}">{{$priority['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autocomplete="title">

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description" rows="5" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description"></textarea>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-sm btn-primary">
                                        {{ __('Save') }}
                                    </button>

                                    <a href="{{ url('home') }}" class="btn btn-sm btn-primary">Cancelar</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
