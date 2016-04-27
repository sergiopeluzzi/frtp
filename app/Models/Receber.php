<?php

namespace frtp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Receber extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'CTARECEBER';

    protected $fillable = ['EMISSAO','DOCTO','PARC','CODDOC','CODASS','VENCTO','V_PARCELA','CODCC','DOCTOVND'];

    public $timestamps = false;

}
