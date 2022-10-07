<?php
    $levels = [ '', '' , 'easy', '', 'normal', '' , 'medium', '', 'difficult'];
?>

<div class="h-layout h-layout--card">
    <div class="recipeDetail__header">
        <div class="recipeDetail__header__image">
            <img src="/resources/images<?= $recipes->{'image-url'} ?>"/>

            <span class="recipeDetail__header__image__level">
                <?= $levels[$recipes->level] ?>
            </span>
        </div>
    
        <h1><?= $recipes->title ?></h1>
        <ul>
            <?php
            foreach($recipeCategories as $cat) {?>
            <li>
                <?= $cat['name'] ?>
            </li>   
            <?php
                }
            ?>
        </ul>

        <p class="recipeDetail__header__teaser">
            <?= $recipes->{'teaser-text'} ?>
        </p>
        
        <div class="recipeDetail__header__cook">
            <div class="recipeDetail__header__cook__image">
                <img src="/resources<?=$recipeTest->{'picture-url'} ?>" alt="">
            </div>

            <div class="recipeDetail__header__cook__content">
                <p>
                    Recipe by <span class="green-text"><?=$recipeTest->firstname?></span>
                </p>
    
                <q>
                    <?=$recipeTest->quote?>
                </q>
            </div>
        </div>
    </div>

    <div class="recipeDetail__ingredients">
        <h2>
            Ingredients
            <span>for <?= $recipes->{'amount-of-people'} ?> people</span>
        </h2>
        
        <ul class="ingredientGrid">

        <?php
            foreach ($ingredients as $item) {

            if($item['conversion_name'] !== 'none') {
                $conversionType = $item['conversion_name'];
            } else {
                $conversionType = '';
            }
        ?>

            <li class="ingredientGrid__item">
                <img src="/resources/images<?=$item['image-url']?>" alt="">
                <span class="bold-text"><?=$item['quantity']?> <?= $conversionType  ?> </span>
                <span><?=$item['name'];?></span>
                <span><?= $item['conversion_name'] ?></span>
            </li>
        <?php
            }
        ?>
        </ul>
    </div>

    <div class="recipeDetail__steps">
        <h2>Step by step</h2>
        
        <div class="grid--three--small">

            <?php
            foreach( $recipes->getSteps() as $step) {
                include BASE_DIR . '/views/_templates/_partials/recipeStep.php';
            }
            ?>
        </div>
    </div>
</div>