<?php namespace PortalPeru\Entities;

class PostVideo extends BaseEntity{

    protected $fillable = ['titulo','slug_url','descripcion','contenido','imagen','imagen_carpeta','redaccion','publicar','category_id','post_order_id','published_at','user_id'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('PortalPeru\Entities\Post', 'post_id');
    }

} 