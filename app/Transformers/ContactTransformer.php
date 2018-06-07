<?php

namespace App\Transformers;

use App\Model\Contact;
use League\Fractal\TransformerAbstract;

class ContactTransformer extends TransformerAbstract
{

    /**
     * @param Contact $contact
     * @return array
     */
    public function transform(Contact $contact)
    {
        return [
            'contacts' => $contact->contacts
        ];
    }
}