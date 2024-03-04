@extends('components.web.layout')
@section('title','Contato')
@section('main')
    @component('components.web.intern-breadcrumbs',[
        'title' => 'Contato',
        'subtitle' => 'Entre em contato conosco.',
        'breadcrumbs' => ['<a href="/">Página Inicial </a>','Contato']
    ])@endcomponent
    <section id="contact" class="contact">
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="row gy-4">
                <div class="d-flex justify-content-center">
                    @isset($contact_content->contact_adress)
                        <div class="col-sm-7 col-md-4">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-buildings"></i>
                                <h3>Endereço</h3>
                                <p>{{ $contact_content->contact_adress }}</p>
                            </div>
                        </div>
                    @endisset
                    @isset($contact_content->contact_default_email)
                        <div class="col-sm-4 col-md-2">
                            <div class="info-item d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-envelope"></i>
                                <h3>E-mail</h3>
                                <p>{{ $contact_content->contact_default_email }}</p>
                            </div>
                        </div>
                    @endisset
                    @isset($contact_content->contact_phone)
                        <div class="col-sm-4 col-md-2">
                            <div class="info-item  d-flex flex-column justify-content-center align-items-center">
                                <i class="bi bi-telephone"></i>
                                <h3>Telefone</h3>
                                <p>{{ $contact_content->contact_phone }}</p>
                            </div>
                        </div>
                    @endisset
                </div>
            </div>
            <div class="row gy-4 mt-1">
                <div class="d-flex justify-content-center">
                    @if ($contact_content->contact_enable_contact_form)
                        <div class="col-md-6">
                            <form action="{{ route('web.contact.store') }}" method="post" class="php-email-form">
                                @csrf
                                @method('post')
                                <div class="text-center">
                                    <strong>Deixe uma mensagem que em breve entraremos em contato.</strong>
                                </div>
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if (Session::has('success'))
                                    <div class="alert alert-success d-flex align-items-center col" role="alert">
                                        <div>
                                            Sua mensagem foi enviada com sucesso!
                                        </div>
                                    </div>
                                @endif
                                <div class="row">
                                    <div class="col-lg-6 form-group">
                                        <input type="text" name="name"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            placeholder="Seu Nome" value="{{ old('name') }}">
                                    </div>
                                    <div class="col-lg-6 form-group">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            name="email" id="email" placeholder="Seu Email" value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control @error('message') is-invalid @enderror" name="message" minlength="10" rows="5"
                                        placeholder="Digite sua mensagem">{{ old('message') }}</textarea>
                                </div>
                                <div class="text-center justify-content-center">
                                    <div class="g-recaptcha mb-3 @error('g-recaptcha-response') is-invalid @enderror"
                                        data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                                    <button class="btn btn-outline btn-primary" type="submit">Enviar mensagem</button>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
