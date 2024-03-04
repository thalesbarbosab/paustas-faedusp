@extends('components.cms.layout')
@section('title','Inserir Usuário')
@section('content_header')
    <h1><i class="fas fa-user-plus"></i> Inserir Usuário</h1>
@stop
@section('content')
<div class="card border">
    <div class="card-body">
        <form action="{{route('cms.user.store')}}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf
            <div class="form-group">
                <label for="">Nome *</label>
                <input type="text" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" name="name" id="descricao" placeholder="Insira o name do usuário" value="{{ old('name') }}">
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{$errors->first('name')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="">E-mail *</label>
                <input type="text" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" name="email" id="email" placeholder="Insira o e-mail do usuário" value="{{ old('email') }}">
                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{$errors->first('email')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Senha *</label>
                <input type="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" name="password" id="password" placeholder="Insira o senha do usuário" >
                @if($errors->has('password'))
                    <div class="invalid-feedback">
                        {{$errors->first('password')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="">Confirmação senha *</label>
                <input type="password" class="form-control {{$errors->has('password_confirmation') ? 'is-invalid' : ''}}" name="password_confirmation" id="password_confirmation" placeholder="Insira o confirmação da senha do usuário">
                @if($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        {{$errors->first('password_confirmation')}}
                    </div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary ">Salvar</button>
            <a type="cancel" href="{{route('cms.user.index')}}" class="btn btn-default">Cancelar</a>
        </form>
    </div>
</div>
@endsection



