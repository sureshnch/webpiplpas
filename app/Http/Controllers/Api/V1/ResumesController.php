<?php

namespace App\Http\Controllers\Api\V1;

use App\Resume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreResumesRequest;
use App\Http\Requests\Admin\UpdateResumesRequest;
use App\Http\Controllers\Traits\FileUploadTrait;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;

class ResumesController extends Controller
{
    use FileUploadTrait;

    public function index()
    {
        return Resume::all();
    }

    public function show($id)
    {
        return Resume::findOrFail($id);
    }

    public function update(UpdateResumesRequest $request, $id)
    {
        $request = $this->saveFiles($request);
        $resume = Resume::findOrFail($id);
        $resume->update($request->all());
        

        return $resume;
    }

    public function store(StoreResumesRequest $request)
    {
        $request = $this->saveFiles($request);
        $resume = Resume::create($request->all());
        

        return $resume;
    }

    public function destroy($id)
    {
        $resume = Resume::findOrFail($id);
        $resume->delete();
        return '';
    }
}
