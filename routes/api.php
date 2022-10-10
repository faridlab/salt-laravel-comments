<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use SaltComments\Controllers\ApiNestedResourcesController;

use SaltComments\Controllers\CommentsResourcesController;

$version = config('app.API_VERSION', 'v1');

Route::middleware(['api'])
    ->prefix("api/{$version}")
    ->group(function () {

    // API: COMMENTS RESOURCES
    Route::get("comments", [CommentsResourcesController::class, 'index']); // get entire collection
    Route::post("comments", [CommentsResourcesController::class, 'store']); // create new collection

    Route::get("comments/trash", [CommentsResourcesController::class, 'trash']); // trash of collection

    Route::post("comments/import", [CommentsResourcesController::class, 'import']); // import collection from external
    Route::post("comments/export", [CommentsResourcesController::class, 'export']); // export entire collection
    Route::get("comments/report", [CommentsResourcesController::class, 'report']); // report collection

    Route::get("comments/{id}/trashed", [CommentsResourcesController::class, 'trashed'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID from trash

    // RESTORE data by ID (id), selected IDs (selected), and All data (all)
    Route::post("comments/{id}/restore", [CommentsResourcesController::class, 'restore'])->where('id', '[a-zA-Z0-9-]+'); // restore collection by ID

    // DELETE data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("comments/{id}/delete", [CommentsResourcesController::class, 'delete'])->where('id', '[a-zA-Z0-9-]+'); // hard delete collection by ID

    Route::get("comments/{id}", [CommentsResourcesController::class, 'show'])->where('id', '[a-zA-Z0-9-]+'); // get collection by ID
    Route::put("comments/{id}", [CommentsResourcesController::class, 'update'])->where('id', '[a-zA-Z0-9-]+'); // update collection by ID
    Route::patch("comments/{id}", [CommentsResourcesController::class, 'patch'])->where('id', '[a-zA-Z0-9-]+'); // patch collection by ID
    // DESTROY data by ID (id), selected IDs (selected), and All data (all)
    Route::delete("comments/{id}", [CommentsResourcesController::class, 'destroy'])->where('id', '[a-zA-Z0-9-]+'); // soft delete a collection by ID

});
