<?php
include __DIR__."/../connect.php";
class member
{
	public function checkPassword( $id, $pw )
	{
		$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		if (mysqli_connect_errno()) {
    		throw Exception ("Connect failed: %s\n", mysqli_connect_error());
    		exit();
    	}
    	$query = "SELECT pass FROM tz_members WHERE id=".$id;
    	$result = $mysqli->query($query);
    	$row = $result->fetch_assoc();
    	if( $row['pass'] == md5($pw)){
			return true;
		}else{
			//echo $pw;
			return false;
		}
	}

	public function updatePassword( $id, $pw)
	{
		$mysqli = new mysqli( DB_HOST, DB_USER, DB_PASS, DB_NAME );
		if (mysqli_connect_errno()) {
    		throw Exception ("Connect failed: %s\n", mysqli_connect_error());
    		exit();
    	}
    	$pw = md5( $pw );
    	$query = "UPDATE tz_members SET pass=\"".$pw."\" WHERE id=\"".$id."\"";
    	$result = $mysqli->query( $query);
    	
    	if( $result){
			return true;
		}else{
			$this->error = $mysqli->errno.$mysqli->error;
			return false;
		}
	}

	public function getError()
	{
		return $this->error;
	}
}