<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'is_mine' => $this->user_id == $request->input('user_id'),
            'user' => [
                'name' => optional($this->user)->name,
                'picture' => ''
            ],
            'reply_to' => [
                'name' => optional($this->reply_to)->name,
                'picture' => ''
            ],
            'comments' => $this->comments,
            'created_at' => $this->created_at->format('H:m:s | d M Y'),
        ];
    }
}
