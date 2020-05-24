<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Pagination\LengthAwarePaginator;
use Bigcommerce\Api\Client as Bigcommerce;
use Carbon\Carbon;

/**
 * Customer Class
 */
class Customer
{
    /**
     * Bigcommerce instance
     * 
     * @var BigCommerce
     */
    protected $bigCommerce;

    /**
     * Request instance
     * 
     * @var Request
     */    
    protected $request;

    /**
     * Customer Records limit
     *
     * @var int
     */
    protected $limit;

    /**
     * Total Numver Of Customers
     *
     * @var int
     */
    protected $totalCustomerRecords;

    /**
     * Constructor
     * @param Bigcommerce
     * @param Request
     */
    function __construct(Bigcommerce $bigCommerce, Request $request) {
        $this->bigCommerce = $bigCommerce;
        $this->request = $request;
        $this->limit = 30;
        $this->totalCustomerRecords = $this->getCustomersCount();
    }
    
    /**
     * Get Customer Details By Customer ID
     * 
     * @param int $id     * 
     * @return object $customer
     */
    public function getCustomer($id) {
         return $this->bigCommerce->getCustomer($id); 
    }

    /**
     * Get All Customers
     * 
     * @return object $customers
     */
    public function getCustomers() {
        $filter = array("page" => $this->request->query('page'), "limit" => $this->limit);
        $customers = $this->bigCommerce->getCustomers($filter);

        return $customers;
    }

    /**
     * Total Customers in BigCommerce
     *
     * @return int|null
     */ 
    public function getCustomersCount(){
        return $this->bigCommerce->getCustomersCount();
    }

    /**
     * Customer Pagination
     *
     * @param array $customer
     * @return Illuminate\Pagination\LengthAwarePaginator
     */
    public function getArrayPaginator($customer_array)
    {
        $page = Input::get('page', 1);
        $offset = ($page * $this->limit) -  $this->limit;
    
        return new LengthAwarePaginator($customer_array, $this->totalCustomerRecords, $this->limit, $page,
            ['path' => $this->request->url(), 'query' => $this->request->query()]);
       
    } 
}
