<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Agencia
 *
 * @property $id
 * @property $nombre
 * @property $imagen
 * @property $created_at
 * @property $updated_at
 *
 * @property Misione[] $misiones
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Agencia extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'imagen' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','imagen'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function misiones()
    {
        return $this->hasMany('App\Models\Misione', 'agencia_id', 'id');
    }
    

}
