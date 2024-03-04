@extends('components.cms.layout')
@section('title', 'Personalizar Site - Contatos')
@section('content_header')
    <h1>Personalizar Site / Contatos</h1>
@stop
@section('content')
    <div class="card card-primary card-outline ">
        <div class="card-body">
            <form action="{{ route('cms.content.contact.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="">E-mail</label>
                            <input placeholder="Insira um e-mail válido. Exemplo: ana@gmail.com" class="form-control @error('contact_default_email') is-invalid @enderror" name="contact_default_email" value="{{ old('contact_default_email',$content->contact_default_email) }}">
                        </div>
                        <div class="form-group">
                            <label for="">Endereço</label>
                            <input placeholder="Insira o endereço da igreja" class="form-control @error('contact_adress') is-invalid @enderror" name="contact_adress" value="{{ old('contact_adress',$content->contact_adress) }}">
                        </div>
                        <div class="form-group">
                            <label for="contact_phone">Telefone/Celular</label>
                            <input placeholder="Insira um telefone" class="form-control @error('contact_phone') is-invalid @enderror celphone_with_ddd" name="contact_phone" value="{{ old('contact_phone',$content->contact_phone) }}">
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                                <input type="checkbox" class="custom-control-input" name="contact_enable_contact_form" id="contact_enable_contact_form" {{ old('contact_enable_contact_form', $content->contact_enable_contact_form) ? 'checked' : null }}>
                                <label class="custom-control-label" for="contact_enable_contact_form">Ativar ou desativar formulário contato</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary btn-block">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
