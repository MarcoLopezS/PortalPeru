<!-- SIDEBAR -->
<aside class="col-md-3 col-sm-12">

    <!-- COLUMNISTAS -->
    <div class="most-discussed col-md-12 col-sm-6 columnistas">
        <h4>Columnistas</h4>

        @foreach($columnistasDia as $item)
        <article class="small clearfix">
            <img src="/upload/columnista/80x80/{{ $item->foto }}" alt="post">
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
        <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- PP - Responsive - 271x350 -->
        <ins class="adsbygoogle"
             style="display:inline-block;width:271px;height:350px"
             data-ad-client="ca-pub-3674889010429322"
             data-ad-slot="4554110744"></ins>
        <script>
        (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
    <!-- PUBLICIDAD -->

    <div class="hidden-xs hidden-sm hidden-md hidden-lg"></div>

    <!-- GALERIA DE FOTOS -->
    <div class="flickr col-md-12 col-sm-6">
        <h4>Galería de Imágenes</h4>
    </div>
    <!-- FIN GALERIA DE FOTOS -->

    <!-- SUSCRIPCION -->
    <div class="newsletter visible-md visible-lg">
        <h3>Mantente al dia</h3>
        <p>Suscribe y recive por mail lo ultimo en informacion y participa de nuestros sorteos</p>
        <form action="POST">
            <input type="email" class="form-control" placeholder="Enter your email">
            <input type="submit" value="suscribete" class="btn btn-default btn-block">
        </form>
    </div>
    <!-- FIN SUSCRIPCION -->

</aside>
<!-- FIN SIDEBAR -->