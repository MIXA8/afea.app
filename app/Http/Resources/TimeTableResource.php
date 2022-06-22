<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeTableResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'subject' => $this->subjectInf->title,
            'room' => $this->roomInf->title,
            'group' => $this->groupInf->title,
            'worker' => [
                'name' => $this->workerInf->name,
                'surname' => $this->workerInf->surname,
                'patronymic' => $this->workerInf->patronymic,
                'img'=>$this->workerInf->img
            ],
            'time_start' => $this->time_start,
            'time_finish' => $this->time_finish,
            'day'=>$this->day,
            'month'=>$this->month,
            'year'=>$this->year,
            'date'=>$this->date,

        ];
    }
}
