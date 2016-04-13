<?php

namespace frtp\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Associado extends Model implements Transformable
{
    use TransformableTrait;

    protected $table = 'ASSOCIADO';

    protected $fillable = ['NOMASS','ENDERECO','CODCID','CEP','BAIRRO','FONE','CELULAR','CPF','RG','NASCTO','SEXO','NATURALI','ECIVIL','PROFISSAO','EMAIL','PAI','MAE','NOME_COM','END_COM','BAI_COM','CID_COM','CEP_COM','FONE_COM','FAX_COM','EMAIL_COM','SITE_COM'];

    public $timestamps = false;

}
