<?php

namespace App\Tests;

use App\Session\Session;
use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{

    protected function setUp() : void
    {
        if(session_status() === PHP_SESSION_ACTIVE){
            session_destroy();
        }
    }

    /**
     * @test
     * Test if the session is already started
     */
    public function can_check_if_session_is_started(){
        $session = new Session;

        $this->assertFalse($session->isStarted());
    }

    /**
     * @test
     * Test if the session can be started and then check if the session is started
     */
    public function a_session_can_be_started()
    {
        $session = new Session;

        $sessionStatus = $session->start();

        $this->assertTrue($sessionStatus);
        $this->assertTrue($session->isStarted());
    }

    /**
     * @test
     * Test if you can set values inside session
     */
    public function items_can_be_added_to_the_session()
    {
        $firstProductId = 1;
        $secondProductId = 2;
        $session = new Session;
        $session->start();

        $session->set("cart_items", [
            $firstProductId => [
                "name" => "Graphics card RTX 3090",
                "quantity" => 5,
                "price" => 28790
            ],
            $secondProductId => [
                "name" => "Graphics card RTX 3090 TI",
                "quantity" => 3,
                "price" => 32490
            ]
        ]);

        $this->assertArrayHasKey($firstProductId, $_SESSION["cart_items"]);
    }

    /**
     * @test
     * Test if the key exists inside session
     */
    public function can_check_if_key_exists_in_session()
    {
        $session = new Session;
        $session->start();
        $session->set("cart_items", [
            "product1" => [
                "name" => "Graphics card RTX 3090",
                "quantity" => 5,
                "price" => 28790
            ],
            "product2" => [
                "name" => "Graphics card RTX 3090 TI",
                "quantity" => 3,
                "price" => 32490
            ]
        ]);

        $check = $session->has("cart_items");

        $this->assertTrue($check);
    }

    /**
     * @test
     * Test if you can get a value based on key from session
     */
    public function can_get_value_from_session_based_on_key()
    {
        $session = new Session;
        $session->start();
        $session->set("cart_items", [
            "product1" => [
                "name" => "Graphics card RTX 3090",
                "quantity" => 5,
                "price" => 28790
            ],
            "product2" => [
                "name" => "Graphics card RTX 3090 TI",
                "quantity" => 3,
                "price" => 32490
            ]
        ]);

        $value = $session->get("cart_items");

        $this->assertTrue($value !== null);
    }

    /**
     * @test
     * Test if you can delete individual item from the session
     */
    public function can_remove_individual_item()
    {
        $session = new Session;
        $session->start();
        $session->set("cart_items", [
            "product1" => [
                "name" => "Graphics card RTX 3090",
                "quantity" => 5,
                "price" => 28790
            ],
            "product2" => [
                "name" => "Graphics card RTX 3090 TI",
                "quantity" => 3,
                "price" => 32490
            ]
        ]);

        $value = $session->get("cart_items");

        $session->remove("cart_items");

        $this->assertTrue($value !== null);
        $this->assertNull($session->get("cart_items"));
    }

    /**
     * @test
     */
    public function session_can_be_cleared()
    {
        $session = new Session;
        $session->start();
        $session->set("cart_items", [
            "product1" => [
                "name" => "Graphics card RTX 3090",
                "quantity" => 5,
                "price" => 28790
            ],
            "product2" => [
                "name" => "Graphics card RTX 3090 TI",
                "quantity" => 3,
                "price" => 32490
            ]
        ]);

        $session->set("customer", [
            "address" => [
                "name" => "Patrik Picka",
                "street" => "Testing 123",
                "country" => "Czech Republic"
            ]
        ]);

        $cart_items = $session->get("cart_items");
        $customer = $session->get("customer");

        $session->clear();

        $this->assertTrue($cart_items !== null);
        $this->assertTrue($customer !== null);
        $this->assertEmpty($_SESSION);
    }
}