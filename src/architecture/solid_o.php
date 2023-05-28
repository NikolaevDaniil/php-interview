<?php


interface ObjectsInterface
{
    public function getHandleName();
}

class SomeObject implements ObjectsInterface
{
    protected string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getHandleName(): string
    {
        return "handle_{$this->name}";
    }
}

class SomeObjectsHandler
{
    public function __construct()
    {
    }

    public function handleObjects(array $objects): array
    {
        $handlers = [];
        foreach ($objects as $object) {
            $handlers[] = $object->getHandleName();
        }
        return $handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2'),
];

$soh = new SomeObjectsHandler();
$handlers = $soh->handleObjects($objects);