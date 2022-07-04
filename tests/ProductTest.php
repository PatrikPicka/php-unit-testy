<?php

namespace App\Tests;

use App\Entity\Product;
use App\Tests\DatabaseDependantTestCase;

class ProductTest extends DatabaseDependantTestCase
{
    /**
     * @test
     */
    public function can_create_a_product(){
        $name = "Nvidia RTX 3090 TI";
        $description = "Nejvákonnější grafická karta na trhu od výrobce Nvidia";
        
        $product = new Product;
        $product->setname($name);
        $product->setDescription($description);
        $product->setPrice(32800);

        $this->entityManager->persist($product);
        $this->entityManager->flush();

        $this->assertDbHas(Product::class, ["name" => $name, "description" => $description]);
    }
}