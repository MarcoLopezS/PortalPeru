<?php namespace PortalPeru\Composers;

use PortalPeru\Entities\Column;
use PortalPeru\Entities\Columnist;
use PortalPeru\Entities\PostView;

class FrontendComposer
{
    public function compose($view)
    {
        //TODOS LOS COLUMNISTAS
        $columnistasAll = Columnist::orderBy('orden', 'asc')->wherePublicar(1)->get();

        //ULTIMAS COLUMNAS
        $columnasDia = Column::where('publicar', 1)->orderBy('published_at', 'desc')->paginate(5);

        //NOTICIAS MAS VISTAS
        $masVisto = PostView::select(['post_id', \DB::raw('COUNT(*) visitas')])
                            ->orderBy('visitas', 'desc')
                            ->groupBy('post_id')
                            ->havingRaw('COUNT(*)')
                            ->take(5)->get();

        $view->with(['columnistasAll' => $columnistasAll, 'columnasDia' => $columnasDia, 'masVisto' => $masVisto]);
    }
}