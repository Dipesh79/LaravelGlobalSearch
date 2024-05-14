<?php

namespace Dipesh79\LaravelGlobalSearch\Exception;

use Exception;

class SearchableColumnsNotSpecifiedException extends Exception
{
    public function __construct($modelName)
    {
        $message = "Searchable columns not specified for model: $modelName. ";
        $solution = "Define a property named 'searchable' in the model and specify the columns to search in. e.g. protected array \$searchable = ['name', 'email'];";
        parent::__construct($message.' '. $solution);
    }
}
