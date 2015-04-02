<?php namespace PortalPeru\Entities;

class Tag extends BaseEntity{

    protected $fillable = ['titulo','publicar'];

    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }

} 