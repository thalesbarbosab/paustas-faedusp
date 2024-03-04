<?php

namespace App\Http\Controllers\Cms\Ruling;

use Exception;

use App\Http\Controllers\Controller;

use App\Services\Ruling\RulingPictureService;
use App\Http\Requests\Ruling\RulingPictureStoreRequest;

class RulingPictureController extends Controller
{
    public function __construct(
        protected readonly RulingPictureService $ruling_picture_service
    ){}

     /**
     * Display a listing of the resource.
     */
    public function index(string $ruling_id)
    {
        try{
            $ruling = $this->ruling_picture_service->findRuling($ruling_id);
            $ruling_pictures = $this->ruling_picture_service->getAllPaginated($ruling_id, 12);
            return view('cms.ruling.picture.index',['ruling'=>$ruling,'ruling_pictures'=>$ruling_pictures]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($ruling_id)
    {
        try{
            $ruling = $this->ruling_picture_service->findRuling($ruling_id);
            return view('cms.ruling.picture.create',['ruling'=>$ruling]);
        }
        catch (Exception $e) {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RulingPictureStoreRequest $request, $ruling_id)
    {
        try{
            $this->ruling_picture_service->create($ruling_id, $request->path);
            $notification = array(
                'message' => trans('validation.notification.inserted'),
                'alert-type' => 'success'
            );
            return to_route('cms.ruling.picture.index',$ruling_id)->with($notification);
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
            $this->ruling_picture_service->delete($id);
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

    /**
     * Store a updated resource in storage.
     */
    public function setAsDefault($ruling_id, $ruling_picture_id)
    {
        try{
            $this->ruling_picture_service->setAsDefault($ruling_id, $ruling_picture_id);
            $notification = array(
                'message' => trans('validation.notification.updated'),
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
