<?php

namespace App\Http\Controllers\Cms\Content;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentHomeRequest;
use App\Services\Content\ContentService;
use Exception;

class ContentHomeController extends Controller
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
        $content = $this->content_service->getHomeData();
        return view('cms.content.home.index',['content'=>$content]);
    }

    public function update(ContentHomeRequest $request)
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
    public function destroyHomeAboutImage()
    {
        try{
            $this->content_service->deleteHomeAboutImage();
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
