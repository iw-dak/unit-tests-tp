<?php

namespace App\Entity;

class Classroom
{
    private $name;

    public function __construct(string $name)
    {
        $this->setName($name);
    }

    /**
     * Get the value of name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
