[![Build Status](https://travis-ci.org/chilimatic/transformer-component.svg?branch=master)](https://travis-ci.org/chilimatic/transformer-component)
# transformer-component
Transformer Component for the chilimatic framework

A simple lib to encapsulate string transformations into 1 specific class that can be chained 

```php
php > require_once('vendor/autoload.php');
php > $transformer = new \chilimatic\lib\Transformer\String\UnderScoreToCamelCase();
php > echo $transformer('my_test');
myTest
```
The idea was original from the usual "url to method" problem. I didn't want the url to be something like "thisIsMyCamelCaseAction" because it's easier to misread than "this-is-my-camel-case-action" because of the whitespace characters but since im PSR compatible I switched to consistent camelcase.

for the other transformers please read the unit tests :) that's why i wrote them... If you find bugs just let me know.
