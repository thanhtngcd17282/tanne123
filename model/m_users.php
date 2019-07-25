<?php 
	function check_login($email,$password){
		$db= Database::getDB();
		$query="SELECT * FROM users WHERE email=? and password=?";
		try {
			$statement=$db->prepare($query);
			$statement->bindParam(1,$email);
			$statement->bindParam(2,$password);
			$statement->execute();
			$result=$statement->fetchAll();
			$statement->closeCursor();
			if (!empty($result)) {
				return true;
			}
			else{
				return false;
			}
		} catch (PDOException $e) {
			$error_message=$e->getMessage();
			echo "Error execute query statement:" .$error_message;			
		}
	}
	function get_user_by_email($email){
		$db= Database::getDB();
		$query="SELECT * FROM users
				WHERE email=?";
		try {
			$statement=$db->prepare($query);
			$statement->bindParam(1,$email);
			$statement->execute();
			$result=$statement->fetch();
			$statement->closeCursor();
			return $result;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message; 
		}
	}

	function add_user($email,$firstname,$lastname,$password){
		$db= Database::getDB();
		$query="INSERT INTO users(email,firstname,lastname,password)
				VALUES (?,?,?,?)";
		try {
			$statement=$db->prepare($query);
			$statement->bindParam(1,$email);
			$statement->bindParam(2,$firstname);
			$statement->bindParam(3,$lastname);
			$statement->bindParam(4,$password);
			$statement->execute();
			$statement->closeCursor();
			return true;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Error execute query statement:".$error_message;
			return false;
		}
	}
?>