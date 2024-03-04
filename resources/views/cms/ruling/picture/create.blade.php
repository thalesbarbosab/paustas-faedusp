@extends('components.cms.layout')
@section('title', 'Personalizar Site - Fotos da pauta')
@section('content_header')

    <div class="row">
        <div class="col-auto"><a href="{{ route('cms.ruling.picture.index', $ruling->id) }}" class="btn btn-info">Voltar</a></div>
        <div class="col-auto">
            <h1> Personalizar Site / Pautas / Fotos / Nova</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary card-outline ">
        <div class="card-header">
            <h3 class="card-title">Inserir uma nova foto da pauta: "{{ $ruling->title }}"</h3>
        </div>
        <form action="{{ route('cms.ruling.picture.store',$ruling->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')
            <input type="hidden" name="ruling_id" value="{{ $ruling->id }}">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="path">Arquivo(s) de imagem *</label>
                            <input type="file" class="form-control @error('path') is-invalid @enderror"
                                name="path[]" multiple>
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
