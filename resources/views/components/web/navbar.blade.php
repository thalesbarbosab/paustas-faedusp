<nav id="navbar" class="navbar" data-aos="fade-left" data-aos-delay="1000">
    <ul>
        <li><a href="{{ route('web.index') }}" class="{{ request()->is('/') ? 'active' : null }}">Página inicial</a></li>
        <li><a href="{{ route('web.contact') }}" class="{{ request()->is('contato') ? 'active' : null }}">Contato</a></li>
        <li><a href="{{ route('cms.login') }}">CMS</a></li>

    </ul>
</nav><!-- .navbar -->
