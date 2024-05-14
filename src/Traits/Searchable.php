<?php

namespace Dipesh79\LaravelGlobalSearch\Traits;

use Dipesh79\LaravelGlobalSearch\Exception\SearchableColumnsNotSpecifiedException;

trait Searchable
{
    /**
     * @throws SearchableColumnsNotSpecifiedException
     */
    public static function searchGlobally($query, $searchOperator = null)
    {
        return (new static)->globalSearch($query, $searchOperator);
    }

    /**
     * @throws SearchableColumnsNotSpecifiedException
     */
    public function globalSearch($query, $searchOperator)
    {
        if (empty($query) && !config('laravel-global-search.allowEmptyQuerySearch')) {
            return collect();
        }
        $searchableColumns = $this->searchable ?? [];

        if (empty($searchableColumns)) {
            throw new SearchableColumnsNotSpecifiedException(static::class);
        }

        if (empty($searchOperator))
        {
            $searchOperator = config('laravel-global-search.searchOperator');
        }

        return $this->where(function ($queryBuilder) use ($query, $searchableColumns, $searchOperator) {
            foreach ($searchableColumns as $column) {
                $queryBuilder->orWhere($column, $searchOperator, $searchOperator === 'like' ? "%$query%" : $query);
            }
        })->get();

    }
}
