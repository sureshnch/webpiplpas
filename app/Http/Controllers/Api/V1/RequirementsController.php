<?php

namespace App\Http\Controllers\Api\V1;

use App\Requirement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequirementsRequest;
use App\Http\Requests\Admin\UpdateRequirementsRequest;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class RequirementsController extends Controller
{
    public function index()
    {
        return Requirement::all();
    }

    public function show($id)
    {
        return Requirement::findOrFail($id);
    }

    public function update(UpdateRequirementsRequest $request, $id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->update($request->all());
        

        return $requirement;
    }

    public function store(StoreRequirementsRequest $request)
    {
        $requirement = Requirement::create($request->all());
        

        return $requirement;
    }

    public function destroy($id)
    {
        $requirement = Requirement::findOrFail($id);
        $requirement->delete();
        return '';
    }
}
