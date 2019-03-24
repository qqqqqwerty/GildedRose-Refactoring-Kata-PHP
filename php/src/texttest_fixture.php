<?php

require_once 'gilded_rose.php';

echo "OMGHAI!\n";

$items = array(
    new Item('+5 Dexterity Vest', 10, 20),
    new Item('Aged Brie', 2, 0),
    new Item('Elixir of the Mongoose', 5, 7),
    new Item('Sulfuras, Hand of Ragnaros', 0, 80),
    new Item('Sulfuras, Hand of Ragnaros', -1, 80),
    new Item('Backstage passes to a TAFKAL80ETC concert', 15, 20),
    new Item('Backstage passes to a TAFKAL80ETC concert', 10, 49),
    new Item('Backstage passes to a TAFKAL80ETC concert', 5, 49)
);

$days = 2;
if (count($argv) > 1) {
    $days = (int) $argv[1];
}

$with_conjured = true;
if (count($argv) > 2) {
    $with_conjured = (bool) $argv[2];
}

if ($with_conjured) {
    // this conjured item does not work properly yet
    array_push($items, new Item('Conjured Mana Cake', 3, 6));
}

$app = new GildedRose($items);

for ($i = 0; $i <= $days; $i++) {
    echo("-------- day $i --------\n");
    echo("name, sellIn, quality\n");
    foreach ($items as $item) {
        echo $item . PHP_EOL;
    }
    echo PHP_EOL;
    $app->update_quality();
}
