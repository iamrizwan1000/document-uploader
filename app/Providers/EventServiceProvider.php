<?php

namespace App\Providers;


use App\Events\Stripe\StripeCouponWebhookReceived;
use App\Events\Stripe\StripeCustomerWebhookReceived;
use App\Events\Stripe\StripePaymentMethodWebhookReceived;
use App\Events\Stripe\StripePlanWebhookReceived;
use App\Events\Stripe\StripePriceWebhookReceived;
use App\Events\Stripe\StripeProductWebhookReceived;
use App\Events\Stripe\StripeWebhookReceived;
use App\Listeners\Stripe\SendStripeCouponEventListener;
use App\Listeners\Stripe\SendStripeCustomerEventListener;
use App\Listeners\Stripe\SendStripeEventListener;
use App\Listeners\Stripe\SendStripePaymentMethodEventListener;
use App\Listeners\Stripe\SendStripePlanEventListener;
use App\Listeners\Stripe\SendStripePriceEventListener;
use App\Listeners\Stripe\SendStripeProductEventListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        StripeWebhookReceived::class => [
            SendStripeEventListener::class
        ],
        StripeProductWebhookReceived::class => [
            SendStripeProductEventListener::class
        ],
        StripePlanWebhookReceived::class => [
            SendStripePlanEventListener::class
        ],
        StripePriceWebhookReceived::class => [
            SendStripePriceEventListener::class
        ],
        StripeCustomerWebhookReceived::class => [
            SendStripeCustomerEventListener::class
        ],
        StripePaymentMethodWebhookReceived::class => [
            SendStripePaymentMethodEventListener::class
        ],
        StripeCouponWebhookReceived::class => [
            SendStripeCouponEventListener::class
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
