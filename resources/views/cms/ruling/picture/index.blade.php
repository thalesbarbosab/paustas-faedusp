@extends('components.cms.layout')
@section('title', 'Personalizar Site - Fotos da pauta')
@section('content_header')

    <div class="row">
        <div class="col-auto"><a href="{{ route('cms.ruling.index') }}" class="btn btn-info">Voltar</a></div>
        <div class="col-auto">
            <h1> Personalizar Site / Pautas / Fotos</h1>
        </div>
    </div>
@stop
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Editar fotos da pauta: "{{ $ruling->title }}"</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <a class="btn btn-app bg-primary" href="{{ route('cms.ruling.picture.create', $ruling->id) }}">
                    <i class="fas fa-plus"></i> Nova foto
                </a>
            </div>
            @if (isset($ruling_pictures) && count($ruling_pictures) > 0)
                    <div class="d-flex justify-content-center">
                        {{ $ruling_pictures->links() }}
                    </div>
                    <div class="d-flex justify-content-center">
                        Total de {{ $ruling_pictures->total() }} registros
                    </div>
                <div class="row">
                    @foreach ($ruling_pictures as $item)
                        <div class="col-2">
                            <div class="form-group">
                                <img src="{{ $item->formated_path }}"
                                    class="img-fluid img-thumbnail mx-auto d-block">
                                @if ($item->is_default)
                                    <p>Imagem principal</p>
                                    <br>
                                @else
                                    <form method="POST" action="{{ route('cms.ruling.picture.set_as_default',['ruling_id'=>$item->ruling_id,'ruling_picture_id'=>$item->id]) }}"
                                        style="display: inline" onsubmit="return confirm('deseja definir esta foto como principal ?');">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-primary btn-block btn-xs"><i class="fas fa-arrow-alt-circle-down"></i>
                                            Definir como principal</button>
                                    </form>
                                    <br>
                                @endif
                                <form method="POST" action="{{ route('cms.ruling.picture.destroy', $item->id) }}"
                                    style="display: inline" onsubmit="return confirm('deseja remover esta foto?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-block btn-xs"><i class="fas fa-trash-alt"></i>
                                        Remover</button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row">
                    <div class="col-auto offset-0">
                        <div class="callout callout-info">
                            <h5>não há registros de fotos para esta pauta.</h5>
                            <p>insira um novo registro para que seja exibido aqui.</p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
