{{--*/
$UrlImagen = configWeb()->dominio."/imagenes/logo.png";
$UrlActivar = configWeb()->dominio."/reportero-ciudadano/verify/".$codigo;
/*--}}
<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <title>PortalPerú.pe</title>
</head>
<body>
	<table style="font-family:Arial;background:#222222;width:100%;padding: 0;margin: 0;font-size: 14px;">
		<tr>
			<td>
				<div class="container" style="width: 85%;background: #ffffff;padding: 10px 0 0 0;margin: 0 auto;">
				    <div style="display: block;">
				        <div class="imagen" style="text-align: center;padding: 10px 15px;">
				            <img src="{{ $UrlImagen }}" alt="PortalPerú.pe" style="vertical-align: middle;max-width: 100%;height: auto;border: 0;" />
				        </div>
				        <div class="separador" style="background-image: url('http://portalperu.pe/imagenes/header-barra.png');background-position:center;height: 35px;width: 100%;"></div>
				    </div>
				    <div class="contenido" style="display: block;padding: 10px 20px;">
				        <p>Hola <strong>{{ $nombre." ".$apellidos }}</strong></p>
				        <p>Confirma tu cuenta para que tengas acceso completo  a PortalPerú.pe y puedas tu mismo subir noticias a nuestra web.</p>
				        <div class="enlace" style="display: block;text-align: center;padding: 10px 0;">
				            <a href="{{ $UrlActivar }}" style="text-decoration: none;word-wrap: break-word;color: blue;font-weight: 700;background-color: #be1622;color: #ffffff;padding: 10px;">Confirma tu cuenta ahora</a>
				        </div>
				        <p>Si haces clic en el boton y parece que no funciona, cópialo y pégalo en una nueva ventana de tu navegador el siguiente enlace:</p>
				        <a href="{{ $UrlActivar }}" style="text-decoration: none;word-wrap: break-word;">{{ $UrlActivar }}</a>
				    </div>
				    <div style="display: block;padding: 10px 20px;text-align: center;background-color: #E0E0E0;font-size: 12px;">
				        <p>¿Has olvidado tu contraseña de PortalPerú.pe? <a href="" style="text-decoration: none;word-wrap: break-word;">Recibe instrucciones sobre cómo restablecerla.</a></p>
				        <p>Tu privacidad es importante para nosotros. <a href="" style="text-decoration: none;word-wrap: break-word;">Lee nuestros Términos y condiciones de uso.</a></p>
				    </div>
				</div>
			</td>
		</tr>
	</table>	
</body>
</html>