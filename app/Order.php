<?php

namespace App;

use Bigcommerce\Api\Client as Bigcommerce;

/**
 * Order Class
 */
class Order
{
    /**
     * Bigcommerce instance
     * 
     * @var BigCommerce
     */
    protected $bigCommerce;

    /**
     * Constructor
     * 
     * @param Bigcommerce
     */
    function __construct(Bigcommerce $bigCommerce) {
        $this->bigCommerce = $bigCommerce;
    }

     /**
     * Get Orders By customer ID filter
     * 
     * @param int $customer_id
     * @return object $orders
     */
    public function getOrdersByCustomerId($customer_id) {
        $filter = array("customer_id" => $customer_id);
        return $this->bigCommerce->getOrders($filter);
    }

    /**
     * Total Orders by customer id
     * 
     * @param int $customer_id
     * @return int|null
     */ 
    public function getOrdersCountByCustomerId($customer_id){
        $filter = array("customer_id" => $customer_id);
        return $this->bigCommerce->getOrdersCount($filter);
    }
      
}
