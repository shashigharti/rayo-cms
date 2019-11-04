<?php

namespace Robust\Pages\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Page extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'content' => $this->content,
            'slug' => $this->slug,
            'excerpt' => $this->excerpt,
            'category_id' => $this->category_id,
            'excerpt_ne' => $this->excerpt_ne,
            'content_ne' => $this->content_ne,
            'name_ne' => $this->name_ne,
            'thumbnail' => $this->thumbnail,
            'status' => $this->status,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords
        ];
    }
}
