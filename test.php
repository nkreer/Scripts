<?php

testFile("Fun/");
testFile("Utilities/");
testFile("Information/");
testFile("Weather/");
testFile("Media/");

function testFile($file){
	if(is_file($file)){
		echo "Testing ".$file."...\n";
		exec("php ".$file." a a Test Test");
	} elseif(is_dir($file)){
		foreach(scandir($file) as $object){
			testFile($file.$object);
		}
	}
}
