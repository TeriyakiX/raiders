<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
            'displayRole' => $this->display_role,
            'clan' => $this->clan,
            'avatar' => $this->avatar,
            'referrals' => $this->referrals,
            'totalInvitation' => $this->total_invitation,
            'verified' => $this->verified,
            'agreement' => $this->agreement,
        ];
    }
}
