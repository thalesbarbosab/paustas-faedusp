<?php

namespace App\Http\Controllers\Cms\Content;

use Exception;
use App\Http\Controllers\Controller;
use App\Services\Content\ContentService;
use App\Http\Requests\Content\ContentContactRequest;

class ContentContactController extends Controller
{
    public function __construct(protected readonly ContentService $content_service)
    {
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
   {
       $content = $this->content_service->getData();
       return view('cms.content.contact.index',['content'=>$content]);
   }

   public function update(ContentContactRequest $request)
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
}


