jumi-3.0.5
==========

a jumi version with a new feature - based on jumi by http://2glux.com/projects/jumi
## How it began
Simon Poghosyan did a wonderful job at when he upgraded [Jumi](http://2glux.com/projects/jumi) to work better with joomla 2.5.x and joomla 3.x.

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

2 - We can also write PHP within the new expression  :

>\{jumi\}
`` <?php
$myVariable = 'John';
echo 'Hello, '. $myVariable .'.';
?>``
\{/jumi\}


3 - Jumi has been designed from the beginning to work with Joomla API.

>\{jumi\}`` <p><a href="index.php/using-joomla/getting-help">Getting help</a></p>
``
\{/jumi\}

or
>\{jumi\}
`` <?php 
$menuid = JFactory::getApplication()->getMenu()->getActive()->id;
?>
<p id="idmenu-<?php echo $menuid; ?>">Test menu ID<p>``
\{/jumi\}