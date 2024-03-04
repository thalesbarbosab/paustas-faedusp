<?php

namespace App\Http\Controllers\Cms\Content;

use Exception;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentBgRequest;

use App\Services\Content\ContentService;

class ContentBgController extends Controller
{
    public function __construct(
        protected readonly ContentService $content_service
    ){}

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = $this->content_service->getBgData();
        return view('cms.content.bg.index',['content'=>$content]);
    }

    public function update(ContentBgRequest $request)
    {
        try{
            $this->content_service->createOrUpdate($request->all());
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroyBgHeaderImage()
    {
        try{
            $this->content_service->deleteBgHeaderImage();
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
     * Remove the specified resource from storage.
     */
    public function destroyBgFooterImage()
    {
        try{
            $this->content_service->deleteBgFooterImage();
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
     * Remove the specified resource from storage.
     */
    public function destroyBgLogoImage()
    {
        try{
            $this->content_service->deleteBgLogoImage();
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
