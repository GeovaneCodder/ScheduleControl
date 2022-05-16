<?php

namespace App\Http\Controllers;

use Illuminate\{
    Foundation\Auth\Access\AuthorizesRequests,
    Foundation\Bus\DispatchesJobs,
    Foundation\Validation\ValidatesRequests,
    Http\JsonResponse,
    Routing\Controller as BaseController
};

class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;
}
