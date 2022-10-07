<?php
    $levels = [ '', '' , 'beginner', '', 'intermediate', '' , 'advanced', '', 'expert'];    
?>
<div class="h-layout">
    <h1>Overview of all <span class="green-text">recipes</span> </h1>

    <form class="form--search">
        <div class="content">
            <input value="" name="search_string" placeholder="Seach a recipe" value="<?php
                if (isset($_GET['search_string'])) {
                    echo $_GET['search_string'];
                }
            ?>">
            <button type="submit" name="search">Search</button>
        </div>
    </form>

    <h2 class="alter-title alter-title--h2">
        <?php
            if (isset($_GET['search_string'])) {
                echo '<span class="green-text">' . count($recipes) . '</span>' . ' Search results for <span class="green-text">&quot' . $_GET['search_string'] . '&quot</span>';
            }
        ?>
    </h2>

    <div class="grid--three">
    <?php
    foreach ($recipes as $recipe) {
        // $cats = explode(',', $recipe->categories);    
        $cats = $recipe->getCategoriesForRecipeByid($recipe->id);
    ?>
        <div class="recipeCard">
            <a href="/recipe/detail/<?=$recipe->id?>" class="recipeCard__image">
                <img src="/resources/images<?=$recipe->{'image-url'} ?>" alt="">
                <span class="recipeCard__level">
                    <?= $levels[$recipe->level] ?>
                </span>
            </a>
            <div class="recipeCard__content">
                <a href="/recipe/detail/<?= $recipe->id ?>" class="recipeCard__title">
                    <?= $recipe->title ?>
                </a>
                <p class="recipeCard__teaser">
                    <?= $recipe->{'teaser-text'} ?>
                </p>
                  
                <div class="recipeCard__bottom">
                    <ul>
                        <?php
                        foreach($cats as $cat) {
                        ?>
                        <li>
                            <?= $cat['name'];?>
                        </li>
                        <?php   
                        }
                        ?>
                    </ul>
                    <?php
                        $cook = $recipe->getCookById();
                    ?>
                    <a href="/cook/detail/<?= $cook->id ?>" class="recipeCard__cook">
                        <img src="/resources<?= $cook->{'picture-url'} ?>" alt="">
                    </a>
        
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    <div class="recipeCard">

        <a href="/recipe/create" class="recipeCard__image recipeCard__image--create">                
            <span>New recipe</span>
        </a>
        <div class="recipeCard__content">
            <a href="/recipe/create" class="recipeCard__title">
                Add a new recipe
            </a>
            <p class="recipeCard__teaser">
                Tell us more about how you created this recipe and share it with the world!
            </p>        
            <div class="recipeCard__bottom">        
                <a class="recipeCard__cook">
                    <img src="/resources/images/cooks/placeholder.jpeg" alt="">
                </a>
            </div>        
        </div>
    </div>
</div>
</div>