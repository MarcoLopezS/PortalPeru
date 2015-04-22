<?php namespace PortalPeru\Entities;

class PostHistory extends BaseEntity{

    protected $fillable = ['post_id','user_id'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

    public function post()
    {
        return $this->belongsTo('PortalPeru\Entities\Post', 'post_id');
    }

} 