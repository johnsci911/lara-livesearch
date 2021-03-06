<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'          => $this->id,
            'name'        => $this->name,
            'email'       => $this->email,
            'companyId'   => $this->company->id,
			'company'     => $this->company->name,
            'status'      => $this->getStatusName(),
            'phone'       => $this->phone,
            'website'     => $this->website,
            'statusClass' => $this->getStatusClass(),
            'created_at'  => $this->created_at->diffForHumans(),
            'updated_at'  => $this->updated_at->diffForHumans(),
        ];
    }
}
