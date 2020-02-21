<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class companies extends JsonResource
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
            'id'        => $this->id,
            'name'      => !empty($this->name)?$this->name:'',
            'email'     => !empty($this->email)?$this->email:'',
            'logo'      => !empty($this->logo)?url(\Storage::disk('local')->url($this->logo)):'',
            'employees' => $this->employees
        ];
    }
}
