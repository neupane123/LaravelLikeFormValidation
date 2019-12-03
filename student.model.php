<?php
// require_once "validation.trait.php";
// echo __DIR__;
// __FILE__;
echo basename('abc');die;
Class Student {
		
		use Validation;

		public $id, $name, $email, $phone;
		public $errors;

		public function store()
		{
			$data = ['name'=>'abc.com','email'=>'abc@gmail.com'];
			
			$this->validate($data,[
				'name'	=>	'required|string|email'
			]);
		}
}

$obj = new Student;
$obj->store();

function __autoload($name)
{
	$name = strtolower($name); 
	$path = $name . '.class.php';
	require_once "$path";

}
print_r($obj->errors);