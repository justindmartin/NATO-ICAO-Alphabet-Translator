<?php
	require_once('../classes/NATOAlphabetTranslator.php');
	$NATOAlphabetTranslator = new NATOAlphabetTranslator();
	echo $NATOAlphabetTranslator->translateToICAO('My name is Justin. I am a developer.');
?>
