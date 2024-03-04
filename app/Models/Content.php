<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
        'id',

        // Imagens de fundo
        'bg_header_image',
        'bg_footer_image',
        'bg_logo_image',

        // Página inicial
        'home_about',
        'home_about_image',
        'home_website_title',
        'home_welcome_title',
        'home_welcome_subtitle',

        // Contatos
        'contact_default_email',
        'contact_adress',
        'contact_phone',
        'contact_enable_contact_form',

        // Redes Sociais
        'site',
        'instagram',
        'facebook',
        'youtube',
        'whatsApp',
        'spotify',
        'tweeter',
        'medium',
    ];

}
