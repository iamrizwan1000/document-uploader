<?php

namespace App\Http\Resources;

use App\Models\ClicktoAccount;
use App\Models\ClicktoAccountHasRoles;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Spatie\Permission\Models\Role;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at != null || '' ? 'Verified' : 'Not Verified',
            'created_at' => Carbon::parse($this->created_at)->format('jS F Y'),
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
