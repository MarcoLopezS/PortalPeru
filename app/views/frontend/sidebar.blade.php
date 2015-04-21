<!-- SIDEBAR -->
<aside class="col-md-3 col-sm-12">

    <ul class="aside-social list-inline visible-md visible-lg">
        <li class="social-fb">
            <a target="_blank" href="https://www.facebook.com/portalperu.pe"><i class="fa fa-facebook"></i></a>
        </li>
        <li class="social-tw">
            <a target="_blank" href="https://twitter.com/portal_peru"><i class="fa fa-twitter"></i></a>
        </li>
        <li class="social-gp">
            <a target="_blank" href="https://plus.google.com/+PortalperuPe1"><i class="fa fa-google-plus"></i></a>
        </li>
    </ul>

    <!-- COLUMNISTAS -->
    <div class="most-discussed col-md-12 col-sm-6 columnistas">
        <h4><a href="/columnistas">Columnistas</a></h4>

        @foreach($columnistasDia as $item)
        <article class="small clearfix">
            <img src="/upload/columnista/80x80/{{ $item->foto }}" alt="{{ $item->nombre." ".$item->apellidos }}">
            <div class="info">
                <h1><a href="/columnistas/{{ $item->id."-".$item->slug_url }}">{{ $item->nombre." ".$item->apellidos }}</a></h1>
                @foreach($item->columnHome() as $columna)
                <p class="details">
                    <a href="/columnistas/{{ $item->id."-".$item->slug_url."/".$columna->id."-".$columna->slug_url }}">{{ $columna->titulo }}</a>
                </p>
                @endforeach
            </div>
        </article>
        @endforeach

        <a href="/columnistas" class="btn btn-default">Ver todos</a>
    </div>
    <!-- FIN COLUMNISTAS -->

    <!-- PUBLICIDAD -->
    <div class="banner visible-xs visible-md visible-lg">
        <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <style type="text/css">
            .adslot_sidebar { width: 320px; height: 300px; }
            @media (min-width:500px) { .adslot_sidebar { width: 468px; height: 300px; } }
            @media (min-width:800px) { .adslot_sidebar { width: 255px; height: 255px; } }
        </style>
        <ins class="adsbygoogle adslot_sidebar"
             style="display:block"
             data-ad-client="ca-pub-8629542769595128"
             data-ad-slot="1421908493"
             data-ad-format="auto"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <!-- PUBLICIDAD -->

    <!-- GALERIA DE FOTOS -->
    <div class="flickr col-md-12 col-sm-6 hidden-sm hidden-xs">
        <h4>Galería de Imágenes</h4>
    </div>
    <!-- FIN GALERIA DE FOTOS -->

    <!-- SUSCRIPCION -->
    {{--
    <div class="newsletter visible-md visible-lg">
        <h3>Mantente al dia</h3>
        <p>Suscribe y recive por mail lo ultimo en informacion y participa de nuestros sorteos</p>
        <form action="POST">
            <input type="email" class="form-control" placeholder="Enter your email">
            <input type="submit" value="suscribete" class="btn btn-default btn-block">
        </form>
    </div>
    --}}
    <!-- FIN SUSCRIPCION -->

</aside>
<!-- FIN SIDEBAR -->