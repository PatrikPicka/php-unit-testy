<?php

namespace App\Tests;

use App\Entity\Order;

class OrdersTest extends DatabaseDependantTestCase
{
    /**
     * @test
     */
    public function order_can_be_created(){
        $deliveryAddress = "Testovací 123 Praha 21";
        $deliveryName = "Patrik Picka";
        $finalPrice = 32990;

        $order = new Order;
        $order->setDeliveryAddress($deliveryAddress);
        $order->setDeliveryName($deliveryName);
        $order->setFinalPrice($finalPrice);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->assertDbHas(Order::class, ["deliveryAddress" => $deliveryAddress, "deliveryName" => $deliveryName, "finalPrice" => $finalPrice]);
    }

    /**
     * @test
     */
    public function order_can_be_updated()
    {
        $deliveryAddress = "Testovací 123 Praha 21";
        $deliveryName = "Patrik Picka";
        $finalPrice = 32990;

        $order = new Order;
        $order->setDeliveryAddress($deliveryAddress);
        $order->setDeliveryName($deliveryName);
        $order->setFinalPrice($finalPrice);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $newAddress = "Testovací 321 Praha 21";
        $newName = "Picka Patrik";
        $newPrice = 33000;

        $order->setDeliveryAddress($newAddress);
        $order->setDeliveryName($newName);
        $order->setFinalPrice($newPrice);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->assertNotSame($deliveryAddress, $order->getDeliveryAddress());
        $this->assertNotSame($deliveryName, $order->getDeliveryName());
        $this->assertNotSame($finalPrice, $order->getFinalPrice());
        $this->assertSame(1, $order->getId());
    }

    /**
     * @test
     */
    public function cancel_order_test(){
        $deliveryAddress = "Testovací 123 Praha 21";
        $deliveryName = "Patrik Picka";
        $finalPrice = 32990;

        $order = new Order;
        $order->setDeliveryAddress($deliveryAddress);
        $order->setDeliveryName($deliveryName);
        $order->setFinalPrice($finalPrice);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->assertSame(1, $order->getStatus());

        $cancelStatus = 5;
        $cancelDate = new \DateTimeImmutable();

        $order->setStatus($cancelStatus);
        $order->setCanceledAt($cancelDate);

        $this->entityManager->persist($order);
        $this->entityManager->flush();

        $this->assertSame(1, $order->getId());
        $this->assertSame(5, $order->getStatus());
        $this->assertNotNull($order->getCanceledAt());
    }
} 