Urban Dictionary PHP API
====================

This is an un-official Urban Dictionary PHP API.

## Usage Example

```PHP
//initialize UrbanDictionary API
$urbanDic = new UrbanDictionary();

//get the first definition of a word
$urbanDic->lookupDefinition('Hacker');

//get the autocomplete suggestions for a partial word
$urbanDic->lookupAutocompletions('Ha');
```
