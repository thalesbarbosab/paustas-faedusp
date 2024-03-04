@php
    $social_medias_animation_dalay = 1000;
@endphp
<div class="float-banner" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
    @isset($social_media_content->site)
        <a href="{{ $social_media_content->site }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/site.png">
        </a>
        @php
            $social_medias_animation_dalay += 150;
        @endphp
    @endisset
    @isset($social_media_content->instagram)
        <a href="{{ $social_media_content->instagram }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/instagram.png">
        </a>
        @php
            $social_medias_animation_dalay += 150;
        @endphp
    @endisset
    @isset($social_media_content->youtube)
        <a href="{{ $social_media_content->youtube }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/youtube.png">
        </a>
        @php
            $social_medias_animation_dalay += 150;
        @endphp
    @endisset
    @isset($social_media_content->spotify)
        <a href="{{ $social_media_content->spotify }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/spotify.png">
        </a>
        @php
            $social_medias_animation_dalay += 150;
        @endphp
    @endisset
    @isset($social_media_content->facebook)
        <a href="{{ $social_media_content->facebook }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/facebook.png">
        </a>
        @php
             $social_medias_animation_dalay += 150;
        @endphp
    @endisset
    @isset($social_media_content->medium)
        <a href="{{ $social_media_content->medium }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/medium.png">
        </a>
        @php
            $social_medias_animation_dalay += 150;
        @endphp
    @endisset
    @isset($social_media_content->tweeter)
        <a href="{{ $social_media_content->tweeter }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/tweeter.png">
        </a>
    @endisset
    @isset($social_media_content->whatsapp_url)
        <a href="{{ $social_media_content->whatsapp_url }}" target="_BLANK" data-aos="zoom-in" data-aos-delay="{{ $social_medias_animation_dalay }}">
            <img src="/assets/img/social-media/whatsapp.png">
        </a>
        @php
            $social_medias_animation_dalay += 150;
        @endphp
    @endisset
</div>
