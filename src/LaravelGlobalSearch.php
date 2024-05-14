<?php

namespace Dipesh79\LaravelGlobalSearch;


class LaravelGlobalSearch
{
    public static function globalSearch(
        string $query,
        array $models = [],
        string $searchOperator = null
    ): \Illuminate\Support\Collection {
        if (empty($models)) {
            $models = config('laravel-global-search.models');
        }
        if (empty($searchOperator)) {
            $searchOperator = config('laravel-global-search.searchOperator');
        }
        $results = collect();
        foreach ($models as $modelClass) {
            $modelClass = new $modelClass;
            $results = $results->merge($modelClass->globalSearch($query, $searchOperator));
        }
        return $results;
    }

}
