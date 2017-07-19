<?php

namespace Yajra\DataTables\Traits;

trait ScoutDataTableTrait
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public static function dataTable()
    {
        return new ScoutDataTable(new static);
    }
}
