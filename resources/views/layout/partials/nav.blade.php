<nav class="navbar navbar-expand-lg navbar-dark sb-navbar py-3" style="background-color: var(--color2, #5C1D02)">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ url('storage/images/logo-white.png') }}" style="max-width: 160px;">
            <span class="ml-1 text-hide">Shoorela.com</span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto pt-3 pt-lg-0">
                <li class="nav-item">
                <a class="nav-link" href="{{ route('artist.index') }}">শিল্পী</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('song.index') }}">গান</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('album.index') }}">অ্যালবাম</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('lyricist.index') }}">গীতিকার</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="{{ route('composer.index') }}">সুরকার</a>
                </li>
            </ul>
    
            <ul class="navbar-nav pb-3 pb-lg-0">
                <li class="nav-item d-none d-lg-inline-block">
                    <a href="https://www.facebook.com/সুরেলাকম-Shoorelacom-2312042492361272/" class="nav-link text-facebook">
                        <i class="fab fa-facebook fa-2x"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>