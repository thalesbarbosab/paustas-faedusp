@extends('components.cms.layout')
@section('title', 'Personalizar Site - Página inicial')
@section('content_header')
    <h1>Personalizar Site / Imagens de fundo</h1>
@stop
@section('content')
    <div class="card card-primary card-outline ">
        <div class="card-header">
            <h3 class="card-title">Editar imagens de fundo</h3>
        </div>
        <form action="{{ route('cms.content.bg.update') }}" method="POST" enctype="multipart/form-data" id="frm-update-home-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Imagem da logo <small>(alterar imagem)</small> <small>(ideal imagem quadrada)</small></label>
                            <input type="file" class="form-control @error('bg_logo_file') is-invalid @enderror" name="bg_logo_file">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ $content->bg_logo_image_path }}" class="img-thumbnail" style="width: 30%">
                                    </div>
                                </div>
                                @if ($content->bg_logo_image)
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-danger btn-xs" type="button" onclick='document.getElementById("frm-delete-bg-logo-image").submit();'>
                                                <i class="fas fa-trash-alt"></i>
                                            Remover</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Imagem do cabeçalho <small>(alterar imagem)</small> <small>(resolução ideal: 1920px X 1182px)</small></label>
                            <input type="file" class="form-control @error('bg_header_file') is-invalid @enderror" name="bg_header_file">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ $content->bg_header_image_path }}" class="img-thumbnail" style="width: 30%">
                                    </div>
                                </div>
                                @if ($content->bg_header_image)
                                    <div class="row">
                                        <div class="col">
                                            <button class="btn btn-danger btn-xs" type="button" onclick='document.getElementById("frm-delete-bg-header-image").submit();'>
                                                <i class="fas fa-trash-alt"></i>
                                            Remover</button>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="">Imagem do rodapé <small>(alterar imagem)</small> <small>(resolução ideal: 1920px X 1010px)</small></label>
                            <input type="file" class="form-control @error('bg_footer_file') is-invalid @enderror" name="bg_footer_file">
                            <div class="mt-3">
                                <div class="row">
                                    <div class="col">
                                        <img src="{{ $content->bg_footer_image_path }}" class="img-thumbnail" style="width: 30%">
                                    </div>
                                </div>
                                @if ($content->bg_footer_image)
                                <div class="row">
                                    <div class="col">
                                        <button class="btn btn-danger btn-xs" type="button" onclick='document.getElementById("frm-delete-bg-footer-image").submit();'>
                                            <i class="fas fa-trash-alt"></i>
                                            Remover</button>
                                    </div>
                                </div>
                                @endif
                            </div>
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
        @if ($content->bg_header_image)
            <form method="POST" action="{{ route('cms.content.bg.header.image.destroy') }}" id="frm-delete-bg-header-image"
                style="display: inline" onsubmit="return confirm('deseja remover esta imagem e retornar ao padrão?');">
                @csrf
                @method('DELETE')
            </form>
        @endif
        @if ($content->bg_footer_image)
            <form method="POST" action="{{ route('cms.content.bg.footer.image.destroy') }}" id="frm-delete-bg-footer-image"
                style="display: inline" onsubmit="return confirm('deseja remover esta imagem e retornar ao padrão?');">
                @csrf
                @method('DELETE')
            </form>
        @endif
        @if ($content->bg_logo_image)
            <form method="POST" action="{{ route('cms.content.bg.logo.image.destroy') }}" id="frm-delete-bg-logo-image"
                style="display: inline" onsubmit="return confirm('deseja remover esta imagem de logo?');">
                @csrf
                @method('DELETE')
            </form>
        @endif
    </div>
@endsection
