<?php

use PortalPeru\Entities\Category;
use PortalPeru\Entities\Column;
use PortalPeru\Entities\Columnist;
use PortalPeru\Entities\Configuration;
use PortalPeru\Entities\Gallery;
use PortalPeru\Entities\Post;
use PortalPeru\Entities\PostPhoto;
use PortalPeru\Entities\PostView;
use PortalPeru\Entities\Tag;
use Carbon\Carbon;

use PortalPeru\Repositories\PostRepo;

class FrontendController extends BaseController{

    protected $postRepo;

    public function __construct(PostRepo $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function construccion()
    {
        return View::make('construccion');
    }

    public function home()
    {
        //BICENTENARIO
        $bicentenarioSup = $this->postRepo->showPostCatPag(7, 2);
        $bicentenarioInf = $this->postRepo->showPostCatPagID(7, 3, $bicentenarioSup);

        //HECHOS
        $hechos = $this->postRepo->showPostCatPag(1, 6);

        //TECNOLOGIA
        $tecnologia = $this->postRepo->showPostCatPag(8, 3);

        //ENTREVISTA
        $entrevista = $this->postRepo->showPostCatPag(3, 6);

        //GALERIA DE FOTOS
        $galeria = Gallery::where('publicar', 1)->orderBy('published_at','desc')->paginate(4);

        return View::make('frontend.index', compact('bicentenarioSup','hechos','bicentenarioInf','tecnologia','entrevista','galeria'));
    }

    public function nosotros()
    {
        return View::make('frontend.nosotros');
    }

    public function contacto()
    {
        return View::make('frontend.contacto');
    }

    public function publicidad()
    {
        return View::make('frontend.publicidad');
    }

    public function noticia($id)
    {
        $noticia = Post::findOrFail($id);
        $noticiaFotos = PostPhoto::where('post_id', $id)->orderBy('orden', 'asc')->get();
        if($noticia->tags <> "-0,0,0-"){
            $noticiaTags = explode("-0,", $noticia->tags);
            $noticiaTags = explode(",0-", $noticiaTags[1]);
            $noticiaTags = explode(",", $noticiaTags[0]);
        }elseif($noticia->tags == "-0,0,0-" OR $noticia->tags == ""){
            $noticiaTags = "";
        }

        //GUARDAR VISITA
        $view = new PostView();
        $view->post_id = $id;
        $view->save();

        //NOTICIAS RELACIONADAS
        $notRel = Post::where('id', '<>', $noticia->id)->where(function($query) use ($noticiaTags){
                        foreach ($noticiaTags as $key) {
                            $query->orWhere('tags', 'LIKE', '%,'.$key.',%');
                        };
                    })->where('category_id', $noticia->category_id)->where('publicar', 1)->orderBy('published_at', 'desc')->paginate(4);

        return View::make('frontend.noticia', compact('noticia', 'noticiaFotos', 'noticiaTags', 'notRel'));
    }

    public function noticiaPreview($id)
    {
        $noticia = Post::findOrFail($id);
        $noticiaFotos = PostPhoto::where('post_id', $id)->orderBy('orden', 'asc')->get();
        if($noticia->tags <> "0,0,0"){
            $noticiaTags = explode("0,", $noticia->tags);
            $noticiaTags = explode(",0", $noticiaTags[1]);
            $noticiaTags = explode(",", $noticiaTags[0]);
        }elseif($noticia->tags == "0,0,0" OR $noticia->tags == ""){
            $noticiaTags = "";
        }

        return View::make('frontend.noticia-preview', compact('noticia', 'noticiaFotos', 'noticiaTags'));
    }

    public function noticiaCategoria($url)
    {
        $categoria = Category::whereSlugUrl($url)->first();
        $noticias = Post::where('category_id', $categoria->id)->where('publicar', 1)->orderBy('published_at','desc')->paginate(9);

        if($categoria->design == 1){
            return View::make('frontend.categoria-portada', compact('categoria', 'noticias'));
        }else{
            return View::make('frontend.categoria', compact('categoria', 'noticias', 'columnistasDia'));
        }

    }

    public function noticiaTags($id, $url)
    {
        $categoria = Tag::whereId($id)->whereSlugUrl($url)->first();
        $noticias = Post::where('tags', 'LIKE', '%,'.$id.',%')->where('publicar', 1)->orderBy('published_at','desc')->paginate(7);

        return View::make('frontend.categoria', compact('categoria', 'noticias'));
    }

    public function buscar($url, $texto)
    {
        $buscar = $texto;

        return View::make('frontend.'.$url, compact('buscar'));
    }

    public function columnistasList()
    {
        $columnistas = Columnist::where('publicar', 1)->paginate(10);

        return View::make('frontend.columnista-lista', compact('columnistas'));
    }

    public function columnistasPerson($id, $url)
    {
        $columnista = Columnist::whereId($id)->whereSlugUrl($url)->first();
        $columnas = Column::whereColumnistId($id)->orderBy('published_at', 'desc')->paginate(6);

        return View::make('frontend.columnista', compact('columnista','columnas'));
    }

    public function columnistasColumn($id, $url, $idColumn, $urlColumn)
    {
        $columnista = Columnist::whereId($id)->whereSlugUrl($url)->first();
        $columna = Column::whereColumnistId($id)->whereId($idColumn)->whereSlugUrl($urlColumn)->first();

        return View::make('frontend.columnista-noticia', compact('columnista','columna'));
    }

    public function fotosLima($url)
    {
        $galeria = Gallery::where('slug_url', $url)->first();

        return View::make('frontend.galeria-nota', compact('galeria'));
    }

    public function fotosLimaAll()
    {
        $galerias = Gallery::where('publicar', 1)->orderBy('published_at', 'desc')->paginate(12);

        return View::make('frontend.galerias', compact('galerias'));
    }

}