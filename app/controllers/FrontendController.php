<?php

use PortalPeru\Entities\Category;
use PortalPeru\Entities\Column;
use PortalPeru\Entities\Columnist;
use PortalPeru\Entities\Post;
use PortalPeru\Entities\PostPhoto;

class FrontendController extends BaseController{

    public function construccion()
    {
        return View::make('construccion');
    }

    public function home()
    {
        //NOTICIAS
        $post_1 = Post::where('post_order_id', 1)->where('publicar', 1)->orderBy('published_at','desc')->paginate(4);
        $post_2 = Post::where('post_order_id', 2)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_3 = Post::where('post_order_id', 3)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_4 = Post::where('post_order_id', 4)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_5 = Post::where('post_order_id', 5)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_6 = Post::where('post_order_id', 6)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_7 = Post::where('post_order_id', 7)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_8 = Post::where('post_order_id', 8)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);

        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->wherePublicar(1)->get(); }

        //COLUMNA
        $columnaDia = Column::wherePublicar(1)->orderBy('published_at', 'desc');

        return View::make('frontend.home-1', compact('post_1', 'post_2', 'post_3', 'post_4', 'post_5', 'post_6', 'post_7', 'post_8', 'columnistasDia', 'columnaDia'));
    }

    public function noticia($id)
    {
        $noticia = Post::findOrFail($id);
        $noticiaFotos = PostPhoto::where('post_id', $id)->get();

        return View::make('frontend.noticia', compact('noticia', 'noticiaFotos'));
    }

    public function noticiaCategoria($url)
    {
        $categoria = Category::whereSlugUrl($url)->first();
        $noticias = Post::where('category_id', $categoria->id)->where('publicar', 1)->orderBy('published_at','desc')->paginate(7);

        return View::make('frontend.categoria', compact('categoria', 'noticias'));
    }

    public function buscar($texto)
    {
        $buscar = $texto;
        return View::make('frontend.buscar', compact('buscar'));
    }

    public function columnistasList()
    {
        $columnistas = Columnist::where('publicar', 1)->paginate(7);

        return View::make('frontend.columnista-lista', compact('columnistas'));
    }

    public function columnistasPerson($id, $url)
    {
        $columnista = Columnist::whereId($id)->whereSlugUrl($url)->first();
        $columnas = Column::whereColumnistId($id)->orderBy('published_at', 'desc')->paginate(7);
        
        return View::make('frontend.columnista', compact('columnista','columnas'));
    }
    
    public function columnistasColumn($id, $url, $idColumn, $urlColumn)
    {
        $columnista = Columnist::whereId($id)->whereSlugUrl($url)->first();
        $columna = Column::whereColumnistId($id)->whereId($idColumn)->whereSlugUrl($urlColumn)->first();

        return View::make('frontend.columnista-noticia', compact('columnista','columna'));
    }

}