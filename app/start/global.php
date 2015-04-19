<?php

/*
|--------------------------------------------------------------------------
| Register The Laravel Class Loader
|--------------------------------------------------------------------------
|
| In addition to using Composer, you may use the Laravel class loader to
| load your controllers and models. This is useful for keeping all of
| your classes in the "global" namespace without Composer updating.
|
*/

use PortalPeru\Entities\Configuration;
use PortalPeru\Entities\Post;
use PortalPeru\Entities\Tag;

ClassLoader::addDirectories(array(

	app_path().'/commands',
	app_path().'/controllers',
	app_path().'/models',
	app_path().'/database/seeds',

));

/*
|--------------------------------------------------------------------------
| Application Error Logger
|--------------------------------------------------------------------------
|
| Here we will configure the error logger setup for the application which
| is built on top of the wonderful Monolog library. By default we will
| build a basic log file setup which creates a single file for logs.
|
*/

Log::useFiles(storage_path().'/logs/laravel.log');

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/

App::error(function(Exception $exception, $code)
{
	Log::error($exception);
    //return Response::view('frontend.404');
});

/*
|--------------------------------------------------------------------------
| Maintenance Mode Handler
|--------------------------------------------------------------------------
|
| The "down" Artisan command gives you the ability to put an application
| into maintenance mode. Here, you will define what is displayed back
| to the user if maintenance mode is in effect for the application.
|
*/

App::down(function()
{
	return Response::make("Be right back!", 503);
});

/*
|--------------------------------------------------------------------------
| Require The Filters File
|--------------------------------------------------------------------------
|
| Next we will load the filters file for the application. This gives us
| a nice separate location to store our route and application filter
| definitions instead of putting them all in the main routes file.
|
*/

require app_path().'/filters.php';


/* FUNCIONES PARA VERIFICAR ACCESO DE USUARIO */
function is_admin()
{
    return Auth::check() && Auth::user()->type == 'admin';
}

function is_editor()
{
    return Auth::check() && Auth::user()->type == 'editor';
}

function is_reportero()
{
    return Auth::check() && Auth::user()->type == 'reportero';
}

function configWeb()
{
    $baseUrl = Configuration::find(1);
    return $baseUrl;
}

function reporteroCountNoPuplic()
{
    $count = Post::whereCategoryId(6)->wherePublicar(0)->count();
    return $count;
}

function tagsNoticia($id)
{
    $tags = Tag::find($id);
    return $tags;
}

//COUNTS SOCIAL
function get_tweets($url) {

    $json_string = file_get_contents('http://urls.api.twitter.com/1/urls/count.json?url=' . $url);
    $json = json_decode($json_string, true);

    return intval( $json['count'] );
}

function get_likes($url) {

    $json_string = file_get_contents('http://graph.facebook.com/?ids=' . $url);
    $json = json_decode($json_string, true);

    return intval( $json[$url]['likes'] );
}

function get_plusones($url) {

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "https://clients6.google.com/rpc");
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    $curl_results = curl_exec ($curl);
    curl_close ($curl);

    $json = json_decode($curl_results, true);

    return intval( $json[0]['result']['metadata']['globalCounts']['count'] );
}

//MOVER ARCHIVO
function FileMove($file, $path)
{
    $name = $file->getClientOriginalName();					//NOMBRE Y EXTENSION DE ARCHIVO
    $extension = $file->getClientOriginalExtension();		//EXTENSION DE ARCHIVO
    $archive = basename($name, ".".$extension);			    //NOMBRE DE ARCHIVO
    $pathName = SlugUrl($archive)."-".date('YmdHi');        //CONVERTIR NOMBRE SIN ESPACIOS
    $filename = $pathName.".".$extension;					//NOMBRE Y EXTENSION SIN ESPACIOS
    $file->move($path, $filename);							//MOVER ARCHIVO A NUEVA CARPETA
    return $filename;
}

function SlugUrl($texto){
    return getUrlAmigable(eliminarTextoURL($texto));
}

function fechaActual(){
    $fechaActual = date('Y-m-d H:i:s');
    return $fechaActual;
}

function eliminarTextoURL($str) {
    $search = array('&lt;', '&gt;', '&quot;', '&amp;');
    $str = str_replace($search, '', $str);
    $search = array('&aacute;','&Aacute;','&eacute;','&Eacute;','&iacute;','&Iacute;','&oacute;','&Oacute;','&uacute;','&Uacute;','&ntilde;','&Ntilde;');
    $replace = array('a','a','e','e','i','i','o','o','u','u','n','n');
    $search = array('Á', 'É', 'Í', 'Ó', 'Ú', 'á', 'é', 'í', 'ó', 'ú', 'Ü', 'ü', 'Ñ', 'ñ', '_', '-');
    $replace = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u', 'u', 'u', 'n', 'n', ' ', ' ');
    $str = str_replace($search, $replace, $str);
    $str = preg_replace('/&(?!#[0-9]+;)/s', '', $str);
    $search = array(' a ', ' de ', ' con ', ' por ', ' en ', ' y ', ' e ', ' o ', ' u ', ' la ', ' el ', ' lo ', ' las ', ' los ', ' fue ', ' del ', ' se ', ' su ', ' una ');
    $str = str_replace($search, ' ', strtolower($str));
    $str = str_replace($search, $replace, strtolower(trim($str)));
    $str = preg_replace("/[^a-zA-Z0-9\s]/", '', $str);
    $str = preg_replace('/\s\s+/', ' ', $str);
    $str = str_replace(' ', '-', $str);
    return  $str;
}

function getUrlAmigable($s){
    $s = strtolower($s);
    $s = preg_replace("[áàâãäª@]","a",$s);
    $s = preg_replace("[éèêë]","e",$s);
    $s = preg_replace("[íìîï]","i",$s);
    $s = preg_replace("[óòôõºö]","o",$s);
    $s = preg_replace("[úùûü]","u",$s);
    $s = preg_replace("[ç]","c",$s);
    $s = preg_replace("[ñ]","n",$s);
    $s = preg_replace( "/[^a-zA-Z0-9\-]/", "-", $s );
    $s = preg_replace( array("`[^a-z0-9]`i","`[-]+`") , "-", $s);

    return trim($s, '-');
}

//CARPETA CON NOMBRE DEL MES ACTUAL
function FechaCarpeta()
{
    $meses = array("enero", "febrero", "marzo", "abril", "mayo", "junio", "julio", "agosto", "septiembre", "octubre", "noviembre", "diciembre");
    $mes = date('n')-1; // devuelve el número del mes
    $ano = date('Y'); // devuelve el año
    $fechaCarpeta = $meses[$mes]."".$ano."/";
    return $fechaCarpeta;
}

//CREACION DE CARPETA
function CrearCarpeta(){
    $nombre_carpeta=fechaCarpeta();
    $ruta = $_SERVER['DOCUMENT_ROOT']."upload/".$nombre_carpeta;
    if(!is_dir($ruta)){
        @mkdir($ruta, 0755);
        $carpeta=$ruta;
    }else{
        $carpeta=$ruta;
    }
    return $carpeta;
}

//GENERAR CODIGO ALEATORIO
function CodigoAleatorio($length=10,$uc=TRUE,$n=TRUE,$sc=FALSE)
{
    $source = 'abcdefghijklmnopqrstuvwxyz';
    if($uc==1) $source .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    if($n==1) $source .= '1234567890';
    if($sc==1) $source .= '|@#~$%()=^*+[]{}-_';
    if($length>0){
        $rstr = "";
        $source = str_split($source,1);
        for($i=1; $i<=$length; $i++){
            mt_srand((double)microtime() * 1000000);
            $num = mt_rand(1,count($source));
            $rstr .= $source[$num-1];
        }
    }
    return $rstr;
}

//LISTA DE MENU PARA HOME
function menuHome( $id_padre = 0 ){
    $menu = '';
    $query = Menu::orderBy('orden', 'asc')->where('parent_id', $id_padre)->get();
    $cant = Menu::all()->count();
    if( $cant > 0 ){ $menu .= '<ul class="dd-list">'; }
    foreach ($query as $item){
        $menu .=  '<li>';
        $menu .= '<a class="round_left" href="'.$item->slug_url.'">';
        $menu .= $item->titulo;
        $menu .= '</a>';
        $menu .= menuHome( $item->id ) . '</li>';
    }
    if( $cant > 0 ){ $menu .= '</ul>'; }
    return $menu;
}