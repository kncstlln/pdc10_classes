<?php

namespace App;
use \PDO;

class classes_rosters
{
	protected $class_code;
    protected $student_number;
	protected $is_active;
	protected $timestamp;
	protected $connection;

    /*public function __construct($id,  )
	{
		$this->task = $task;
		$this->is_completed = $is_completed;
	}*/
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

	public function getStudentNumber()
	{
		return $this->student_number;
	}
    public function getEmail()
	{
		return $this->email;
	}
    public function getContact()
	{
		return $this->contacts;
    }
    public function getProgram()
	{
		return $this->program;
    }
    public function setConnection($connection)
	{
		$this->connection = $connection;
	}
    public function save()
	{
		try {
			$sql = "INSERT INTO students SET first_name=:first_name, last_name=:last_name, student_number=:student_number,email=:email";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':first_name' => $this->getFirstName(),
				':last_name' => $this->getLastName(),
                ':student_number' => $this->getStudentNumber(),
                ':email'=> $this->getEmail(),
                ':contact'=> $this->getContact(),
                ':program'=> $this->getProgram()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function update($first_name, $last_name, $description)
	{
		try {
			$sql = 'UPDATE classes SET name=?, code=?, description=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$name,
                $code,
                $description,
                $this->getID()

			]);
			$this->name = $name;
			$this->code = $code;
			$this->description = $description;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
        
	}
    public function delete()
	{
		try {
			$sql = 'DELETE FROM classes WHERE id=?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$this->getId()
			]);
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
}