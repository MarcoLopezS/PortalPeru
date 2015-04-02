<?php namespace PortalPeru\Entities;

class Configuration extends BaseEntity {
	protected $fillable = ['titulo','dominio','descripcion','keywords','icon','timezone_id'];

    public function timezone()
    {
        return $this->belongsTo('Timezone', 'timezone_id');
    }
}