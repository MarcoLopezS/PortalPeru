<?php namespace PortalPeru\Entities;

class PostView extends BaseEntity{

    protected $fillable = ['post_id','user_id', 'Vista'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('PortalPeru\Entities\Post', 'post_id');
    }

} 