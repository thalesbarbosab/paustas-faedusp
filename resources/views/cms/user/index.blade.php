@extends('components.cms.layout')
@section('title','Usuários')
@section('content_header')
    <h1><i class="fas fa-user-friends"></i> Usuários</h1>
@stop
@section('content')
    <a class="btn btn-default" href="{{route('cms.user.create')}}">inserir usuário</a>
    <br><br>
    <section class="content">
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row d-flex align-items-stretch">
                    @foreach ($users as $user)
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                            <div class="card bg-light">
                                <div class="card-header text-muted border-bottom-0">
                                    #{{$user->id}}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-9">
                                            <h2 class="lead"><b>{{$user->name}}</b></h2>
                                            <p class="text-muted text-sm"><b>Ingresso: </b>{{ $user->formatedCreatedAt() }}</p>
                                            <p class="text-muted text-sm"><b>Ultima Atualização: </b>{{ $user->formatedUpdatedAt() }}</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i class="far fa-user"></i></span>Login: {{$user->email}}</li>
                                            </ul>
                                        </div>
                                        <div class="col-3 text-center">
                                            <img src="/storage/default/default-user-profile.png" alt="" class="img-circle img-fluid">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row justify-content-end">
                                        <div class="col-3">
                                            <a href="{{route('cms.user.edit', $user->id )}}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-user-edit"></i> Editar
                                            </a>
                                        </div>
                                        <div class="col-3">
                                            @component('components.cms.delete-button',[
                                                'route'=>route('cms.user.destroy', $user->id),
                                                'button_name'=>'Remover',
                                                'button_class'=>'btn btn-sm btn-danger'
                                            ])@endcomponent
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection


