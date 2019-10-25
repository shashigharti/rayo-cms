<?php

namespace Robust\Mls\Models;

use Robust\Core\Models\BaseModel;
use Illuminate\Http\Request;

class QueryFilter extends BaseModel
{
    protected $request;

    protected $builder;

    protected $params;

    protected $clientObj;

    protected $query;

    /**
     * QueryFilter constructor.
     *
     * @param $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;

        $this->params = $this->request->all();

        $this->clientObj = Client::get();

        $this->defaulFilter = "";
    }

    public function apply(Builder $builder)
    {
        $this->query = $builder;

        if ((!\Request::all() /*|| \Request::get('page')*/) && !(\Request::is('dashboard') || \Request::is('dashboard/*')))
        {
            $value = \Request::get('type', Client::get()->getDefaultFilter());
            $this->addFilter('type', $value);
        }


        if($this->defaulFilter){
            $filterData = Client::get()->getDefaultSearch();
            $this->params[$this->defaulFilter] = $filterData['type'];
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

    public function filters()
    {
        return $this->params;
    }

    public function setFilters($params)
    {
        $this->params = $params;
    }

    public function addFilter($key, $value = '')
    {
        $this->params[$key] = $value;
    }

    public function removeFilter($key, $value)
    {
        unset($this->params[$key]);
    }

    public function addCustomFilter($key)
    {
        $this->defaulFilter = $key;
    }
}
