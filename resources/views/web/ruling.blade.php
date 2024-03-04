@extends('components.web.layout')
@section('title', 'Página Inicial')
@section('main')
    @component('components.web.intern-breadcrumbs', [
        'title' => $home_content->home_welcome_title,
        'subtitle' => $home_content->home_welcome_subtitle,
        'breadcrumbs' => [],
    ])
    @endcomponent
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4 posts-list">
                @if ($rulings->count() == 0)
                    <div class="d-flex justify-content-center">
                        <h2>No momento não há pautas para participação.</h2>
                    </div>
                @else
                    @php
                        $ruling_animation_delay = 150;
                    @endphp
                    @foreach ($rulings as $ruling)
                        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $ruling_animation_delay }}">
                            @component('components.web.ruling.item',['ruling'=>$ruling])@endcomponent
                        </div>
                        @php
                            $ruling_animation_delay += 50;
                        @endphp
                    @endforeach
                @endif
            </div>
            <div class="row">
                <div class="d-flex justify-content-center">
                    {{ $rulings->links() }}
                </div>
            </div>
        </div>
    </section>
@endsection
