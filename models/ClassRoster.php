<?php

namespace Models;
use \PDO;

class ClassRoster
{
	public $id;
	public $student_number;
	public $class_code;
	public $connection;

	public function __construct($student_number, $class_code)
    {
        $this->student_number = $student_number;
        $this->class_code = $class_code;
    }

    public function getId()
	{
		return $this->id;
	}

	public function getStudentNumber()
	{
		return $this->student_number;
	}

	public function getClassCode()
	{
		return $this->class_code;
	}

	public function getEnrolledAt()
	{
		return $this->enrolled_at;
	}

    public function setConnection($connection)
	{
		$this->connection = $connection;
	}

	
	public function displayClassRoster()
	{
		try {
			$sql = "SELECT classes.id, classes.name, classes.description, classes.code, teachers.first_name, teachers.last_name, (SELECT COUNT(student_number) FROM classes_rosters WHERE classes_rosters.class_code = classes.code) AS students_enrolled FROM classes INNER JOIN teachers on classes.teacher_id=teachers.employee_number";
			$data = $this->connection->query($sql)->fetchAll();
			return $data;

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function viewClass($class_code)
	{
		try {
			$sql = "SELECT * FROM classes_rosters INNER JOIN students on classes_rosters.student_number=students.student_number WHERE class_code=:class_code";
			$statement = $this->connection->prepare($sql);
			$statement->execute([
                ':class_code' => $class_code
            ]);

            return $statement->fetchAll();

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}


	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM classes_rosters WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->student_number = $row['student_number'];
			$this->class_code = $row['class_code'];
			$this->enrolled_at = $row['enrolled_at'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}

	}

    public function delete()
	{
		try {
			$sql = 'DELETE FROM classes_rosters WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			return $statement->execute([
				':class_code' => $this->getClassCode(),
                ':student_number' => $this->getStudentNumber(),
				':enrolled_at' => $this->getEnrolledAt(),
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
	public function addClassRoster(){
		try {

			$sql = "INSERT INTO classes_rosters SET student_number=:student_number, class_code=:class_code";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
                ':student_number' => $this->getStudentNumber(),
				':class_code' => $this->getClassCode()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
    }
}

