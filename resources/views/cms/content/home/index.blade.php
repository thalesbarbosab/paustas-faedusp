@extends('components.cms.layout')
@section('title', 'Personalizar Site - Página inicial')
@section('content_header')
    <h1>Personalizar Site / Página inicial</h1>
@stop
@section('content')
    <div class="card card-primary card-outline ">
        <div class="card-header">
            <h3 class="card-title">Editar conteúdo da página inicial</h3>
        </div>
        <form action="{{ route('cms.content.home.update') }}" method="POST" enctype="multipart/form-data" id="frm-update-home-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-6 col-sm-6">
                        <div class="form-group">
                            <label for="">Título do website</label>
                            <input type="text" placeholder="Digite um título para o website" class="form-control @error('home_website_title') is-invalid @enderror" name="home_website_title" value="{{ old('home_website_title',$content->home_website_title) }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Título de boas vindas</label>
                            <textarea class="form-control @error('home_welcome_title') is-invalid @enderror" name="home_welcome_title">{{ old('home_welcome_title',$content->home_welcome_title) }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Subtítulo de boas vindas</label>
                            <textarea class="form-control @error('home_welcome_subtitle') is-invalid @enderror" name="home_welcome_subtitle">{{ old('home_welcome_subtitle',$content->home_welcome_subtitle) }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <button type="botton" onclick='document.getElementById("frm-update-home-data").submit();' class="btn btn-primary btn-block">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
