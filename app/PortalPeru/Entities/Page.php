<?php namespace PortalPeru\Entities;

class Page extends BaseEntity{

    protected $fillable = ['titulo','descripcion','contenido','imagen','published_at','publicar'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

} 