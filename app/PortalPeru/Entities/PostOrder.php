<?php namespace PortalPeru\Entities;

class PostOrder extends BaseEntity{

    protected $fillable = ['titulo','orden'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

    public function post()
    {
        return $this->hasMany('PortalPeru\Entities\Post');
    }

} 