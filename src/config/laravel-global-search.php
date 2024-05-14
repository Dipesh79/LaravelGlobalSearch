<?php

return [
    /**
     * Default Models to be searched
     */

    'models' => [
        // \App\Models\User::class
    ],

    /**
     * Default search operator
     */

    'searchOperator' => 'like',

    /**
     * Allow empty query search
     *
     * If set to false, it will return an empty collection if the query is empty
     *
     */

    'allowEmptyQuerySearch' => true,
];
