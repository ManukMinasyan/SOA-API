<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'page_uuid' => $this->page_uuid,
            'page_name' => $this->page_name,
            'page_content' => $this->page_content
        ];
    }
}
