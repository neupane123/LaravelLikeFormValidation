<?php

Trait Validation 
{
	

	public function validate($data, $rules)
	{
		// print_r($data);die;

		foreach($rules as $k=>$rule)
		{
			if(array_key_exists($k, $data))
			{
				$r = explode('|', $rule);

				foreach($r as $rat)
				{
					if( method_exists($this, $rat) ) {

						$this->$rat($k,$data[$k]);
						// continue;
					} 
				}

			}
		}
	}

	public function required($var, $val)
	{	
		if( empty($val) ) {

			$this->errors[$var][]="$var is required";
		}
	}

	public function string($var, $val)
	{
		if( is_string($val) ) {
			$this->errors[$var][] = "$var is not string";
		}
	}

	public function email($var, $val)
	{
		if(!filter_var($val, FILTER_VALIDATE_EMAIL))
		{
			$this->errors[$var][] = "$var is not a valid email";
		}
	}
}


?>