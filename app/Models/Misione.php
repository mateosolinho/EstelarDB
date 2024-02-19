<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Misione
 *
 * @property $id
 * @property $agencia_id
 * @property $nombre
 * @property $objetivo
 * @property $tripulado
 * @property $status
 * @property $fecha
 * @property $created_at
 * @property $updated_at
 *
 * @property Agencia $agencia
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Misione extends Model
{
    
    static $rules = [
		'agencia_id' => 'required',
		'nombre' => 'required',
		'objetivo' => 'required',
		'tripulado' => 'required',
		'status' => 'required',
		'fecha' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['agencia_id','nombre','objetivo','tripulado','status','fecha'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function agencia()
    {
        return $this->hasOne('App\Models\Agencia', 'id', 'agencia_id');
    }
    

}
