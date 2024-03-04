@extends('components.cms.layout')
@section('title', 'Personalizar Site - Pautas')
@section('content_header')

    <div class="row">
        <div class="col-auto"><a href="{{ route('cms.ruling.index') }}" class="btn btn-info">Voltar</a></div>
        <div class="col-auto">
            <h1> Personalizar Site / Pautas / Editar</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Editar pauta</h3>
        </div>
        <form action="{{ route('cms.ruling.update',$ruling->id) }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $ruling->id }}">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="title">Título *</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title',$ruling->title) }}" name="title" placeholder="Insira o título da pauta">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="form-group">
                            <label for="author">Autor <small>(opcional)</small></label>
                            <input type="text" class="form-control @error('author') is-invalid @enderror"
                                value="{{ old('author',$ruling->author) }}" name="author" placeholder="Insira o autor da pauta">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="form-group">
                            <label for="publish_date">Data de publicação *</label>
                            <input type="date" class="form-control @error('publish_date') is-invalid @enderror"
                                value="{{ old('publish_date',$ruling->publish_date) }}" name="publish_date">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <div class="form-group">
                            <label for="expiration_date">Data de expiração *</label>
                            <input type="date" class="form-control @error('expiration_date') is-invalid @enderror"
                                value="{{ old('expiration_date',$ruling->expiration_date) }}" name="expiration_date">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="resume">Resumo <small>(opcional)</small></label>
                            <input type="text" class="form-control @error('resume') is-invalid @enderror"
                                value="{{ old('resume',$ruling->resume) }}" placeholder="Insira o resumo da pauta"
                                name="resume">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Descrição</label>
                            <textarea class="summernote form-control @error('description') is-invalid @enderror"
                                      name="description" id="summernote">{!! old('description',$ruling->description) !!}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
