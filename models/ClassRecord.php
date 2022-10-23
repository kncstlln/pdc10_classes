<?php

namespace Models;
use \PDO;

class ClassRecord
{
	public $id;
	public $name;
	public $code;
	public $description;
	public $teacher_id;
	public $connection;

	public function __construct($name, $code, $description, $teacher_id)
    {
        $this->name = $name;
        $this->code = $code;
		$this->description = $description;
		$this->teacher_id = $teacher_id;

    }
    public function getId()
	{
		return $this->id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function getCode()
	{
		return $this->code;
	}

	public function getDescription()
	{
		return $this->description;
	}
	
	public function getTeacherId()
	{
		return $this->teacher_id;
	}

    public function setConnection($connection)
	{
		$this->connection = $connection;
	}
    public function addClass()
	{
		try {
			$sql = "INSERT INTO classes SET name=:name, code=:code, description=:description, teacher_id=:employee_number";
			$statement = $this->connection->prepare($sql);

			return $statement->execute([
				':name' => $this->getName(),
				':code' => $this->getCode(),
                ':description' => $this->getDescription(),
				':employee_number' => $this->getTeacherId()
			]);

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
	public function getById($id)
	{
		try {
			$sql = 'SELECT * FROM classes WHERE id=:id';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				':id' => $id
			]);

			$row = $statement->fetch();

			$this->id = $row['id'];
			$this->name = $row['name'];
			$this->code = $row['code'];
			$this->description = $row['description'];
			$this->teacher_id = $row['teacher_id'];

		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
    public function updateClass($name, $code, $description, $teacher_id)
	{
		try {
			$sql = 'UPDATE classes SET name=?, code=?, description=?, teacher_id=? WHERE id = ?';
			$statement = $this->connection->prepare($sql);
			$statement->execute([
				$name,
                $code,
                $description,
                $this->getID()

			]);


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
	public function getAll()
	{
		try {
			$sql = 'SELECT classes.id, classes.name, classes.code, classes.description, teachers.first_name, teachers.last_name FROM classes JOIN teachers on classes.teacher_id=teachers.employee_number';
			$data = $this->connection->query($sql)->fetchAll();
			return $data;
		} catch (Exception $e) {
			error_log($e->getMessage());
		}
	}
	public function displayClassRoster($id){
        try {
            $sql = "SELECT classes.id, classes.code FROM classes WHERE id=:id";
            $statement = $this->connection->prepare($sql);
            $statement->execute([
                ':id' => $id
            ]);
            return $statement->fetch();
        } catch (Exception $e) {
            error_log($e->getMessage());
        }
    }
	
}

