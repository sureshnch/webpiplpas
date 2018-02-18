<?php

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {

        Route::resource('requirements', 'RequirementsController', ['except' => ['create', 'edit']]);

        Route::resource('resumes', 'ResumesController', ['except' => ['create', 'edit']]);

});
