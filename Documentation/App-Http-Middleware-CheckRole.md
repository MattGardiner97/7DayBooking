App\Http\Middleware\CheckRole
===============

HTTP middleware for ensuring the currently logged-in user is in a specific role.




* Class name: CheckRole
* Namespace: App\Http\Middleware







Methods
-------


### handle

    mixed App\Http\Middleware\CheckRole::handle(\Illuminate\Http\Request $request, \Closure $next, string $acceptedRole)

Handles the incoming request.

Checks if the user's role matches the specified accepted role and redirects to the home page if not.

* Visibility: **public**


#### Arguments
* $request **Illuminate\Http\Request**
* $next **Closure**
* $acceptedRole **string** - &lt;p&gt;The expected role of the user.&lt;/p&gt;


