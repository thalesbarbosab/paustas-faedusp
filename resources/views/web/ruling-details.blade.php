@extends('components.web.layout')
@section('title', 'Notícia | ' . $ruling->title)
@section('main')
    @component('components.web.intern-breadcrumbs', [
        'title' => $ruling->resume,
        'subtitle' => '',
        'breadcrumbs' => ['<a href="' . route('web.index') . '">Página Inicial</a>', 'Detalhes da pauta'],
    ])
    @endcomponent
    <section id="stats-counter" class="stats-counter section-bg">
        <div class="container">
            @if (Session::has('success'))
                <div class="alert alert-success d-flex align-items-center col" role="alert">
                    <div>
                        Sua assinatura foi registrada com sucesso! Obrigado.
                    </div>
                </div>
            @endif
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-pen color-orange flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="{{ ($ruling->ruling_voting_count / 100) * 50 }}"
                                data-purecounter-end="{{ $ruling->ruling_voting_count }}" data-purecounter-duration="4"
                                class="purecounter"></span>
                            <p>Assinaturas totais</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-buildings color-orange flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="300" data-purecounter-end="521" data-purecounter-duration="3"
                                class="purecounter"></span>
                            <p>Assinatura de empresas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-eye color-blue flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="{{ ($ruling->views / 100) * 50 }}"
                                data-purecounter-end="{{ $ruling->views }}" data-purecounter-duration="3"
                                class="purecounter"></span>
                            <p>Visualizações</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row g-5">
                <div class="col-lg-9">
                    <article class="blog-details">
                        <div class="post-img">
                            <div id="carousel-ruling-picture" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    @php
                                        $is_active = true;
                                    @endphp
                                    @foreach ($ruling->pictures as $index => $ruling_picture)
                                        <button type="button" {!! $is_active ? "class='active' aria-current='true'" : null !!}
                                            data-bs-target="#carousel-ruling-picture" data-bs-slide-to="{{ $index }}"
                                            aria-label="Imagem {{ $index + 1 }}"></button>
                                        @php
                                            $is_active = false;
                                        @endphp
                                    @endforeach
                                </div>
                                <div class="carousel-inner">
                                    @php
                                        $is_active = true;
                                    @endphp
                                    @foreach ($ruling->pictures as $index => $ruling_picture)
                                        <div class="carousel-item {{ $is_active ? 'active' : null }}"
                                            data-bs-interval="10000">
                                            <img src="{{ $ruling_picture->formated_path }}" class="d-block w-100"
                                                alt="Imagem {{ $index + 1 }}">
                                        </div>
                                        @php
                                            $is_active = false;
                                        @endphp
                                    @endforeach
                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carousel-ruling-picture" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carousel-ruling-picture" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Próximo</span>
                                </button>
                            </div>
                        </div>
                        <h2 class="title">{{ $ruling->title }}</h2>
                        <div class="meta-top">
                            <ul>
                                @if ($ruling->author)
                                    <li class="d-flex align-items-center">
                                        <i class="bi bi-person"></i>
                                        <a href="#" class="disable-link">{{ $ruling->author }}</a>
                                    </li>
                                @endif
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="#" class="disable-link">Criado em:
                                        {{ $ruling->publishDateFormated() }}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="#" class="disable-link">Expiração em:
                                        {{ $ruling->expirationDateFormated() }}</a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            {!! $ruling->description !!}
                        </div>
                    </article>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar">
                        <div class="sidebar-item recent-posts">
                            <h3 class="sidebar-title">Outras pautas</h3>
                            <div class="mt-3">
                                @if ($ruling_recents->count() == 0)
                                    <span>Não encontrado outras pautas</span>
                                @else
                                    @foreach ($ruling_recents as $post)
                                        <a href="{{ route('web.ruling.detail', $post->slug) }}">
                                            <div class="post-item mt-3">
                                                <img src="{{ $post->cover }}">
                                                <div>
                                                    <h4>{{ Str::limit($post->title, '60', '...') }}</h4>
                                                    <time>{{ $post->publishDateFormated() }}</time>
                                                </div>
                                            </div>
                                        </a>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <button class="float-sign-button animation" data-bs-toggle="modal" data-bs-target="#modal-ruling" id="btn-sign-here">
        <i class="bi bi-pen color-orange flex-shrink-0"></i>
        ASSINE AQUI
    </button>
    <div class="modal fade" id="modal-ruling" data-bs-keyboard="false" tabindex="1" aria-labelledby="modal-group-label"
        aria-hidden="true">
        <div class="modal-xl modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h3>ASSINE AQUI</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('web.ruling.voting.store', ['ruling_id' => $ruling->id]) }}" method="post"
                        id="frm-send">
                        @csrf
                        @method('post')
                        <input type="hidden" name="ruling_id" value="{{ $ruling->id }}">
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="cpf">CPF *</label>
                                    <input type="text" class="cpf form-control @error('cpf') is-invalid @enderror"
                                        value="{{ old('cpf') }}" name="cpf"
                                        placeholder="Insira o seu numero de cpf">
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="form-group">
                                    <label for="name">Nome completo *</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" name="name"
                                        placeholder="Insira o seu nome completo">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-10">
                                <div class="form-group">
                                    <label for="email">E-mail *</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" name="email" placeholder="Insira o seu e-mail">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="form-group">
                                    <label for="city">Cidade *</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror"
                                        value="{{ old('city') }}" name="city"
                                        placeholder="Insira o nome de sua cidade">
                                </div>
                            </div>
                            <div class="col-md-4 col-sm-4">
                                <div class="form-group">
                                    <label for="state">Estado (UF) *</label>
                                    <select name="state" id="state"
                                        class="form-control @error('state') is-invalid @enderror">
                                        <option value="">Selecione seu estado</option>
                                        <option {{ old('state') == 'AC' ? 'selected' : null }} value="AC">Acre
                                        </option>
                                        <option {{ old('state') == 'AL' ? 'selected' : null }} value="AL">Alagoas
                                        </option>
                                        <option {{ old('state') == 'AP' ? 'selected' : null }} value="AP">Amapá
                                        </option>
                                        <option {{ old('state') == 'AM' ? 'selected' : null }} value="AM">Amazonas
                                        </option>
                                        <option {{ old('state') == 'BA' ? 'selected' : null }} value="BA">Bahia
                                        </option>
                                        <option {{ old('state') == 'CE' ? 'selected' : null }} value="CE">Ceará
                                        </option>
                                        <option {{ old('state') == 'DF' ? 'selected' : null }} value="DF">Distrito
                                            Federal</option>
                                        <option {{ old('state') == 'ES' ? 'selected' : null }} value="ES">Espírito
                                            Santo
                                        </option>
                                        <option {{ old('state') == 'GO' ? 'selected' : null }} value="GO">Goiás
                                        </option>
                                        <option {{ old('state') == 'MA' ? 'selected' : null }} value="MA">Maranhão
                                        </option>
                                        <option {{ old('state') == 'MT' ? 'selected' : null }} value="MT">Mato Grosso
                                        </option>
                                        <option {{ old('state') == 'MS' ? 'selected' : null }} value="MS">Mato Grosso
                                            do
                                            Sul</option>
                                        <option {{ old('state') == 'MG' ? 'selected' : null }} value="MG">Minas Gerais
                                        </option>
                                        <option {{ old('state') == 'PA' ? 'selected' : null }} value="PA">Pará
                                        </option>
                                        <option {{ old('state') == 'PB' ? 'selected' : null }} value="PB">Paraíba
                                        </option>
                                        <option {{ old('state') == 'PR' ? 'selected' : null }} value="PR">Paraná
                                        </option>
                                        <option {{ old('state') == 'PE' ? 'selected' : null }} value="PE">Pernambuco
                                        </option>
                                        <option {{ old('state') == 'PI' ? 'selected' : null }} value="PI">Piauí
                                        </option>
                                        <option {{ old('state') == 'RJ' ? 'selected' : null }} value="RJ">Rio de
                                            Janeiro
                                        </option>
                                        <option {{ old('state') == 'RN' ? 'selected' : null }} value="RN">Rio Grande
                                            do
                                            Norte</option>
                                        <option {{ old('state') == 'RS' ? 'selected' : null }} value="RS">Rio Grande
                                            do
                                            Sul</option>
                                        <option {{ old('state') == 'RO' ? 'selected' : null }} value="RO">Rondônia
                                        </option>
                                        <option {{ old('state') == 'RR' ? 'selected' : null }} value="RR">Roraima
                                        </option>
                                        <option {{ old('state') == 'SC' ? 'selected' : null }} value="SC">Santa
                                            Catarina
                                        </option>
                                        <option {{ old('state') == 'SP' ? 'selected' : null }} value="SP">São Paulo
                                        </option>
                                        <option {{ old('state') == 'SE' ? 'selected' : null }} value="SE">Sergipe
                                        </option>
                                        <option {{ old('state') == 'TO' ? 'selected' : null }} value="TO">Tocantins
                                        </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-auto">
                                <strong>Se você estiver assinando por alguma empresa, preencha os dados abaixo</strong>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-6">
                                <div class="form-group">
                                    <label for="cnpj">CNPJ da empresa (opcional)</label>
                                    <input type="text" class="cnpj form-control @error('cnpj') is-invalid @enderror"
                                        value="{{ old('cnpj') }}" name="cnpj"
                                        placeholder="Insira o seu numero de cnpj">
                                </div>
                            </div>
                            <div class="col-md-5 col-sm-12">
                                <div class="form-group">
                                    <label for="company_name">Razão Social da empresa (opcional)</label>
                                    <input type="text" class="form-control @error('company_name') is-invalid @enderror"
                                        value="{{ old('company_name') }}" name="company_name"
                                        placeholder="Insira o seu a razão social da empresa">
                                </div>
                            </div>
                        </div>
                        <div class="g-recaptcha mt-3 @error('g-recaptcha-response') is-invalid @enderror"
                            data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline btn-primary btn-lg mx-auto" type="button" id="btn-send">
                        <i class="fas fa-check"></i> CONFIRMAR ASSINATURA </button>
                    {{-- <button type="button" class="btn btn-outline btn-default btn-lg"
                            data-bs-dismiss="modal">Fechar</button> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        $("#btn-send").click(function(e) {
            e.preventDefault();
            $('#frm-send').submit();
        });
    </script>
    @if ($errors->any())
        <script>
            $(document).ready(function($) {
                $('#btn-sign-here').click();
            });
        </script>
    @endif
    <script>
        $(document).ready(function($) {
            $('.cpf').mask('000.000.000-00', {
                reverse: true,
                clearIfNotMatch: true
            });
            $('.cnpj').mask('00.000.000/0000-00', {
                reverse: true,
                clearIfNotMatch: true
            });
        });
    </script>
@endsection
