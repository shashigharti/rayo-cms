<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Page extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'name_ne' => $this->name_ne,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'excerpt_ne' => $this->excerpt_ne,
            'content' => $this->content,
            'content_ne' => $this->content_ne,
            'thumbnail' => $this->thumbnail,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
        ];
    }
}
