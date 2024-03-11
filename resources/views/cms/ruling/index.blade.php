@extends('components.cms.layout')
@section('title', 'Personalizar Site - Pautas')
@section('content_header')
    <h1> Personalizar Site / Pautas</h1>
@stop
@section('content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Gerenciar conteúdo de pautas</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <a class="btn btn-app bg-primary" href="{{ route('cms.ruling.create') }}">
                    <i class="fas fa-plus"></i> Nova pauta
                </a>
            </div>
            <div class="row">
                @if (isset($ruling) && count($ruling) > 0)
                    <div class="col-12 offset-0 table-responsive">
                        <table class="table table-bordered table-hover"
                               style="margin-top:10px; white-space:nowrap;">
                            <thead class="bg-primary">
                                <tr>
                                    <th>Opções</th>
                                    <th>Título</th>
                                    <th>Data de publicação</th>
                                    <th>Data de expiração</th>
                                    <th>Qtd de assinaturas</th>
                                    <th>Qtd de visualizações</th>
                                    <th>Qtd de Fotos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ruling as $item)
                                    <tr>
                                        <td style="width: 15%">
                                            <div class="dropdown show">
                                                <a class="btn btn-default dropdown-toggle btn-sm" href="#" role="button"
                                                id="dropdow-menu-link-{{ $item->id }}" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">Selecione
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdow-menu-link-{{ $item->id }}">
                                                    <a class="dropdown-item" href="{{ route('cms.ruling.edit', $item->id)}}">
                                                        <i class="far fa-edit"></i> Editar dados
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('cms.ruling.picture.index', $item->id)}}">
                                                        <i class="far fa-images"></i> Editar fotos
                                                    </a>
                                                    <form method="POST" action="{{ route('cms.ruling.destroy', $item->id) }}" style="display: inline" onsubmit="return confirm('deseja remover esta pauta ?');" >
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="dropdown-item"><i class="fas fa-trash-alt"></i> Remover</button>
                                                    </form>
                                                    <a class="dropdown-item" href="{{ route('cms.ruling.report_by_ruling', $item->id)}}">
                                                        <i class="far fa-file-excel"></i> Relatório das assinaturas
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ Str::limit($item->title ,50, '...') }}</td>
                                        <td>{{ $item->publishDateFormated() }}</td>
                                        <td>{{ $item->expirationDateFormated() }}</td>
                                        <td>{{ $item->ruling_voting_count }}</td>
                                        <td>{{ $item->views }}</td>
                                        <td>{{ $item->pictures_count }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $ruling->links() }}
                        </div>
                        <div class="d-flex justify-content-center">
                             Total de {{ $ruling->total() }} registros
                        </div>
                    </div>
                @else
                    <div class="col-auto offset-0">
                        <div class="callout callout-info">
                            <h5>não há registros de pautas.</h5><p>insira um novo registro para que seja exibido aqui.</p>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @component('components.cms.report')@endcomponent
@endsection
