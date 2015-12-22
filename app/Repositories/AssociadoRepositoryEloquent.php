<?php

namespace frtp\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use frtp\Repositories\AssociadoRepository;
use frtp\Models\Associado;

/**
 * Class AssociadoRepositoryEloquent
 * @package namespace frtp\Repositories;
 */
class AssociadoRepositoryEloquent extends BaseRepository implements AssociadoRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Associado::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
