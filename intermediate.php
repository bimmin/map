<?php

class Animal{
	var $name;
	var $health;

	function __construct($name) {
		$this -> health = 100;
		$this -> name = $name;
	}


	function walk(){

		$this-> health = $this->health -1;

	}

	function run(){

		$this-> health = $this->health -5;

	}

	function display_health(){

		if ($this instanceof Dragon){
			echo $this->name . " is a dragon and has a health of: " . $this->health . "<br>";
		}
		else{
		echo $this->name . " has a health of: " . $this->health . "<br>";
		}

	}

}

class Dog extends Animal{

	function __construct($name) {
		$this -> health = 150;
		$this -> name = $name;
	
	}

	function pet(){
		$this-> health = $this->health +5;
	}

	function fly(){
		$this -> health = $this -> health - 10;
	}

}

class Dragon extends Animal{

	function __construct($name) {
		$this -> health = 170;
		$this -> name = $name;
	
	}

}

$animal = new Animal($name="animal");
$animal ->walk();
$animal ->walk();
$animal ->walk();
$animal ->run();
$animal ->run();
$animal ->display_health();

$dog = new Dog($name="Fluffy");
$dog ->walk();
$dog ->walk();
$dog ->walk();
$dog ->run();
$dog ->run();
$dog ->pet();
$dog ->display_health();

$dragon = new Dragon($name="Falkor");
$dragon -> walk();
$dragon -> walk();
$dragon -> walk();
$dragon -> run();
$dragon -> run();
$dragon -> display_health();



?>