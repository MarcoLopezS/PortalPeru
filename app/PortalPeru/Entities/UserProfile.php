<?php namespace PortalPeru\Entities;

class UserProfile extends BaseEntity {

    protected $fillable = ['nombre','apellidos','descripcion','direccion','user_id','social_facebook','social_twitter','social_google','social_youtube','social_pinterest','social_instagram','social_linkedin','social_tumblr'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

} 