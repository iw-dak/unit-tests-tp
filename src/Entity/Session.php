<?php

namespace App\Entity;

class Session
{

    const MAX_STUDENT_NUMBER = 20;
    const MIN_VALID_STUDENT_NUMBER = 10;

    private $date;

    private $formation;

    private $teacher;

    private $students = [];

    private $classroom;

    public function __construct(\DateTime $date, string $formation, User $teacher, Classroom $classroom)
    {
        $this->setDate($date);
        $this->setFormation($formation);
        $this->setTeacher($teacher);
        $this->setClassroom($teacher);
    }

    /**
     * Get the value of date
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of formation
     */
    public function getFormation()
    {
        return $this->formation;
    }

    /**
     * Set the value of formation
     *
     * @return  self
     */
    public function setFormation($formation)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get the value of teacher
     */
    public function getTeacher()
    {
        return $this->teacher;
    }

    /**
     * Set the value of teacher
     *
     * @return  self
     */
    public function setTeacher($teacher)
    {
        if ($teacher->isTeacher()) {
            $this->teacher = $teacher;
        } else {
            $this->teacher = null;
        }

        return $this;
    }

    /**
     * Get the value of students
     */
    public function getStudents()
    {
        return $this->students;
    }

    /**
     * Set the value of students
     *
     * @return  self
     */
    public function setStudents($students)
    {
        $this->students = $students;

        return $this;
    }

    public function addStudent(User $student): self
    {
        if (
            $this->getCountStudents() < self::MAX_STUDENT_NUMBER &&
            !in_array($student, $this->getStudents(), true)
        ) {
            $this->students[] = $student;
        }

        return $this;
    }

    public function removeStudent(User $student): self
    {
        if ($this->students->contains($student)) {
            $this->students->removeElement($student);
        }

        return $this;
    }

    /**
     * Get the value of classroom
     */
    public function getClassroom()
    {
        return $this->classroom;
    }

    /**
     * Set the value of classroom
     *
     * @return  self
     */
    public function setClassroom($classroom)
    {
        $this->classroom = $classroom;

        return $this;
    }

    public function getCountStudents()
    {
        return count($this->getStudents());
    }

    public function isValid()
    {
        return $this->getCountStudents() >= self::MIN_VALID_STUDENT_NUMBER &&
            !is_null($this->getTeacher()) &&
            is_a($this->getDate(), 'DateTime') &&
            !is_null($this->getClassroom());
    }
}
