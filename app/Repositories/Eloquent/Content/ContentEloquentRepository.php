<?php

namespace App\Repositories\Eloquent\Content;

use App\Interfaces\Database\Content\ContentInterface;
use App\Models\Content;

class ContentEloquentRepository implements ContentInterface
{
    public function findFirst(): ?Content
    {
        return Content::first();
    }

    public function save(array $content_array): void
    {
        $content = $this->findFirst();
        if(isset($content)){
            $content->update($content_array);
            return;
        }
        $content_array['id'] = 1;
        Content::create($content_array);
    }

    public function getSocialMedias() : ?Content
    {
        return Content::get(['site','instagram', 'facebook', 'youtube', 'whatsApp','spotify','tweeter','medium'])->first();
    }

    public function getHomeData() : ?Content
    {
        return Content::get(['home_website_title','home_welcome_title','home_welcome_subtitle'])->first();
    }

    public function getBgData() : ?Content
    {
        return Content::get(['bg_header_image','bg_footer_image','bg_logo_image'])->first();
    }

    public function getContributeData() : ?Content
    {
        return Content::get(['bank_info','pix_copy_paste','pix_key','company_name','cnpj','contribute_contact','contribute_title','contribute_subtitle','contribute_more_info'])->first();
    }

    public function getContactData() : ?Content
    {
        return Content::get(['contact_default_email','contact_adress','contact_phone','contact_enable_contact_form'])->first();
    }
}
