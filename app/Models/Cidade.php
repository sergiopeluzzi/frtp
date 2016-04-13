<?php

namespace frtp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Cidade extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'CIDADES';

    protected $fillable = ['DSCCID','UFCID'];

    public $timestamps = false;

}
