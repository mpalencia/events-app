<?php

namespace App\Transformers;

use App\Model\User;
use League\Fractal\TransformerAbstract;

class AttendeesTransformer extends TransformerAbstract
{
    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user)
    {
        return [
            'id' => $user->pivot->id,
            'order_number' => $user->pivot->order_number,
            'user_id' => $user->id,
            'first_name' => $user->first_name,
            'last_name' => $user->last_name,
            'email' => $user->email,
            'contact' => $user->contact,
            'birthday' => $user->birthday,
            'address' => $user->address,
            'image' => $user->image,
            'attended' => $user->pivot->attended
        ];
    }
}