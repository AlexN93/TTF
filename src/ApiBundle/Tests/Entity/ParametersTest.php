<?php

namespace ApiBundle\Tests\Entity;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use ApiBundle\Entity\Parameters;

class ParametersTest extends WebTestCase
{
    private function getKernel()
    {
        $kernel = $this->createKernel();
        $kernel->boot();
        return $kernel;
    }

    public function testEmptyObject()
    {
        $kernel = $this->getKernel();
        $validator = $kernel->getContainer()->get('validator');
        $errors = $validator->validate(new Parameters);
        $this->assertEquals(6, $errors->count());
        $this->assertEquals('This value should not be null.', $errors[0]->getMessage());
        $this->assertEquals('This value should not be null.', $errors[1]->getMessage());
        $this->assertEquals('This value should not be null.', $errors[2]->getMessage());
        $this->assertEquals('This value should not be null.', $errors[3]->getMessage());
        $this->assertEquals('This value should not be null.', $errors[4]->getMessage());
        $this->assertEquals('This value should not be null.', $errors[5]->getMessage());
    }
}