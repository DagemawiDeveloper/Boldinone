<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class StripeWebhookEvent extends Model
{
    protected $fillable = [
        'stripe_event_id',
        'event_type',
        'checkout_session_id',
        'status',
        'last_error',
        'processed_at',
    ];

    protected $casts = [
        'processed_at' => 'datetime',
    ];
}
