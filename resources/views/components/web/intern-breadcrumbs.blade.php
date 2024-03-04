<div class="breadcrumbs d-flex align-items-center" style='background-image: url("{{ $content->bg_header_image_path }}");'>
    <div class="container position-relative d-flex flex-column align-items-center" data-aos="zoom-in">
        <h2>{{ $title }}</h2>
        <h3>{{ $subtitle }}</h3>
        <ol class="mt-4">
            @if(isset($breadcrumbs) && is_array($breadcrumbs))
                @foreach ($breadcrumbs as $breadcrumb)
                    <li>{!! $breadcrumb !!}</li>
                @endforeach
            @endisset
        </ol>
    </div>
</div>
