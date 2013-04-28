<?php
class NATOAlphabetTranslator{
	function __Construct(){
		$this->normalAlphabet = 'abcdefghijklmnopqrstuvwxyz'; //alphabet positions
		$this->translationAlphabet = array('Alpha',
						   'Bravo',
						   'Charlie',
						   'Delta',
				        	   'Echo',
						   'Foxtrot',
        	                                   'Golf',
						   'Hotel',
						   'India',
						   'Juliet',
                                        	   'Kilo',
						   'Lima',
						   'Mike',
						   'November',
                        	                   'Oscar',
                                	           'Papa',
	                                           'Quebec',
        	                                   'Romeo',
                	                           'Sierra',
                        	                   'Tango',
                                	           'Uniform',
                                        	   'Victor',
	                                           'Whiskey',
					           'X-ray',
						   'Yankee',
                        	                   'Zulu'
						  ); //English to NATO Phonetic translation alphabet
	}
	function translateToICAO($phraseToTranslate){
		$phraseTranslated = strtolower($phraseToTranslate); //convert to lowercase
                $phraseTranslated = preg_replace('/[^a-z0-9. ]+/i', '', $phraseTranslated); //remove all non-letters,non-numbers and puncutation except spaces and periods
		$phraseTranslated = preg_replace("/(.)/i","\${1} ",$phraseTranslated); //add space between each word
		$phraseLength = strlen($phraseTranslated); //get initial phrase length
		for($i = 0; $i < $phraseLength; $i++){
			$currentCharacter = substr($phraseTranslated,$i,1); //get character to replace
			$translationIndex = strpos($this->normalAlphabet,$currentCharacter); //find current character's translation index
			if($translationIndex !== false){
				$phraseTranslated = substr_replace($phraseTranslated,$this->translationAlphabet[$translationIndex],$i,1); //replace character with translation
				$i += (strlen($this->translationAlphabet[$translationIndex])-1); //update counter(i) with new position according to change string length
				$phraseLength = strlen($phraseTranslated); //update phrase length
			}
		}
		$phraseTranslated = str_replace(' .','.',$phraseTranslated); //remove extra space preceding periods
		$phraseTranslated = str_replace(array(0,1,2,3,4,5,6,7,8,9),array('Zero','One','Two','Three','Four','Five','Six','Seven','Eight','Nine'),$phraseTranslated); //translate numbers
		return $phraseTranslated; // return translated phrase
	}
}
?>
