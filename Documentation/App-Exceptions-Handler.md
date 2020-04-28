App\Exceptions\Handler
===============






* Class name: Handler
* Namespace: App\Exceptions
* Parent class: Illuminate\Foundation\Exceptions\Handler





Properties
----------


### $dontReport

    protected array $dontReport = array()

A list of the exception types that are not reported.



* Visibility: **protected**


### $dontFlash

    protected array $dontFlash = array('password', 'password_confirmation')

A list of the inputs that are never flashed for validation exceptions.



* Visibility: **protected**


Methods
-------


### report

    void App\Exceptions\Handler::report(\Throwable $exception)

Report or log an exception.



* Visibility: **public**


#### Arguments
* $exception **Throwable**



### render

    \Symfony\Component\HttpFoundation\Response App\Exceptions\Handler::render(\Illuminate\Http\Request $request, \Throwable $exception)

Render an exception into an HTTP response.



* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request**
* $exception **Throwable**


