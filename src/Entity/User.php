<?php

namespace App\Entity;

class User
{

    const TYPE_ELEVE = 'ELEVE';
    const TYPE_FORMATEUR = 'FORMATEUR';

    private $firstname;

    private $lastname;

    private $email;

    private $type;

    public function __construct(string $firstname, string $lastname, string $email, string $type)
    {
        $this->setFirstname($firstname);
        $this->setLastname($lastname);
        $this->setEmail($email);
        $this->setType($type);
    }


    /**
     * Get the value of firstname
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set the value of firstname
     *
     * @return  self
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;

        return $this;
    }

    /**
     * Get the value of lastname
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     *
     * @return  self
     */
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    public function isTeacher()
    {
        return $this->type == self::TYPE_FORMATEUR;
    }

    public function isStudent()
    {
        return $this->type == self::TYPE_ELEVE;
    }
}
