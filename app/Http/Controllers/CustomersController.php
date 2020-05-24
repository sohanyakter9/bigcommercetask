<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\CustomerService;

/**
 * CustomersController Class
 */
class CustomersController extends BaseController
{
    public function index(CustomerService $customerService)
    {
        $customers = $customerService->getAllCustomersWithOrdersCount();

        return view('customers', [
            'customers' => $customers,
        ]);
    }
}