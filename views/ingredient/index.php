<div class="h-layout">
    <h1>List of all <span class="green-text">ingredients</span></h1>
    <ul class="ingredientGrid">
    <?php
    foreach ($ingredients as $item) {
    ?>
        <li class="ingredientGrid__item">
            <img src="/resources/images<?=$item->{'image-url'} ?? ''?>" alt="">
            <span><?=$item->name;?></span>
        </li>
    <?php
    }
    ?>
    </ul>
</div>
