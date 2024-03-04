<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::updateOrCreate(
            [
                'id' => '1',
            ],
            [
                'id' => '1',
                'home_website_title' => 'Título do website',
                'home_welcome_title' => 'Bem vindo ao Website',
                'home_welcome_subtitle' => 'Aqui definimos um breve resumo sobre o website e um texto para despertar a atenção do usuario que esta navegando',
                'contact_default_email' => 'email@example.com',
                'contact_phone' => '(11) 93487-7223',
                'contact_adress' => 'Rua Padre Estevão Pernet, 43, Tatuapé, São Paulo, SP',
                'contact_enable_contact_form' => true,
            ]
        );
    }
}
