<div class="col-md-4">
    <div class="sidebar-widget-1">

        <div class="widget widget-follow-us gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
            <h5 class="widget-title text-dark">Siguenos</h5>
            <div class="socials">
                <a class="facebook" target="_blank" href="https://www.facebook.com/portalperu.pe"><i class="fa fa-facebook"></i></a>
                <a class="twitter" target="_blank" href="https://twitter.com/portal_peru"><i class="fa fa-twitter"></i></a>
                <a class="google" target="_blank" href="https://plus.google.com/+PortalperuPe1"><i class="fa fa-google-plus"></i></a>
            </div>
        </div><!-- /.widget-follow-us -->

        <div class="widget widget-ads gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
            <style type="text/css">
                .adslot_sidebar { width: 200px; height: 200px; float: left; }
                @media (min-width:500px) { .adslot_sidebar { width: 300px; height: 250px; float: left; } }
                @media (min-width:800px) { .adslot_sidebar { width: 336px; height: 80px; float: left; } }
            </style>
            <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
            <ins class="adsbygoogle adslot_sidebar"
                 style="display:block"
                 data-ad-client="ca-pub-3674889010429322"
                 data-ad-slot="1879845946"
                 data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div><!-- /.widget-ads -->

        <div class="widget widget-recent gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
            <h5 class="widget-title">Columnistas del Día</h5>
            <ul>
            @foreach($columnistasDia as $item)
            {{--*/
            $col_nombre = $item->nombre." ".$item->apellidos;
            $col_url = route('home.columnistas.person', [$item->id, $item->slug_url]);
            $col_imagen = '/upload/columnista/110x70/'.$item->foto;
            /*--}}

                <li>
                    <div class="thumb">
                        <a href=""><img src="{{ $col_imagen }}" alt="img"></a>
                    </div>
                    <div class="content">
                        @foreach($item->columnHome() as $columna)
                        {{--*/
                        $columna_titulo = $columna->titulo;
                        $columna_url = route('home.columnistas.column', [$item->id, $item->slug_url, $columna->id, $columna->slug_url]);
                        /*--}}
                        <h3><a href="{{ $columna_url }}">{{ $columna_titulo }}</a></h3>
                        @endforeach
                        <div class="date"><a href="{{ $col_url }}">{{ $col_nombre }}</a></div>
                    </div>
                </li>

            @endforeach

            </ul>
        </div><!-- /.widget-recent -->

        <div class="widget widget-most-popular gn-animation" data-animation="fadeInUp" data-animation-delay="0" data-animation-offset="75%">
            <h5 class="widget-title">Lo más visto</h5>
            <ul>

                @foreach($masVisto as $item)
                {{--*/
                $visto_num = $item->visitas;
                $visto_titulo = $item->post->titulo;
                $visto_url = route('home.noticia', [$item->post->id, $item->post->slug_url]);
                /*--}}
                <li>
                    <div class="order">{{ $visto_num }}</div>
                    <p><a href="{{ $visto_url }}">{{ $visto_titulo }}</a></p>
                </li>
                @endforeach
            </ul>
        </div><!-- /.widget-popular -->

    </div><!-- /.sidebar -->
</div><!-- /.col-md-4 -->