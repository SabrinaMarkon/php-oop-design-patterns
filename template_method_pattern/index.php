<?php
/**
 * Simple example of PHP Template Method Design Pattern:
 * A sign we might use this pattern is that we would otherwise
 * be copying and pasting a lot of the same code for each class:
 * When we are worried about CODE DUPLICATION.
 * Put the code that would be duplicated to an ABSTRACT CLASS, then
 * just put specific differences in subclasses.
 */

function autoloader($class) {
	require "src/" . $class . ".php";
}
spl_autoload_register("autoloader");

$orderedturkeysub = new TurkeySub();
$orderedturkeysub->make();

echo "<br><br>";

$orderedveggiesub = new VeggieSub();
$orderedveggiesub->make();

echo "<br><br>";

$orderedhameandcheesesub = new HamAndCheeseSub();
$orderedhameandcheesesub->make();