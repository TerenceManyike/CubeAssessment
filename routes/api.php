<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Variant
    Route::apiResource('variants', 'VariantApiController');

    // Product
    Route::apiResource('products', 'ProductApiController');

    // Category
    Route::apiResource('categories', 'CategoryApiController');
});
