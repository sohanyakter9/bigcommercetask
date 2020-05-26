<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    /**
     * Customer Lis Page.
     *
     * @return void
     */
    public function testCustomerListPage()
    {
        $response = $this->get('/customers/')->assertStatus(200);
    }
}
