

<?php
	include_once("connection.php");

Class Country{

	function __construct(){

		$this->connection = new Database();

	}


	function get_countries(){

		$query = "SELECT * from country";

		$countries = $this->connection->fetch_all($query);

		return $countries;
	}

	function display_country($country_name){

		$query ="SELECT * FROM country where Name = '{$country_name}'";
		
		$country_info = $this->connection->fetch_record($query);

		return $country_info;

		// header(index.php);
	}

}

Class Process{

	function __construct(){



		$this->connection = new Database();
		//create a new Country object

		//use Object to run display_country function
		// i.e. ->display_country($_POST[])

		if (isset($_POST['country_name'])){
		

		$countries = new Country();	

		$country_info = $countries -> display_country($_POST['country_name']);
		var_dump($country_info);

		// var_dump($country_info);

		$data['country_info'] = $country_info;

		echo json_encode($data);

		}

	}


}

$process = new Process();

//make a new process object


?>