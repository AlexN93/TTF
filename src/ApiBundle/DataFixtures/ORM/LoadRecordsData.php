<?php

namespace ApiBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ApiBundle\Entity\Parameters;

class LoadRecordsData implements FixtureInterface
{
    private $data = [ array (
        "a" => false,
        "b" => true,
        "c" => true,
        "d" => 1,
        "e" => 2,
        "f" => 3,
        "x" => "T",
        "y" => 0.97
    ), array (
        "a" => true,
        "b" => true,
        "c" => false,
        "d" => 1,
        "e" => 2,
        "f" => 3,
        "x" => "T",
        "y" => 0.97
    ), array (
        "a" => true,
        "b" => false,
        "c" => true,
        "d" => 1,
        "e" => 2,
        "f" => 3,
        "x" => "S",
        "y" => 4.02
    ), array (
        "a" => true,
        "b" => true,
        "c" => true,
        "d" => 1,
        "e" => 2,
        "f" => 3,
        "x" => "R",
        "y" => 2.02
    )];

    public function load(ObjectManager $manager)
    {
        foreach ($this->data as $object) {
            $record = new Parameters();
            $record->setA($object["a"]);
            $record->setB($object["b"]);
            $record->setC($object["c"]);
            $record->setD($object["d"]);
            $record->setE($object["e"]);
            $record->setF($object["f"]);
            $record->setX($object["x"]);
            $record->setY($object["y"]);
            $manager->persist($record);
        }

        $manager->flush();
    }
}