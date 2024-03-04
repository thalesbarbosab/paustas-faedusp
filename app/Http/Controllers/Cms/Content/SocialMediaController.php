<?php

namespace App\Http\Controllers\Cms\Content;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Content\ContentService;
use App\Http\Requests\Content\ContentSocialMediaRequest;
use Exception;

class SocialMediaController extends Controller
{
    public function __construct(protected readonly ContentService $content_service)
    {
    }

    public function index()
    {
        $socialMedias = $this->content_service->getSocialMedias();
        return view('cms.content.social-medias.index', ['socialMedias' => $socialMedias]);
    }

    public function update(ContentSocialMediaRequest $request)
    {
        try
        {
            $this->content_service->createOrUpdate($request->all());
            $notification = array(
                'message' => trans('validation.notification.updated'),
                'alert-type' => 'success'
            );
            return back()->with($notification);
        }
        catch (Exception $e)
        {
            $notification = $this->proccessError($e);
            return back()->with($notification)->withInput();
        }
    }
}
