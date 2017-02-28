<?php
class Txt_to_db{
	function create_file($txt_name){
		 if(!strpos(' '.$txt_name,".txt")){
		 $txt_insert = $txt_name.'.txt';
		 touch($txt_insert);
		}else{
		 $txt_insert = $txt_name;
		 touch($txt_insert);
		}
		if (!file_exists($txt_insert))
		{
		echo "We cannot create database. Fix your file permission and make them 777 for instant. After opening txt file you can fix again!";
		die();
		}else{
		chmod($txt_insert,0666); 
		return $txt_insert;
		}
	}
	function insert_data($txt_name,$data,$unique){
		$data_encode = base64_encode($data);
		$txt_name_insert = $this->create_file($txt_name);
		if($unique=="0"){
		
		$open_db = fopen($txt_name_insert,"a");
		fwrite($open_db,$data_encode."\r\n");
		}else{
			
			if(($this->select_data($txt_name_insert,$data_encode,""))==FALSE){
		$open_db = fopen($txt_name_insert,"a");
		fwrite($open_db,$data_encode."\r\n");	
			
		}}
		
	}
	function select_data($txt_name,$data,$howmuch)
	{
		 if(!strpos(' '.$txt_name,".txt")){
		 $txt_insert = $txt_name.'.txt';
		}else{
		 $txt_insert = $txt_name;
		}
		$open_db = file($txt_insert);
		$data_encode = base64_encode($data);
		if($howmuch=="0"){

		for($x=0;$x<count($open_db);$x++){
			if(strpos(' '.$open_db[$x],$data_encode)){
				return $open_db[$x];
			}else{
				return false;
			}
		}
		}else{
			for($x=(count($open_db)-1);$x>(count($open_db)-1-$howmuch);$x--){
				$save[] = $open_db[$x];
			
				//IT'S GIVE YOU ARRAY !!
				
			}
			return $save;
				
			
			
		}
		
	}
	
	
	
}	
	
	
	$insert = new Txt_to_db;
	$data_gir = "Insert DATA";
	$data_bul = "Select DATA";
	$insert->insert_data("db",$data_gir,1);
	$insert->select_data("db",$data_gir,5);

	
	
	
	
	
	
	
	
	
	
	
