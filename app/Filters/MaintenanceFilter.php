<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MaintenanceFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (filter_var(env('APP_MAINTENANCE', false), FILTER_VALIDATE_BOOLEAN)) {
            return service('response')
                ->setStatusCode(503)
                ->setBody(view('errors/html/maintenance'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
    }
}
