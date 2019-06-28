<?php

use App\Entity\User;
use App\Entity\Session;

use PHPUnit\Framework\TestCase;

class SessionTest extends TestCase
{
    protected $session;

    protected function setUp(): void
    {
        $this->mockedTeacher = $this->createMock(User::class);
        $this->session = new Session(new \DateTime("2019-01-13"), 'Mathématiques', $this->mockedTeacher);
    }

    public function testIsValid() {
        $this->assertTrue($this->session->isValid());
    }

    public function testIsInvalid() {
        $this->session->setTeacher(null);
        $this->assertTrue(!$this->session->isValid());
    }

    // public function testUserCanSubscribe() {
    //     // $this->assertEquals(true, $this->user->isValid());
    // }

    // public function testUserCantSubscribe() {

    // }

    // public function testHasNoTeacher() {

    // }

    // public function testAlreadyHasTeacher() {

    // }
}
