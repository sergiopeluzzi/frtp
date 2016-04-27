<?php

namespace frtp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Modalidades extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'MODALIDADE';

    protected $fillable = ['DSCMOD','VALOR','ANOBASE','INS_UNICO'];

    public $timestamps = false;

}