<?php

namespace App\Http\Resources;

use App\Models\Post_comments;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'comment'=>$this->comment,
            'first_name'=>Post_comments::whoIsUserFirstName($this,$this->worker),
            'second_name'=>Post_comments::whoIsUserSecondName($this,$this->worker),
            'img'=>Post_comments::whoIsUserImg($this,$this->worker),
            'date'=>$this->updated_at,
        ];
    }
}
