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
            'priority' => $this->priority,
            'category' => $this->category->name,
            'title' => $this->title,
            'status' => $this->status,
            'created_at' => $this->created_at,
        ];
    }
}
