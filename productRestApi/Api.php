<?php
//Api.php


class API
{
	private $connect = '';

	function __construct()
	{
		$this->database_connection();
	}


	function database_connection()
	{
		include_once '../databaseConfig/credentials.php';
		$this->connect = new PDO("mysql:host=" . $host . ";dbname=" . $dbname, $username, $password);
	}

	function fetch_all()
	{
		$query = "SELECT * FROM orders ORDER BY id";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			while($row = $statement->fetch(PDO::FETCH_ASSOC))
			{
				$data[] = $row;
			}
			return $data;
		}
	}

	function insert()
	{
		if(isset($_POST["name"]))
		{
			$form_data = array(
				':name'		=>	$_POST["name"],
				'phoneNumber'		=>	$_POST['phoneNumber'],
				'emailID'		=>	$_POST['emailID'],
				':item'		=>	$_POST["item"],
				':price'		=>	$_POST["price"]
			);
			$query = "
			INSERT INTO orders 
			(name, phoneNumber, emailID, item, price) VALUES 
			(:name, :phoneNumber, :emailID, :item, :price)
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}

	function fetch_single($id)
	{
		$query = "SELECT * FROM orders WHERE id='".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			foreach($statement->fetchAll() as $row)
			{
				$data['name'] = $row['name'];
				$data['phoneNumber'] = $row['phoneNumber'];
				$data['emailID'] = $row['emailID'];
				$data['item'] = $row['item'];
				$data['price'] = $row['price'];
			}
			return $data;
		}
	}

	function update()
	{
		if(isset($_POST["name"]))
		{
			$form_data = array(
				':name'	=>	$_POST['name'],
				':phoneNumber'	=>	$_POST['phoneNumber'],
				':emailID'	=>	$_POST['emailID'],
				':item'	=>	$_POST['item'],
				':price' =>	$_POST['price'],
				':id'			=>	$_POST['id']
			);
			$query = "
			UPDATE orders 
			SET name = :name, phoneNumber = :phoneNumber, emailID = :emailID, item = :item, price = :price 
			WHERE id = :id
			";
			$statement = $this->connect->prepare($query);
			if($statement->execute($form_data))
			{
				$data[] = array(
					'success'	=>	'1'
				);
			}
			else
			{
				$data[] = array(
					'success'	=>	'0'
				);
			}
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
	function delete($id)
	{
		$query = "DELETE FROM orders WHERE id = '".$id."'";
		$statement = $this->connect->prepare($query);
		if($statement->execute())
		{
			$data[] = array(
				'success'	=>	'1'
			);
		}
		else
		{
			$data[] = array(
				'success'	=>	'0'
			);
		}
		return $data;
	}
}

?>