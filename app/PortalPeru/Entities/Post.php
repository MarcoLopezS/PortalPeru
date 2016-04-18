<?php namespace PortalPeru\Entities;

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Post extends BaseEntity{

    use SoftDeletingTrait;

    protected $dates = ['deleted_at'];

    protected $fillable = ['titulo','slug_url','descripcion','contenido','imagen','imagen_carpeta','redaccion','publicar','category_id','post_order_id','published_at','user_id'];

    public function user()
    {
        return $this->belongsTo('PortalPeru\Entities\User', 'user_id');
    }

    public function category()
    {
        return $this->belongsTo('PortalPeru\Entities\Category', 'category_id');
    }

    public function video()
    {
        return $this->hasMany('PortalPeru\Entities\PostVideo');
    }

    public function postOrder()
    {
        return $this->belongsTo('PortalPeru\Entities\PostOrder', 'post_order_id');
    }

    public function postPhoto()
    {
        return $this->hasMany('PortalPeru\Entities\PostPhoto');
    }

    public function postHistory()
    {
        return $this->hasMany('PortalPeru\Entities\PostHistory');
    }

    public function postView()
    {
        return $this->hasMany('PortalPeru\Entities\PostView');
    }

    public function postUserDelete()
    {
        return $this->hasMany('PortalPeru\Entities\PostHistory')->whereType('delete')->orderBy('created_at', 'desc')->first();
    }

} 