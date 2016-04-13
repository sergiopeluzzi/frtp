<?php

namespace frtp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Eventos extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'CCUSTOS';

    protected $fillable = ['DSCCC','VALOR','DT_INI_INS','DT_FIM_INS'];

    public $timestamps = false;

}
