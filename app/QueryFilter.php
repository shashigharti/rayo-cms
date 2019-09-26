<?php

namespace App;

use App\Clients\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

/**
 *
 */
abstract class QueryFilter
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var
     */
    protected $builder;

    /**
     * @var array
     */
    protected $params;

    /**
     * @var \App\Clients\DefaultClient|\App\Clients\Santabarbara
     */
    protected $clientObj;

    /**
     * @var
     */
    protected $query;

    /**
     * QueryFilter constructor.
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->params = $this->request->all();

        $this->clientObj = Client::get();

        $this->defaultFilter = "";
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Builder $builder)
    {
        $this->query = $builder;

        if ((!\Request::all() /*|| \Request::get('page')*/) && !(\Request::is('dashboard') || \Request::is('dashboard/*'))) {
            $value = \Request::get('type', Client::get()->getDefaultFilter());
            $this->addFilter('type', $value);
        }


        if ($this->defaultFilter) {
            $filterData = Client::get()->getDefaultSearch();
            $this->params[$this->defaultFilter] = $filterData['type'];
        }


        foreach ($this->filters() as $name => $value) {
            if ($name == 'sort') {
                if (method_exists($this, $name) && !in_array($value, ['default', 'min', 'max'])) {
                    $this->builder = $this->query;
                    call_user_func_array([$this, $name], array_filter([$value]));
                }
            } else {
                $this->query->where(function (Builder $query) use ($name, $value) {
                    $this->applyMapFilters($name, $value, $query);
                });
            }
        }
//        Log::info('2>>Showing user profile for user: ' );
        return $this->query;
    }

    /**
     * @param $key
     * @param string $value
     */
    public function addFilter($key, $value = '')
    {
        $this->params[$key] = $value;
    }

    /**
     * @return array
     */
    public function filters()
    {
        return $this->params;
    }

    /**Apply related filters with or statement
     * @param $name
     * @param $value
     * @param Builder $query
     */
    protected function applyMapFilters($name, $value, $query)
    {
        foreach (Client::get()->getColumnMaps($name) as $filter_name) {
            $query->orWhere(function ($orQuery) use ($filter_name, $value) {
                $this->builder = $orQuery;
                if (method_exists($this, $filter_name) && !in_array($value, ['default', 'min', 'max'])) {
                    call_user_func_array([$this, $filter_name], array_filter([$value]));
                }
            });
        }
    }

    /**
     * @param $params
     */
    public function setFilters($params)
    {
        $this->params = $params;
    }

    /**
     * @param $key
     * @param $value
     */
    public function removeFilter($key, $value)
    {
        unset($this->params[$key]);
    }

    /**
     * @param $key
     */
    public function addCustomFilter($key)
    {
        $this->defaultFilter = $key;
    }
}
