<?php

use App\Entity\User;
use App\Entity\Session;

use PHPUnit\Framework\TestCase;
use App\Entity\Classroom;

class SessionTest extends TestCase
{
    protected $session;
    protected $teacher;

    protected function setUp(): void
    {
        $this->teacher = new User("Sidiki", "DEMBELE", "sidiki@gmail.com", User::TYPE_FORMATEUR);
        $this->session = new Session(new \DateTime("2019-01-13"), 'Mathématiques', $this->teacher, new Classroom('A04'));
    }

    public function testIsValid()
    {
        for ($i = 0; $i < Session::MIN_VALID_STUDENT_NUMBER; $i++) {
            $this->session->addStudent(new User("Firstname " . $i, "Lastname" . $i, "user" . $i . "@gmail.com", User::TYPE_ELEVE));
        }

        $this->assertTrue($this->session->isValid());
    }

    public function testIsInvalid()
    {
        $this->session->setTeacher(null);
        $this->assertTrue(!$this->session->isValid());
    }

    // public function testUserCanSubscribe()
    // {

    // }

    // public function testUserCantSubscribe() {

    // }

    // public function testHasNoTeacher() {

    // }

    // public function testAlreadyHasTeacher() {

    // }
}
