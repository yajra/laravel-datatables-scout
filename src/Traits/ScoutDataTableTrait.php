<?php

namespace Yajra\DataTables\Traits;

use Yajra\DataTables\ScoutDataTable;

trait ScoutDataTableTrait
{
    /**
     * Get Scout DataTable instance for a model.
     *
     * @return ScoutDataTable
     */
    public static function dataTable()
    {
        return new ScoutDataTable(new static);
    }
}
