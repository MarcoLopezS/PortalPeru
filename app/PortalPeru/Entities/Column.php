<?php namespace PortalPeru\Entities;

class Column extends BaseEntity {

    protected $fillable = ['titulo','slug_url','descripcion','contenido','imagen','imagen_carpeta','publicar','columnist_id','published_at'];

    public function columnist()
    {
        return $this->belongsTo('PortalPeru\Entities\Columnist', 'columnist_id');
    }

    public function getColumnistaAttribute()
    {
        return $this->columnist->nombre." ".$this->columnist->apellidos;
    }
} 