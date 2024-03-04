@extends('components.cms.layout')
@section('title', 'Personalizar Site - Redes sociais')
@section('content_header')
    <h1>Personalizar Site / Redes sociais</h1>
@stop
@section('content')
    <div class="card card-primary card-outline ">
        <div class="card-body">
            <form action="{{ route('cms.content.social-medias.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-12 col-sm-12">
                        <div class="form-group">
                            <label for="site">Site</label>
                            <input placeholder="Insira o link do site" class="form-control @error('site') is-invalid @enderror" name="site" value="{{ old('site',$socialMedias->site) }}">
                        </div>
                        <div class="form-group">
                            <label for="instagram">Instagram</label>
                            <input placeholder="Insira o link do instagram" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram',$socialMedias->instagram) }}">
                        </div>
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input placeholder="Insira o link do facebook" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook', $socialMedias->facebook) }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Youtube</label>
                            <input placeholder="Insira o link do canal no youtube" class="form-control @error('youtube') is-invalid @enderror" name="youtube" value="{{ old('youtube',$socialMedias->youtube) }}">
                        </div>
                        <div class="form-group">
                            <label for="whatsApp">WhatsApp</label>
                            <input placeholder="Insira o número do WhatsApp" class="form-control @error('whatsApp') is-invalid @enderror celphone_with_ddd" name="whatsApp" value="{{ old('whatsApp',$socialMedias->whatsApp) }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Spotify</label>
                            <input placeholder="Insira o link do canal no spotify" class="form-control @error('spotify') is-invalid @enderror" name="spotify" value="{{ old('spotify',$socialMedias->spotify) }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Tweeter</label>
                            <input placeholder="Insira o link do perfil no tweeter" class="form-control @error('tweeter') is-invalid @enderror" name="tweeter" value="{{ old('tweeter',$socialMedias->tweeter) }}">
                        </div>
                        <div class="form-group">
                            <label for="youtube">Medium</label>
                            <input placeholder="Insira o link do perfil no medium" class="form-control @error('medium') is-invalid @enderror" name="medium" value="{{ old('medium',$socialMedias->medium) }}">
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
