<?php

namespace Models;
use \PDO;

class Student
{
	public $id;
    public $first_name;
    public $last_name;
    public $email;
	public $student_number;
    public $contact;
    public $program;
   

    public function __construct($first_name, $last_name, $email, $student_number, $contact, $program)
    {
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->email = $email;
		$this->student_number = $student_number;
		$this->contact = $contact;
		$this->program = $program;
    }
    public function getId()
	{
		return $this->id;
	}

	public function getFirstName()
	{
		return $this->first_name;
	}

	public function getLastName()
	{
		return $this->last_name;
	}

	public function getEmail()
	{
		return $this->email;
	}
    public function getStudentNumber()
	{
		return $this->student_number;
	}
    public function getContact()
	{
		return $this->contact;
    }
    public function getProgram()
	{
		return $this->program;
    }
    public function setConnection($connection)
	{
		$this->connection = $connection;
	}
    public function addStudent()
	{
		try {
			$sql = "INSERT INTO students SET first_name=:first_name, last_name=:last_name, email=:email, student_number=:student_number, contact=:contact, program=:program";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':first_name' => $this->getFirstName(),
				':last_name' => $this->getLastName(),
                ':email'=> $this->getEmail(),
				':student_number' => $this->getStudentNumber(),
                ':contact'=> $this->getContact(),
                ':program'=> $this->getProgram()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM students WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->first_name = $row['first_name'];
			$this->last_name = $row['last_name'];
			$this->email = $row['email'];
			$this->student_number= $row['student_number'];
			$this->contact = $row['contact'];
			$this->program = $row['program'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function updateStudent($first_name, $last_name, $email, $student_number, $contact, $program)
	{
		try {
			$sql = 'UPDATE students SET first_name=?, last_name=?, email=? , student_number=?, contact=?, program=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$first_name,
                $last_name,
				$email,
				$student_number,
				$contact,
				$program,
                $this->getID()

			]);
			
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}
    public function delete()
	{
		try {
			$sql = 'DELETE FROM students WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}

	public function getAll()
	{
		try {
			$sql = 'SELECT * FROM students';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
	public function viewClass($id)
{
        try {
            $sql = "SELECT * FROM students INNER JOIN classes_rosters ON students.student_number=classes_rosters.student_number INNER JOIN classes ON classes_rosters.class_code=classes.code WHERE students.id=:id";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':id' => $id
            ]);
            return $statement->fetchAll();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }

}
