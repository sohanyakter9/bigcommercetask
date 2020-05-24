<?php

namespace App\Services;

use Carbon\Carbon;
use App\Customer;
use App\Order;

/**
 * CustomerService Class
 */
class CustomerService
{
    /**
     * Customer instance
     * 
     * @var Customer
     */
    protected $customer;

    /**
     * Order instance
     * 
     * @var Order
     */
    protected $order;

    /**
     * Constructor
     * 
     * @param Customer
     * @param Order
     */
    function __construct(Customer $customer, Order $order) {
        $this->customer = $customer;
        $this->order = $order;
    }

    /**
     * Get Customer Details with Orders Information 
     * 
     * @param int id
     * @return object $customer
     */
    public function getCustomerDetailsWithOrderInfo($id)
    {
        $customer = $this->customer->getCustomer($id);
        $orders = $this->order->getOrdersByCustomerId($customer->id);
        $customer->lifeTimeValue = 0;
        
        if(is_array($orders)){
            foreach($orders as $key => $order){
                $customer->lifeTimeValue += $order->total_inc_tax;
                $order->date_created = Carbon::parse($order->date_created)->format('d/m/Y');
                $order->total_inc_tax = number_format($order->total_inc_tax, 2); 
                $orders[$key] = $order;
            }
        }

        $customer->orders = $orders;

        return $customer;
    }

    /**
     * Get All Customers with Orders Count
     * 
     * @return object $customer
     */
    public function getAllCustomersWithOrdersCount()
    {
        $customers = $this->customer->getCustomers();
        if(is_array($customers)){
            foreach($customers as $key => $customer) {
                $customer->ordersCount = $this->order->getOrdersCountByCustomerId($customer->id);
                $customers[$key] = $customer;
            }
        }

        $customers = $this->customer->getArrayPaginator($customers);
        return $customers;
    }

}