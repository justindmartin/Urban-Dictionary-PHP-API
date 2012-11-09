<?php
/* Set error reporting to 1 or lower to avoid DOM warnings */
error_reporting(1);


class ub{
	function __Construct(){
	}
	function lookupDefinition($word){
		/* Format Word */
		$word = str_replace(' ','-',$word);

		/* Load the Page DOM */
		$dom = new DomDocument;
		$dom->loadHTML(file_get_contents('http://urbandictionary.com/define.php?term=' . $word));

		/* Find all elements with "definition" class in the DOM using XPath */
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
