<?php

function dd($data=array(),$exit=1)
	{
		foreach ($data as $key => $value) {
			
			echo "<pre>";
			print_r($value);
			echo "</pre>";
		}

		if($exit==1){
			exit;
		}
	}

?>
