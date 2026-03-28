<?php

namespace App\Services\Frontend;

use App\Models\ContactMessage;

class ContactService
{
    /**
     * Store a newly created contact message in storage.
     *
     * @param array $data Validated generic array payload
     * @return ContactMessage
     */
    public function storeMessage(array $data): ContactMessage
    {
        return ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'subject' => $data['subject'],
            'message' => $data['message'],
            'is_read' => false,
        ]);
        
        // Potential future expansion: Send email notification here
    }
}
