<?php namespace PortalPeru\Entities;

class Columnist extends BaseEntity{

    protected $fillable = ['slug_url','nombre','apellidos','descripcion','foto','imagen_portada','dia_lunes','dia_martes','dia_miercoles','dia_jueves','dia_viernes','dia_sabado','dia_domingo','publicar'];

    public function user()
    {
        $this->belongsTo('User', 'user_id');
    }

    public function column()
    {
        return $this->hasMany('PortalPeru\Entities\Column');
    }

    public function columnHome()
    {
        return $this->hasMany('PortalPeru\Entities\Column')->wherePublicar(1)->orderBy('published_at', 'desc')->paginate(1);
    }

} 