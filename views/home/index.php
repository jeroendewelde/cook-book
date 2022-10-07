<?php
    $heroText = 'Just Cook <br/>What <span class="green-text">YOU</span> Love <br/>To Eat';
    $heroSubText = 'You have no inspiration on what to cook?</br>Let us help you on that!';
    $primaryButtonText = 'Check our recipes';
    $secondaryButtonText = 'Become a cook';
    $primaryButtonUrl = '/recipe';
    $secondaryButtonUrl = '/cook/create';
    $imagePath = '/resources/images/hero/hero--home.png';
    $reverse = '';
?>
<?php include BASE_DIR . '/views/_templates/_partials/hero.php'; ?>

<div class="stroke grey-bg">
    <div class="h-layout">
        <h1>Popular Recipes</h1>
        
        <div class="grid--three">
        <?php
            $levels = [ '', '' , 'easy', '', 'normal', '' , 'medium', '', 'difficult'];
        
            foreach( $randomRecipes as $randomRecipe) {
                $cats = explode(',', $randomRecipe['categories']);
        ?>
            <div class="recipeCard">
                <a href="/recipe/detail/<?=$randomRecipe['id']?>" class="recipeCard__image">
                    <img src="/resources/images<?=$randomRecipe['image-url'] ?>" alt="">
                    <span class="recipeCard__level">
                        <?= $levels[$randomRecipe['level']] ?>
                    </span>
                </a>
                <div class="recipeCard__content">
                    <a href="/recipe/detail/<?= $randomRecipe['id'] ?>" class="recipeCard__title">
                        <?= $randomRecipe['title'] ?>
                    </a>
                    <p class="recipeCard__teaser">
                        <?= $randomRecipe['teaser-text'] ?>
                    </p>
    
                    <div class="recipeCard__bottom">
                        <ul>
                            <?php
                            foreach($cats as $cat) {
                                ?>
                                <li><?= $cat;?></li>
                            <?php   
                            }?>
                            
                        </ul>
                        <a href="/cook/detail/<?= $randomRecipe['cooks_id'] ?>" class="recipeCard__cook">
                            <img src="/resources<?= $randomRecipe['picture-url'] ?>" alt="">
                        </a>
    
                    </div>
            
                </div>
            </div>
        <?php
            }
        ?>
        </div>
        <a href="/recipe" class="link--arrow">
            <span>
                Check out <span class="green-text-hidden">all</span> the recipes
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
        </a>
    </div>
</div>
    
<div class="stroke">
    <?php
        $heroText = 'Meet <span class="green-text">Your</span> <br/>Sous-Chef';
        $heroSubText = 'Did you make our recipes and had something like…
        <br/>Damn! That was spot on?
        <br/>Take a look at our cooks and maybe become one yourself! Sharing your family-recipes or michelin worthy dishes.';
        $primaryButtonText = 'Check out our cooks';
        $secondaryButtonText = '';
        $primaryButtonUrl = '/cook';
        $secondaryButtonUrl = '';
        $imagePath = '/resources/images/hero/hero--sous-chef.png';
        $reverse = 'reverse';
    ?>
    <?php include BASE_DIR . '/views/_templates/_partials/hero.php'; ?>
</div>

<div class="stroke grey-bg">
    <div class="h-layout">
        <h1>Discover our ingredients</h1>
        <ul class="ingredientGrid">
        <?php
        foreach( $randomIngredients as $randomIngredient) {
        ?>
            <li class="ingredientGrid__item">
                <img src="/resources/images<?=$randomIngredient['image-url'];?>" alt="">
                <span><?=$randomIngredient['name'];?></span>
            </li>   
        <?php
            }
        ?>    
        </ul>
        <a href="/ingredient" class="link--arrow">
            <span>
                Check out <span class="green-text-hidden">all</span> the ingredients
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
        </a>
    </div>
</div>

<div class="stroke">
    <div class="h-layout">
        <h1>Step by step</h1>

        <div class="grid--three--small">
        <?php
            foreach( $randomSteps as $randomStep) {
        ?>
            <li class="recipeStep">
                <div class="recipeStep__image">
                    <img src="/resources/images<?=$randomStep['image-url'] ?>" alt="">
                </div>

                <div class="recipeStep__content">
                    <p class="recipeStep__content__title">
                        <?= $randomStep['step-number'] ?>. <?=$randomStep['title'] ?>
                    </p>
                    <p class="recipeStep__content__body">
                        <?= $randomStep['body'] ?>
                    </p>
                </div>
            </li>                    
        <?php
            }
        ?>
        </div>
        <a href="/recipe/detail/<?=$randomSteps[0]['recipes_id']?>" class="link--arrow">
            <span>
                Check out the <span class="green-text-hidden">full</span> recipe
            </span>
            <svg xmlns="http://www.w3.org/2000/svg" width="19" height="19" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><path d="m9 18 6-6-6-6"/></svg>
        </a>
    </div>
</div>
