<?php namespace SolarPhase\Http\Middleware;

use Closure;

class DemoMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
		if (env('APP_DEMO', false) && !$request->isMethod('get'))
		{
			session()->flash('message', [
				'type' => 'warning',
				'text' => trans('admin.demo_message'),
			]);

			return redirect()->back();
		}

		return $next($request);
	}

}
