<?php namespace PortalPeru\Entities;

class Tag extends BaseEntity{

    protected $fillable = ['titulo','publicar'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

} 