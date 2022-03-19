<?php

namespace App\Repositories;

use App\Models\Display;
use App\Repositories\Contracts\DisplayRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class DisplayRepository extends BaseRepository implements DisplayRepositoryInterface
{
    public function __construct(Display $model)
    {
        parent::__construct($model);
    }

    public function getAll(Request $request)
    {
        return $this->model->newQuery()
            ->with('company')
            ->when($request->country, function (Builder $query, $country) {
                return $query->whereHas('company', function (Builder $q) use ($country) {
                    $q->where('country', $country);
                });
            })
            ->get();
    }
}
