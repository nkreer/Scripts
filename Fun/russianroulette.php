<?php

// This script DOES NOT simulate a real revolver.

if(rand(1, 6) === 6){
	die("You're being shot.");
} else {
	die("This chamber is empty.");
}