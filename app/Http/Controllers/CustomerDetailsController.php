<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use App\Services\CustomerService;

/**
 * CustomerDetailsController Class
 */
class CustomerDetailsController extends BaseController
{
    public function show($id, CustomerService $customerService)
    {
        $customer = $customerService->getCustomerDetailsWithOrderInfo($id);
        
        return view('details', [
            'customer' => $customer,
        ]);
    }
}