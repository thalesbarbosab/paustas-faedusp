<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentContactSendMessageRequest;
use App\Services\Content\ContentService;
use App\Services\Ruling\RulingService;
use App\Services\Ruling\RulingPictureService;

class WebController extends Controller
{
    public function __construct(
        protected readonly ContentService $content_service,
        protected readonly RulingService $ruling_service,
        protected readonly RulingPictureService $ruling_picture_service
    ){}

    public function index()
    {
        $rulings = $this->ruling_service->getAllPaginated(9);
        foreach($rulings as $ruling){
            $ruling = $this->ruling_picture_service->getDefaultCover($ruling);
        }
        $rulings->withPath('/');
        return view('web.ruling',['rulings'=>$rulings]);
    }

    public function rulingDetail($slug)
    {
        $ruling = $this->ruling_service->findBySlug($slug);
        $this->ruling_service->countViews($ruling->id);
        if(count($ruling->pictures)){
            $ruling->pictures = $this->ruling_picture_service->format($ruling->pictures);
        }
        $ruling_recents = $this->ruling_service->getRecents(
            ruling_exclude: $ruling
        );
        foreach($ruling_recents as $post){
            $post = $this->ruling_picture_service->getDefaultCover($post);
        }
        return view("web.ruling-details",['ruling'=>$ruling,'ruling_recents'=>$ruling_recents]);
    }

    public function contact()
    {
        $contact_content = $this->content_service->getContactData();
        return view("web.contact",['contact_content'=>$contact_content]);
    }

    public function storeContact(ContentContactSendMessageRequest $request)
    {
        $this->content_service->sendContactMail($request);
        return back()->with('success',true);
    }
}
