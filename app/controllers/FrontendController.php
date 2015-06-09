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
        $post_9 = Post::where('post_order_id', 9)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_10 = Post::where('post_order_id', 10)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);
        $post_11 = Post::where('post_order_id', 11)->where('publicar', 1)->orderBy('published_at','desc')->paginate(1);

        //GALERIA DE FOTOS
        $galeria = Gallery::where('publicar', 1)->orderBy('published_at','desc')->paginate(1);

        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.home-3', compact('post_1', 'post_2', 'post_3', 'post_4', 'post_5', 'post_6', 'post_7', 'post_8', 'post_9', 'post_10', 'post_11', 'galeria', 'columnistasDia', 'masVisto'));
    }

    public function nosotros()
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.nosotros', compact('columnistasDia', 'masVisto'));
    }

    public function contacto()
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.contacto', compact('columnistasDia', 'masVisto'));
    }

    public function publicidad()
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.publicidad', compact('columnistasDia', 'masVisto'));
    }

    public function noticia($id)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

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

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        //NOTICIAS RELACIONADAS
        $notRel = Post::where('category_id', $noticia->category_id)->where('publicar', 1)->where('id', '<>', $noticia->id)->orderBy('published_at', 'desc')->paginate(4);

        return View::make('frontend.noticia', compact('noticia', 'noticiaFotos', 'noticiaTags', 'columnistasDia', 'masVisto', 'notRel'));
    }

    public function noticiaPreview($id)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $noticia = Post::findOrFail($id);
        $noticiaFotos = PostPhoto::where('post_id', $id)->orderBy('orden', 'asc')->get();
        if($noticia->tags <> "0,0,0"){
            $noticiaTags = explode("0,", $noticia->tags);
            $noticiaTags = explode(",0", $noticiaTags[1]);
            $noticiaTags = explode(",", $noticiaTags[0]);
        }elseif($noticia->tags == "0,0,0" OR $noticia->tags == ""){
            $noticiaTags = "";
        }

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.noticia-preview', compact('noticia', 'noticiaFotos', 'noticiaTags', 'columnistasDia', 'masVisto'));
    }

    public function noticiaCategoria($url)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $categoria = Category::whereSlugUrl($url)->first();
        $noticias = Post::where('category_id', $categoria->id)->where('publicar', 1)->orderBy('published_at','desc')->paginate(9);

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        if($categoria->design == 1){
            return View::make('frontend.categoria-portada', compact('categoria', 'noticias', 'columnistasDia', 'masVisto'));
        }else{
            return View::make('frontend.categoria-normal', compact('categoria', 'noticias', 'columnistasDia', 'masVisto'));
        }        

    }

    public function noticiaTags($id, $url)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $categoria = Tag::whereId($id)->whereSlugUrl($url)->first();
        $noticias = Post::where('tags', 'LIKE', '%,'.$id.',%')->where('publicar', 1)->orderBy('published_at','desc')->paginate(7);

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.categoria', compact('categoria', 'noticias', 'columnistasDia', 'masVisto'));
    }

    public function buscar($url, $texto)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $buscar = $texto;

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.'.$url, compact('buscar', 'columnistasDia', 'masVisto'));
    }

    public function columnistasList()
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $columnistas = Columnist::where('publicar', 1)->paginate(10);

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.columnista-lista', compact('columnistas', 'columnistasDia', 'masVisto'));
    }

    public function columnistasPerson($id, $url)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $columnista = Columnist::whereId($id)->whereSlugUrl($url)->first();
        $columnas = Column::whereColumnistId($id)->orderBy('published_at', 'desc')->paginate(7);

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();
        
        return View::make('frontend.columnista', compact('columnista','columnas', 'columnistasDia', 'masVisto'));
    }
    
    public function columnistasColumn($id, $url, $idColumn, $urlColumn)
    {
        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        $columnista = Columnist::whereId($id)->whereSlugUrl($url)->first();
        $columna = Column::whereColumnistId($id)->whereId($idColumn)->whereSlugUrl($urlColumn)->first();

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.columnista-noticia', compact('columnista','columna', 'columnistasDia', 'masVisto'));
    }

    public function fotosLima()
    {
        $galeria = Gallery::where('publicar', 1)->orderBy('published_at','desc')->first();
        
        $galerias = Gallery::where('publicar', 1)->orderBy('published_at','desc')->paginate();

        //COLUNISTAS DEL DIA
        if(date('N')==1){ $columnistasDia = Columnist::whereDiaLunes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==2){ $columnistasDia = Columnist::whereDiaMartes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==3){ $columnistasDia = Columnist::whereDiaMiercoles(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==4){ $columnistasDia = Columnist::whereDiaJueves(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==5){ $columnistasDia = Columnist::whereDiaViernes(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==6){ $columnistasDia = Columnist::whereDiaSabado(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }
        elseif(date('N')==7){ $columnistasDia = Columnist::whereDiaDomingo(1)->orderBy('orden', 'asc')->wherePublicar(1)->get(); }

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', DB::raw('COUNT(*) visitas')])
                                ->orderBy('visitas', 'desc')
                                ->groupBy('post_id')
                                ->havingRaw('COUNT(*)')
                                ->take(4)->get();

        return View::make('frontend.galeria', compact('galeria', 'galerias', 'columnistasDia', 'masVisto'));
    }

}