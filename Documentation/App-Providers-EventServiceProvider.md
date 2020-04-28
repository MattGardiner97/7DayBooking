App\Providers\EventServiceProvider
===============






* Class name: EventServiceProvider
* Namespace: App\Providers
* Parent class: Illuminate\Foundation\Support\Providers\EventServiceProvider





Properties
----------


### $listen

    protected array $listen = array(\Illuminate\Auth\Events\Registered::class => array(\Illuminate\Auth\Listeners\SendEmailVerificationNotification::class))

The event listener mappings for the application.



* Visibility: **protected**


Methods
-------


### boot

    void App\Providers\EventServiceProvider::boot()

Register any events for your application.



* Visibility: **public**



