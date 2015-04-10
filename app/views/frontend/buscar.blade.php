@extends('layouts.frontend')

@section('contenido_frontend')
<!--MAIN SECTION-->
<div class="main">
    <div class="row">
        <!--CONTENT-->
        <div class="col-md-9 col-md-12 list-page clearfix">
            <h2>Buscar: {{ $buscar }}</h2>

            <div class="buscador-resultados">
                <script>
                  (function() {
                    var cx = '018282985496243368695:hzzjbqgus9q';
                    var gcse = document.createElement('script');
                    gcse.type = 'text/javascript';
                    gcse.async = true;
                    gcse.src = (document.location.protocol == 'https:' ? 'https:' : 'http:') +
                        '//www.google.com/cse/cse.js?cx=' + cx;
                    var s = document.getElementsByTagName('script')[0];
                    s.parentNode.insertBefore(gcse, s);
                  })();
                </script>
                <gcse:searchresults-only></gcse:searchresults-only>
            </div>

        </div>
        <!--END CONTENT-->

        @include('frontend.sidebar')

    </div>

</div>
<!--END MAIN SECTION-->

@stop