<?php

namespace App\Http\Resources;

use App\Models\Group;
use Illuminate\Http\Resources\Json\JsonResource;

class BaseStudentResource extends JsonResource
{
    /**
     * @var mixed
     */

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name'=>$this->name,
            'surname'=>$this->surname,
            'patronymic'=>$this->patronymic,
            'passport'=>$this->passport,
            'group'=> new GroupeResource(Group::find($this->group)),
            'citizenship'=>$this->citizenship,
            'PNFL'=>$this->PNFL,
            'INN'=>$this->INN,
            'birthday'=>$this->birthday,
            'place_birthday'=>$this->place_birthday,
            'year_start'=>$this->year_start,
            'year_finish'=>$this->year_finish,
            'n_contract'=>$this->n_contract,
        ];
    }
}
