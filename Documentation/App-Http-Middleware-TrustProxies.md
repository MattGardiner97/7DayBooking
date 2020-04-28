App\Http\Middleware\TrustProxies
===============






* Class name: TrustProxies
* Namespace: App\Http\Middleware
* Parent class: Fideloper\Proxy\TrustProxies





Properties
----------


### $proxies

    protected array $proxies

The trusted proxies for this application.



* Visibility: **protected**


### $headers

    protected integer $headers = \Illuminate\Http\Request::HEADER_X_FORWARDED_ALL

The headers that should be used to detect proxies.



* Visibility: **protected**



