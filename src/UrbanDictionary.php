<?php
/* set error reporting to 1 or lower to avoid DOM warnings */
error_reporting(1);


class UrbanDictionary{
	function __Construct(){
	}
	function lookupAutocompletions($word){
		/* format word */
		$word = str_replace(' ', '+', $word);
		
		/* fetch autocompletions */
		$autocompletions = file_get_contents('http://api.urbandictionary.com/v0/autocomplete?term=' . $word . '&_=' . time());
		
		/* return results(autocompletions) */
		return $autocompletions;
	}
	function lookupDefinition($word){
		/* format word */
		$word = str_replace(' ','-',$word);

		/* load the page DOM */
		$dom = new DomDocument;
		$dom->loadHTML(file_get_contents('http://urbandictionary.com/define.php?term=' . $word));

		/* find all elements with "definition" class in the DOM using XPath */
		$finder = new DomXPath($dom);
		$className = 'definition';
		$definitionArray = $finder->query("//*[contains(@class, '$className')]");

		/* return the first definition */
		return $definitionArray->item(0)->nodeValue;
	}
	function lookupDefinitions(){
	}
}
?>
