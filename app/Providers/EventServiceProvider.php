<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use SocialiteProviders\Manager\SocialiteWasCalled;
use SocialiteProviders\Naver\NaverExtendSocialite;
use SocialiteProviders\Kakao\KakaoExtendSocialite;
use SocialiteProviders\Google\GoogleExtendSocialite;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        // 'App\Events\SomeEvent' => [
        //     'App\Listeners\EventListener',
        // ],

        // SocialiteWasCalled::class => [
        //     NaverExtendSocialite::class,
        //     KakaoExtendSocialite::class,
        //     GoogleExtendSocialite::class,
        // ], 
        \SocialiteProviders\Manager\SocialiteWasCalled::class => [
            'SocialiteProviders\Naver\NaverExtendSocialite@handle',
            'SocialiteProviders\Kakao\KakaoExtendSocialite@handle',
            'SocialiteProviders\Google\GoogleExtendSocialite@handle',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
