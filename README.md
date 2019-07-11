# November 2016 
Jumi, after some refurbishing, is still functional in joomla 3.6.x and 3.7dev.
Thanks to Mr Marhaj, the creator of this component, who wrote perennial code years ago.
I would not recommend it in production though. I use it to test bits of code.
If anyone is ready to help improve it, feel free and post on Issues.

jumi-3.0.5
==========

A jumi version with a new feature - based on jumi by http://2glux.com/projects/jumi

If you have issues with this version, post on Issues on github :
https://github.com/ghazal/jumi-3.0.5

## How it began
Simon Poghosyan did a wonderful job when he upgraded [Jumi](http://2glux.com/projects/jumi) to work better with joomla 2.5.x and joomla 3.x.

So, when Raygen and I met on [jumi forum](http://2glux.com/forum/jumi/), we decided to make it even better and we rewrote it a little to add a feature that existed in previous versions but was abandoned (explanation below).

## Regular use
1 - Open jumi component
2 - Create a new element
3 - Insert your code. It can be Joomla API based.

Example :
```php
<?php
$user = JFactory::getUser();
?>

<p><?php echo JText::_('Utilisateur enregistré le : '); ?><span><?php echo JHtml::_('date', $user->registerDate); ?></span></p>

<p><?php echo JText::_('Dernière visite le : '); ?><span><?php echo JHtml::_('date', $user->lastvisitDate); ?></span></p>
```
Write down the ID of the new item (here, 3) and insert this expression in an article :
``` 
{jumi *3}{/jumi}
```
This is a new feature. See below.

## New feature in component 
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

```
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

```
{jumi jumifolder/file.php}{/jumi}
```
where file.php is located in a folder named "jumifolder" placed at your joomla package root.

## Jumi module
To be used like a regular module.


###### Credits
[Simon Poghosyan](http://2glux.com/projects/jumi)

Raygen and ghazal
