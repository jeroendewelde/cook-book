<h1>List of all Categories</h1>
<ul>
<?php
//$title = 'Ingredients';

foreach ($categories as $item) {
    //var_dump($item);
    ?>
        <li>
            <?=$item->name;?>
        </li>
    <?php
}
?>
</ul>
