<?php namespace PortalPeru\Entities;

class PostVideo extends BaseEntity{

    protected $fillable = ['titulo','descripcion','video'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('PortalPeru\Entities\Post', 'post_id');
    }

} 