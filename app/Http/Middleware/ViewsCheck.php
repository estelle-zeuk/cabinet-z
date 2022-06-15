<?php

namespace App\Http\Middleware;

use App\Repositories\SessionsRepository;
use Closure;
use Illuminate\Http\Request;

class ViewsCheck
{
    /**
     * @var SessionsRepository
     */
    private $sessionsRepository;

    /**
     * ViewsCheck constructor.
     * @param SessionsRepository $sessionsRepository
     */
    public function __construct( SessionsRepository $sessionsRepository){

        $this->sessionsRepository = $sessionsRepository;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $session = $this->sessionsRepository->getById(session()->getId());

        if (is_null($session)) {
            $sessionInputs = ['id'=>session()->getId(),'payload'=>\Str::random(30)];
            $this->sessionsRepository->store($sessionInputs);
        }

        return $next($request);
    }
}
