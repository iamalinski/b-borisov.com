<?php

namespace Database\Seeders;

use App\Models\Section;
use App\Models\Setting;
use App\Models\Text;
use Illuminate\Database\Seeder;

class InitialDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create default sections
        $sections = [
            ['name' => 'Борис Борисов – Фотограф', 'slug' => 'hero'],
            ['name' => 'Истории в кадър', 'slug' => 'stories'],
            ['name' => 'Галерия', 'slug' => 'gallery'],
            ['name' => 'Услуги и пакетни предложения', 'slug' => 'packages'],
        ];

        foreach ($sections as $section) {
            Section::updateOrCreate(
                ['slug' => $section['slug']],
                ['name' => $section['name']]
            );
        }

        // Create default texts
        $texts = [
            'hero_description' => 'Добре дошли в моя свят на фотографията. Аз съм Борис Борисов - фотограф със страст към улавянето на истински емоции и незабравими моменти. Всяка снимка разказва история, а моята мисия е да превърна вашите специални моменти в безценни спомени.',
            'stories_description' => 'Всяка снимка е част от една история. Тук ще откриете моменти, уловени през обектива ми - от нежни сватбени церемонии до спонтанни семейни радости. Вярвам, че истинската красота се крие в автентичността, затова се стремя да улавям емоциите такива, каквито са.',
        ];

        foreach ($texts as $key => $content) {
            Text::updateOrCreate(
                ['key' => $key],
                ['content' => $content]
            );
        }

        // Create default settings
        $settings = [
            ['key' => 'footer_phone', 'value' => '+359 888 123 456', 'type' => 'text', 'group' => 'footer'],
            ['key' => 'footer_email', 'value' => 'contact@b-borisov.com', 'type' => 'text', 'group' => 'footer'],
            ['key' => 'seo_title', 'value' => 'Борис Борисов - Професионална фотография', 'type' => 'text', 'group' => 'seo'],
            ['key' => 'seo_description', 'value' => 'Професионална фотография за сватби, портрети и събития. Улавям незабравими моменти с внимание към детайла.', 'type' => 'textarea', 'group' => 'seo'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type' => $setting['type'],
                    'group' => $setting['group'],
                ]
            );
        }
    }
}
