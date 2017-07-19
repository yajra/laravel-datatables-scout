<?php

namespace Yajra\DataTables;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Laravel\Scout\Builder;
use Yajra\DataTables\DataTableAbstract;

class ScoutDataTable extends DataTableAbstract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @var Collection
     */
    protected $collection;

    /**
     * ScoutDataTable constructor.
     *
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model   = $model;
        $this->request = resolve('datatables.request');
        $this->config  = resolve('datatables.config');
        $this->builder = new Builder($this->model, $this->request->keyword());
    }

    /**
     * Get results.
     *
     * @return mixed
     */
    public function results()
    {
        // Intentionally left blank.
    }

    /**
     * Count results.
     *
     * @return integer
     */
    public function count()
    {
        // Intentionally left blank.
    }

    /**
     * Count total items.
     *
     * @return integer
     */
    public function totalCount()
    {
        // Intentionally left blank.
    }

    /**
     * Perform column search.
     *
     * @return void
     */
    public function columnSearch()
    {
        // Intentionally left blank.
    }

    /**
     * Perform pagination.
     *
     * @return void
     */
    public function paging()
    {
        // Intentionally left blank.
    }

    /**
     * Organizes works.
     *
     * @param bool $mDataSupport
     * @return \Illuminate\Http\JsonResponse
     */
    public function make($mDataSupport = true)
    {
        try {
            $limit   = $this->request->get('length', 10);
            $start   = $this->request->get('start', 0);
            $page    = ($start / $limit) + 1;
            $results = $this->builder->paginate($limit, 'page', $page);
            $this->totalRecords    = $results->total();
            $this->filteredRecords = $this->totalRecords;

            $processed = $this->processResults($results->items(), $mDataSupport);
            $output    = $this->transform($results, $processed);

            $this->collection = collect($output);
            $this->ordering();

            return $this->render($this->collection->values()->all());
        } catch (\Exception $exception) {
            return $this->errorResponse($exception);
        }
    }

    /**
     * @param string $keyword
     */
    protected function globalSearch($keyword)
    {
        // Intentionally left blank.
    }

    /**
     * Append debug parameters on output.
     *
     * @param  array $output
     * @return array
     */
    protected function showDebugger(array $output)
    {
        $output['input'] = $this->request->all();

        return $output;
    }

    /**
     * Resolve callback parameter instance.
     *
     * @return mixed
     */
    protected function resolveCallbackParameter()
    {
        return $this->builder;
    }

    /**
     * Perform default query orderBy clause.
     */
    protected function defaultOrdering()
    {
        $criteria = $this->request->orderableColumns();
        if (! empty($criteria)) {
            $sorter = function ($a, $b) use ($criteria) {
                foreach ($criteria as $orderable) {
                    $column = $this->getColumnName($orderable['column']);
                    $direction = $orderable['direction'];
                    if ($direction === 'desc') {
                        $first = $b;
                        $second = $a;
                    } else {
                        $first = $a;
                        $second = $b;
                    }
                    if ($this->config->isCaseInsensitive()) {
                        $cmp = strnatcasecmp($first[$column], $second[$column]);
                    } else {
                        $cmp = strnatcmp($first[$column], $second[$column]);
                    }
                    if ($cmp != 0) {
                        return $cmp;
                    }
                }
                // all elements were equal
                return 0;
            };
            $this->collection = $this->collection->sort($sorter);
        }
    }
}
