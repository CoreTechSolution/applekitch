<?php
if(isset($_POST['replace_btn'])){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "applekitch";
	//$find = array('http://localhost/applekitch');
	//$replace = array('http://localhost/coregen/applekitch');
	
	$find = array($_POST['find_text']);
	$replace = array($_POST['replace_text']);

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	} 

	$sql = "SELECT question_id, form_data FROM questions";
	$result = $conn->query($sql);

	$question_ids_array = array();

	if ($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$serialized_status = is_serialized($row["form_data"]);
			if($serialized_status){
				//echo "question_id: " . $row["question_id"]. " - form_data: " . $row["form_data"]. "<br><br>";
				$unserialize_data = unserialize($row["form_data"]);
				$str_replace_data = str_replace($find,$replace,$unserialize_data);
				$final_serialized_data = serialize($str_replace_data);
				$sql = "UPDATE questions SET form_data='".$final_serialized_data."' WHERE question_id=".$row['question_id'];
				$conn->query($sql);
			} else {
				$serialized_string = $row["form_data"];
				$new_serialized_string = serialize_corrector($serialized_string);
				$unserialize_data = unserialize($new_serialized_string);
				$str_replace_data = str_replace($find,$replace,$unserialize_data);
				$final_serialized_data = serialize($str_replace_data);
				$sql = "UPDATE questions SET form_data='".$final_serialized_data."' WHERE question_id=".$row['question_id'];
				$conn->query($sql);
			}
		}
	}

	$conn->close();
}

function is_serialized($value, &$result = null){
	// Bit of a give away this one
	if (!is_string($value))
	{
		return false;
	}
	// Serialized false, return true. unserialize() returns false on an
	// invalid string or it could return false if the string is serialized
	// false, eliminate that possibility.
	if ($value === 'b:0;')
	{
		$result = false;
		return true;
	}
	$length	= strlen($value);
	$end	= '';
	switch ($value[0])
	{
		case 's':
			if ($value[$length - 2] !== '"')
			{
				return false;
			}
		case 'b':
		case 'i':
		case 'd':
			// This looks odd but it is quicker than isset()ing
			$end .= ';';
		case 'a':
		case 'O':
			$end .= '}';
			if ($value[1] !== ':')
			{
				return false;
			}
			switch ($value[2])
			{
				case 0:
				case 1:
				case 2:
				case 3:
				case 4:
				case 5:
				case 6:
				case 7:
				case 8:
				case 9:
				break;
				default:
					return false;
			}
		case 'N':
			$end .= ';';
			if ($value[$length - 1] !== $end[0])
			{
				return false;
			}
		break;
		default:
			return false;
	}
	if (($result = @unserialize($value)) === false)
	{
		$result = null;
		return false;
	}
	return true;
}

function serialize_corrector($serialized_string){
    // at first, check if "fixing" is really needed at all. After that, security checkup.
    if ( @unserialize($serialized_string) !== true &&  preg_match('/^[aOs]:/', $serialized_string) ) {
         $serialized_string = preg_replace_callback( '/s\:(\d+)\:\"(.*?)\";/s',    function($matches){return 's:'.strlen($matches[2]).':"'.$matches[2].'";'; },   $serialized_string );
    }
    return $serialized_string;
} 

?>
<form method="post" action="">
	<label>Find</label>
	<input type="text" name="find_text">
	<br>
	<label>Replace</label>
	<input type="text" name="replace_text">
	<br>
	<input type="submit" name="replace_btn" value="Replace">
</form>