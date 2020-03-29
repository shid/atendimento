<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        return parent::toArray($request);
        return [
            'id' => $this->id,
            'priority' => $this->priority,
            'category' => $this->category->name,
            'title' => $this->title,
            'description' => $this->description,
            'status' => $this->status,
            'updated_at' => $this->updated_at,
        ];
    }
}
