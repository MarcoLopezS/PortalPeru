<?php namespace PortalPeru\Entities;

class Post extends BaseEntity{

    protected $fillable = ['titulo','slug_url','descripcion','contenido','imagen','imagen_carpeta','redaccion','publicar','category_id','post_order_id','published_at'];

    public function user()
    {
        $this->belongsTo('User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('PortalPeru\Entities\Category', 'category_id');
    }

    public function postOrder()
    {
        return $this->belongsTo('PortalPeru\Entities\PostOrder', 'post_order_id');
    }

    public function postPhoto()
    {
        return $this->hasMany('PortalPeru\Entities\PostPhoto');
    }

} 