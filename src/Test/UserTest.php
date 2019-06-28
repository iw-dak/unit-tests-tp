<?php

use App\Entity\User;
use App\Entity\Session;

use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected $user;
    protected $session;

    protected function setUp(): void
    {
        $this->user = new User("Sidiki", "DEMBELE", "sidiki@gmail.com", User::TYPE_ELEVE);
        $this->mockedTeacher = $this->createMock(User::class);

        $this->session = new Session(new \DateTime("2019-01-13"), 'Mathématiques', $this->mockedTeacher);
    }

    public function testCanSubscribeToSession()
    {
        $studentsNumberBefore = count($this->session->getStudents());
        $studentsNumberAfter = count($this->session->addStudent($this->user)->getStudents());

        $this->assertTrue($studentsNumberAfter == ($studentsNumberBefore + 1));
    }

    public function testCantSubscribeToSession()
    {
        for ($i = 0; $i < Session::MAX_STUDENT_NUMBER; $i++) {
            $this->session->addStudent(new User("Firstname " . $i, "Lastname" . $i, "sidiki" . $i . "@gmail.com", User::TYPE_ELEVE));
        }

        $this->session->addStudent($this->user);

        $this->assertTrue($this->session->getCountStudents() == Session::MAX_STUDENT_NUMBER);
    }

    public function testCanBeTeacher()
    {
        $this->user->setType(User::TYPE_FORMATEUR);
        $this->assertTrue($this->user->getType() == User::TYPE_FORMATEUR);
    }
}
