<?php namespace PortalPeru\Entities;

class PostPhoto extends BaseEntity {
    protected $fillable = ['titulo'];

    public function post()
    {
        return $this->belongsTo('PortalPeru\Entities\Post', 'post_id');
    }
} 