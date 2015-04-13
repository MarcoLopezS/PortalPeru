<?php namespace PortalPeru\Entities;

class Category extends BaseEntity{

    protected $fillable = ['titulo','publicar'];

    protected $perPage = 10;

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

    public function post()
    {
        return $this->hasMany('PortalPeru\Entities\Post');
    }

} 