<?php

namespace App\Http\Controllers\Cms\Ruling;

use Exception;

use App\Http\Controllers\Controller;
use App\Http\Requests\Ruling\RulingStoreUpdateRequest;

use App\Services\Ruling\RulingService;
use App\Services\Ruling\RulingPictureService;

class RulingController extends Controller
{
    public function __construct(
        protected readonly RulingService $ruling_service,
        protected readonly RulingPictureService $ruling_picture_service
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try{
            $ruling = $this->ruling_service->getAllPaginated(5);
            $ruling->withPath('pautas');
            return view('cms.ruling.index',['ruling'=>$ruling]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cms.ruling.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RulingStoreUpdateRequest $request)
    {
        try{
            $ruling = $this->ruling_service->create($request->all());
            $notification = array(
                'message' => trans('validation.notification.inserted'),
                'alert-type' => 'success'
            );
            return to_route('cms.ruling.picture.index',$ruling->id)->with($notification);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try{
            $ruling = $this->ruling_service->find($id);
            return view('cms.ruling.edit',['ruling'=>$ruling]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RulingStoreUpdateRequest $request, string $id)
    {
        try{
            $this->ruling_service->update($request->all(), $id);
            $notification = array(
                'message' => trans('validation.notification.updated'),
                'alert-type' => 'success'
            );
            return to_route('cms.ruling.index')->with($notification);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $this->ruling_picture_service->deleteByRulingId($id);
            $this->ruling_service->delete($id);
            $notification = array(
                'message' => trans('validation.notification.deleted'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }


}
