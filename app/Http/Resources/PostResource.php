<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'text'=> $this->text,
            'shorts'=> $this->shorts,
            'img'=> asset('storage/'.$this->img),
            'department'=>[
                'id'=>$this->department->id,
                'title'=>$this->department->title,
                'img'=>asset('storage/'.$this->department->img),
            ],
            'comment'=> $this->comment,
            'date'=>Carbon::make($this->updated_at)->format('Y-m-d H-m-s'),
        ];
    }
}
