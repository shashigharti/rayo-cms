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
        $datas = config('banner.banners');
        $images = config('banner.images');
        foreach ($datas as $img_key => $banners)
        {
            foreach ($banners as $key => $banner)
            {
                $banner_id = Banner::updateOrCreate(['slug'=>$banner['slug']],$banner)->id;
                $banners_images = $images[$img_key];
                foreach ($banners_images as $banners_image)
                {
                    $media_id = Media::create($banners_image)->id;
                    Image::create([
                        'banner_id' => $banner_id,
                        'media_id' => $media_id,
                    ]);
                }
            }
        }
    }
}
