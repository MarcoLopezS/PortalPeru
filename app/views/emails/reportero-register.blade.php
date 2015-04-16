<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
{{--*/
$UrlImagen = configWeb()->dominio."/imagenes/lgoo.png";
$UrlActivar = configWeb()->dominio."/reportero-ciudadano/verify/".$codigo;
/*--}}

    <img src="{{ $UrlImagen }}" alt=""/>

    <p>Hola <strong>{{ $nombre." ".$apellidos }}</strong>,</p>
    <p>Te has registrado en Portal Perú</p>
    <a href="{{ $UrlActivar }}">Activar cuenta</a>

</body>
</html>