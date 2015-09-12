Hi all, I am going to clean this version of Jumi of all Joomla 2.5 leftovers.
My goal is to test and modify (if necessary) on a Joomla 3.5 version.
Let's get a beautylift for Jumi !
If anyone is ready to help, feel free and post on Issues.

jumi-3.0.5
==========

A jumi version with a new feature - based on jumi by http://2glux.com/projects/jumi

If you have issues with this version, post on Issues on github :
https://github.com/ghazal/jumi-3.0.5

## How it began
Simon Poghosyan did a wonderful job when he upgraded [Jumi](http://2glux.com/projects/jumi) to work better with joomla 2.5.x and joomla 3.x.

So, when Raygen and I met on [jumi forum](http://2glux.com/forum/jumi/), we decided to make it even better and we rewrote it a little to add a feature that existed in previous versions but was abandonned (explanation below).

## New feature in component : usage
1 - When using jumi component, we create a new element, write down its ID and insert this expression in an article.

If element has an ID 3 :

Current expression
``` 
{jumi [*3]}
```
New expression :

``` 
{jumi *3}{/jumi}
```
It is possible to use both, but NOT TOGETHER in the same article.

## New feature in article : usage

1 - We can write PHP within the new expression  :

```php
{jumi}
<?php
$myVariable = 'John';
echo 'Hello, '. $myVariable .'.';
{/jumi}
```


2 - Jumi has been designed from the beginning to work with Joomla API.

```html
{jumi}
<p><a href="index.php/using-joomla/getting-help">Getting help</a></p>
{/jumi}
```


Or, getting the menu ID and applying it to a tag ID CSS selector

```php
{jumi}
<?php 
$menuid = JFactory::getApplication()->getMenu()->getActive()->id;

<p id="idmenu-<?php echo $menuid; ?>">Test menu ID<p>
{/jumi}
```

3 - We can add a php file in an article as well :

```html
{jumi jumifolder/file.php}{/jumi}
```
where file.php is located in a folder named "jumifolder" placed at your joomla package root.

## Jumi module
To be used like a regular module.
Taking advantage of its ability to "crunch" Joomla API, it can be used to send a JS file to head tag when one wants to implement a CSS/JS files combination in one article only.

In Code Written :
```php
<?php 
$document = JFactory::getDocument();
$document->addStyleSheet(JURI::base(true).'/js/test.css');
$document->addScript(JURI::base(true).'/js/test.js');
```
-   Publish everywhere
-   Choose a specific position : jumi1 for example
-   In article : {loadposition jumi1}

>For joomla developpers

One drawback to this JS stuff is that, in Joomla 3.x, it sends the JS file below Mootools and above jQuery.
So, if jQuery is your thing, add :

```php
JHtml::_('bootstrap.framework');
```
in mod_jumi.php

###### Credits
[Simon Poghosyan](http://2glux.com/projects/jumi)

Raygen and ghazal
