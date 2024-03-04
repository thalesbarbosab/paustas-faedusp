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
            <div class="row gy-4">
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-pen color-orange flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="0"
                                class="purecounter">521</span>
                            <p>Assinaturas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-people-fill color-orange flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="0"
                                class="purecounter">200</span>
                            <p>Assinatura de pessoas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-buildings color-orange flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="0"
                                class="purecounter">321</span>
                            <p>Assinatura de empresas</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="stats-item d-flex align-items-center w-100 h-100">
                        <i class="bi bi-eye color-blue flex-shrink-0"></i>
                        <div>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="0"
                                class="purecounter">200</span>
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
                                    <a href="#" class="disable-link">Criado em: {{ $ruling->publishDateFormated() }}</a>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bi bi-clock"></i>
                                    <a href="#" class="disable-link">Expiração em: {{ $ruling->expirationDateFormated() }}</a>
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


    <a href="#" class="float-sign-button animation">
        <i class="bi bi-pen color-orange flex-shrink-0"></i>
        Assine agora esta pauta
    </a>
@endsection
