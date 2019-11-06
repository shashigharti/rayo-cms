<?php

use Illuminate\Database\Seeder;
use Robust\Banners\Models\Banner;
use Robust\Core\Models\Media;
use Robust\Banners\Models\Image;

class BannersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banners = [
            [
                'name' => 'Main Banner',
                'slug' => 'main-banner',
                'type' => 1,
                'slider' => 1,
                'block' => '',
                'order' => 1,
                'status' => 1
            ],
            [
                'name' => 'First Slider',
                'slug' => 'first-slider',
                'type' => 2,
                'slider' => 1,
                'block' => '',
                'order' => 2,
                'status' => 1
            ],
            [
                'name' => 'Second Slider',
                'slug' => 'second-slider',
                'type' => 2,
                'slider' => 1,
                'block' => '',
                'order' => 3,
                'status' => 1
            ],
            [
                'name' => 'First Single Row Slider',
                'slug' => 'first-single-row-slider',
                'type' => 3,
                'slider' => 1,
                'block' => '',
                'order' => 4,
                'status' => 1
            ],
            [
                'name' => 'Second Single Row Slider',
                'slug' => 'second-single-row-slider',
                'type' => 3,
                'slider' => 1,
                'block' => '',
                'order' => 5,
                'status' => 1
            ],
        ];
        $url = 'https://media.istockphoto.com/photos/beautiful-luxury-home-exterior-with-green-grass-and-landscaped-yard-picture-id856794670?k=6&m=856794670&s=612x612&w=0&h=gneLQSj2K6CzxU4r7DG_HUjd00ZMiZnYhYW_R0goPZ4=';

        foreach ($banners as $banner)
        {
            $banner_id = Banner::updateOrCreate(['slug'=>$banner['slug']],$banner)->id;
            $media_id = Media::create([
                'name' => 'Demo Image',
                'slug' => 'demo-image',
                'extension' => 'jpeg',
                'type' => 'url',
                'description' => 'House image',
                'file' => $url,
            ])->id;
            $banner_images = Image::create([
               'banner_id' => $banner_id,
               'media_id' => $media_id,
            ]);
        }
    }
}
