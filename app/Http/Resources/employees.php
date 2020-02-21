<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class employees extends JsonResource
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
            'id'            => $this->id,
            'first_name'    => !empty($this->first_name) ? $this->first_name : '',
            'last_name'     => !empty($this->last_name) ? $this->last_name : '',
            'email'         => !empty($this->email) ? $this->email : '',
            'phone'         => !empty($this->phone) ? $this->phone : '',
            'company'       => !empty($this->company->name) ? $this->company->name : ''
        ];
    }
}
