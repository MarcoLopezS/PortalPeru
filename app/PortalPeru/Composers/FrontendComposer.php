<?php namespace PortalPeru\Composers;

use PortalPeru\Entities\Columnist;
use PortalPeru\Entities\PostView;

class FrontendComposer
{
    public function compose($view)
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
        $masVisto = PostView::select(['post_id', \DB::raw('COUNT(*) visitas')])
                            ->orderBy('visitas', 'desc')
                            ->groupBy('post_id')
                            ->havingRaw('COUNT(*)')
                            ->take(5)->get();

        $view->with(['columnistasDia' => $columnistasDia, 'masVisto' => $masVisto]);
    }
}