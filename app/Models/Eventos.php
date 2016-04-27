<?php

namespace frtp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Eventos extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'EVENTOS';

    protected $fillable = ['DATA_EVENTO','NOME_EVENTO','VALOR','DAT_INI','DAT_FIM','CODCC'];

    public $timestamps = false;

}


/*
 *
 * class Eventos extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'CCUSTOS';

    protected $fillable = ['DSCCC','VALOR','DT_INI_INS','DT_FIM_INS'];

    public $timestamps = false;

}
*/
