<?php

namespace App\Services\Content;

use App\Models\Content;
use App\Helpers\Sanitize;
use chillerlan\QRCode\QRCode;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use App\Mail\ContentContactMail;
use App\Interfaces\Database\Content\ContentInterface;
use App\Http\Requests\Content\ContentContactSendMessageRequest;

class ContentService
{
    // home_about_image
    protected const default_about_image_local_file = 'public/home/';
    protected const default_about_image_file = '/assets/img/about.jpg';
    protected const valid_default_about_image_local_file = '/storage/home/';

    // bg_header_image
    protected const default_bg_header_image_local_file = 'public/bg/';
    protected const default_bg_header_image_file = '/assets/img/about.jpg';
    protected const valid_default_bg_header_image_local_file = '/storage/bg/';

    // bg_footer_image
    protected const default_bg_footer_image_local_file = 'public/bg/';
    protected const default_bg_footer_image_file = '/assets/img/footer-bg.jpg';
    protected const valid_default_bg_footer_image_local_file = '/storage/bg/';

    // bg_logo_image
    protected const default_bg_logo_image_local_file = 'public/bg/';
    protected const default_bg_logo_image_file = '/assets/img/logo-bg.png';
    protected const valid_default_bg_logo_image_local_file = '/storage/bg/';


    protected readonly QRCode $qr_code;

    public function __construct(
        protected readonly ContentInterface $content_repository,
    ){
        $this->qr_code = app(QRCode::class);
    }

    public function getEntityClassNamespace(): string
    {
        return \App\Models\Content::class;
    }

    public function getData(): Content
    {
        $content = $this->content_repository->findFirst();
        if(!isset($content)){
            $content = new Content();
        }
        return $content;
    }

    public function createOrUpdate(array $content_array) : void
    {
        if(isset($content_array['bg_header_file'])){
            $content_array['bg_header_file']->store(self::default_bg_header_image_local_file);
            $content_array['bg_header_image'] = $content_array['bg_header_file']->hashName();
        }
        if(isset($content_array['bg_footer_file'])){
            $content_array['bg_footer_file']->store(self::default_bg_footer_image_local_file);
            $content_array['bg_footer_image'] = $content_array['bg_footer_file']->hashName();
        }
        if(isset($content_array['bg_logo_file'])){
            $content_array['bg_logo_file']->store(self::default_bg_logo_image_local_file);
            $content_array['bg_logo_image'] = $content_array['bg_logo_file']->hashName();
        }
        $this->content_repository->save($content_array);
    }

    public function getSocialMedias(): ?Content
    {
        $social_media_content = $this->content_repository->getSocialMedias();
        if(isset($social_media_content) && $social_media_content->whatsApp != null){
            $social_media_content->whatsapp_url = "https://api.whatsapp.com/send?phone=55" . Sanitize::onlyNumbers($social_media_content->whatsApp);
        }
        return $social_media_content;
    }

    public function getHomeData(): ?Content
    {
        return $this->content_repository->getHomeData();
    }

    public function deleteHomeAboutImage(): void
    {
        $content = $this->getHomeData();
        if(isset($content->home_about_image)){
            Storage::delete(self::default_about_image_local_file.$content->home_about_image);
            $this->content_repository->save([
                'home_about_image' => null
            ]);
        }
    }

    public function getBgData(): ?Content
    {
        $content = $this->content_repository->getBgData();
        $content->bg_header_image_path = self::default_bg_header_image_file;
        if(isset($content->bg_header_image)){
            $content->bg_header_image_path = asset(self::valid_default_bg_header_image_local_file.$content->bg_header_image);
        }
        $content->bg_footer_image_path = self::default_bg_footer_image_file;
        if(isset($content->bg_footer_image)){
            $content->bg_footer_image_path = asset(self::valid_default_bg_footer_image_local_file.$content->bg_footer_image);
        }
        $content->bg_logo_image_path = self::default_bg_logo_image_file;
        if(isset($content->bg_logo_image)){
            $content->bg_logo_image_path = asset(self::valid_default_bg_logo_image_local_file.$content->bg_logo_image);
        }
        return $content;
    }

    public function deleteBgHeaderImage(): void
    {
        $content = $this->getBgData();
        if(isset($content->bg_header_image)){
            Storage::delete(self::default_bg_header_image_local_file.$content->bg_header_image);
            $this->content_repository->save([
                'bg_header_image' => null
            ]);
        }
    }

    public function deleteBgFooterImage(): void
    {
        $content = $this->getBgData();
        if(isset($content->bg_footer_image)){
            Storage::delete(self::default_bg_footer_image_local_file.$content->bg_footer_image);
            $this->content_repository->save([
                'bg_footer_image' => null
            ]);
        }
    }

    public function deleteBgLogoImage(): void
    {
        $content = $this->getBgData();
        if(isset($content->bg_logo_image)){
            Storage::delete(self::default_bg_logo_image_local_file.$content->bg_logo_image);
            $this->content_repository->save([
                'bg_logo_image' => null
            ]);
        }
    }

    public function getContactData(): ?Content
    {
        return $this->content_repository->getContactData();
    }

    public function sendContactMail(ContentContactSendMessageRequest $request): void
    {
        $contact_data = $this->getContactData();
        Mail::send(
            new ContentContactMail(
                $contact_data->contact_default_email,
                $request->name,
                $request->email,
                $request->message,
        ));
    }

}
