<?php

return [

    /*
    |--------------------------------------------------------------------------
    | View Storage Paths
    |--------------------------------------------------------------------------
    |
    | Most applications have a single path containing their views, but you
    | may provide multiple locations if needed. Laravel will scan these
    | paths in order until it finds the requested view template.
    |
    */

    'paths' => [
        resource_path('views'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Compiled View Path
    |--------------------------------------------------------------------------
    |
    | Blade templates are compiled to plain PHP before execution. On Vercel,
    | the deployment bundle is read-only, so the compiled views need to live
    | in the writable /tmp filesystem instead of storage/framework/views.
    |
    */

    'compiled' => env(
        'VIEW_COMPILED_PATH',
        realpath(storage_path('framework/views')) ?: storage_path('framework/views')
    ),

];
