<header class="header_section">
    <div class="header_top">
        <div class="container-fluid">
            <div class="contact_nav">
                <a href="">
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <span>
                Call : +01 123455678990
              </span>
                </a>
                <a href="">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    <span>
                Email : demo@gmail.com
              </span>
                </a>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.html">
              <span>
                Inance
              </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ">
                        @if (isset($menu))
                            @foreach($menu as $item)
                                @if ($currentPage == $item['text'])
                                    <li class="nav-item active">
                                        <a class="nav-link" href="{{ $item['link'] }}">{{ $item['text'] }}
                                            <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                @elseif ($currentPage != $item)
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ $item['link'] }}">{{ $item['text'] }}
                                            <span class="sr-only">(current)</span>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
