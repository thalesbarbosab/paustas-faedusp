@extends('components.cms.layout')
@section('title', 'Editar Usuário')
@section('content_header')
    <h1><i class="fas fa-user-edit"></i> Editar Usuário</h1>
@stop
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="/storage/default/default-user-profile.png">
                            </div>
                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Ingresso</b> <a
                                        class="float-right">{{ $user->formatedCreatedAt() }}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Atualizacao</b> <a
                                        class="float-right">{{ $user->formatedUpdatedAt() }}</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item"><a class="nav-link active" href="#settings"
                                        data-toggle="tab">Configurações</a></li>
                                <li class="nav-item"><a class="nav-link" href="#password"
                                        data-toggle="tab">Alterar Senha</a></li>
                            </ul>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="settings">
                                    <form class="form-horizontal" action="{{ route('cms.user.update', $user->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" class="form-control" required name="id"
                                            value="{{ $user->id }}">
                                        <div class="form-group row">
                                            <label for="name" class="col-sm-2 col-form-label">Nome</label>
                                            <div class="col-sm-10">
                                                <input type="text" class="form-control" required name="name"
                                                    placeholder="Nome completo" value="{{ $user->name }}">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                                            <div class="col-sm-10">
                                                <input type="email"
                                                    class="form-control  {{ $errors->has('email') ? 'is-invalid' : '' }}"
                                                    required name="email" placeholder="E-mail para autenticação"
                                                    value="{{ $user->email }}">
                                                @if ($errors->has('email'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                <a href="{{ route('cms.user.index') }}" class="btn btn-default">Voltar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="tab-pane" id="password">
                                    <form class="form-horizontal" action="{{ route('cms.user.update.password', $user->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" class="form-control" required name="id"
                                            value="{{ $user->id }}">
                                        <div class="form-group row">
                                            <label for="password" class="col-sm-2 col-form-label">Nova senha</label>
                                            <div class="col-9">
                                                <input type="password"
                                                    class="form-control  {{ $errors->has('password') ? 'is-invalid' : '' }}"
                                                    required name="password" placeholder="Insira uma nova senha" id="input-senha-1">
                                                @if ($errors->has('password'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('password') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                <button type="button" class="btn btn-default btn-lg"><i id="icon-mostrar-senha-1" class="fas fa-eye-slash"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmação nova
                                                senha</label>
                                            <div class="col-9">
                                                <input type="password"
                                                    class="form-control  {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                                                    required name="password_confirmation"
                                                    placeholder="Insira a confirmação da uma nova senha"
                                                    id="input-senha-2">
                                                @if ($errors->has('password_confirmation'))
                                                    <div class="invalid-feedback">
                                                        {{ $errors->first('email') }}
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-1">
                                                <button type="button" class="btn btn-default btn-lg"><i id="icon-mostrar-senha-2" class="fas fa-eye-slash"></i></button>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                                <a href="{{ route('cms.user.index') }}" class="btn btn-default">Voltar</a>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('custom-js')
    <script>
        function mostrarSenha($componente_icone, $componente_input)
        {
        $componente_icone
            .on('mousedown mouseup', function() {
                var inputType = $componente_input.attr('type') == 'password' ? 'text' : 'password';
                $componente_input.attr('type', inputType);
                $componente_icone.removeClass('fas fa-eye-slash').addClass('fas fa-eye');
            })
            .on('mouseout', function() {
                $componente_input.attr('type', 'password');
                $componente_icone.removeClass('fas fa-eye').addClass('fas fa-eye-slash');
            });
        }
        var $icon = $('#icon-mostrar-senha-1');
        var $input = $('#input-senha-1');
        mostrarSenha($icon,$input);

        var $icon_2 = $('#icon-mostrar-senha-2');
        var $input_2 = $('#input-senha-2');
        mostrarSenha($icon_2,$input_2);

    </script>
@endsection

