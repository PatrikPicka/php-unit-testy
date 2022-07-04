<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;

class DatabaseDependantTestCase extends TestCase
{
    protected $entityManager;

    protected function setUp(): void
    {
        parent::setUp();

        require "bootstrap-test.php";
        $this->entityManager = $entityManager;

        SchemaLoader::load($entityManager);
    }

    protected function tearDown() : void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }

    public function assertDbHas(string $entity, array $attrs)
    {
        $result = $this->entityManager->getRepository($entity)->findOneBy($attrs);

        $message = "No records found with these criterias: ";

        foreach ($attrs as $key => $val){
            $message .= $key . " = " . $val;
        }

        $this->assertTrue((bool) $result, $message);
    }
}