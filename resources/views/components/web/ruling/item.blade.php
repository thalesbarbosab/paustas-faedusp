<div class="post-item position-relative h-100">
    <div class="post-img position-relative overflow-hidden">
        <img src="{{ $ruling->cover }}" class="img-fluid">
        <span class="post-date"> Criado em: {{ $ruling->publishDateFormated() }}</span>
    </div>
    <div class="post-content d-flex flex-column">
        <h3 class="post-title">{{ Str::limit($ruling->title,'60','...') }}</h3>
        @if ($ruling->author)
            <div class="meta d-flex align-items-center">
                <i class="bi bi-person"></i><span class="ps-2">{{ $ruling->author }}</span>
            </div>
        @endif
        <p>{{ $ruling->resume }}</p>
        @if ($ruling->isExpirated())
            <small style="color: red;"> Expirado em: {{ $ruling->expirationDateFormated() }}</small>
        @endif
        <hr>
        <a href="{{ route('web.ruling.detail',$ruling->slug) }}" class="readmore stretched-link">
            <i class="bi bi-arrow-up-right-square"></i>&nbsp;
            <span>Acessar pauta</span>
        </a>
    </div>
</div>
