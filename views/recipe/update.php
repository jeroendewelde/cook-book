<div class="h-layout">
    <h1 class="text-center">Update <span class="green-text">Recipe</span></h1>

    <form method="POST" class="form" enctype="multipart/form-data">
        <h2>
            Select the chef
        </h2>
        <fieldset>
            <img id="previewCook"  src='<?php
                if(isset($recipe->cooks_id)) {
                    echo '/resources' .$cooks[$recipe->cooks_id -1]->{'picture-url'};
                } else {
                    echo '/resources/images/cooks/placeholder.jpeg';
                }?>'/>
            <label>
                <select name="cook" id="cook_selector" class="selectBox">
                    <span>Choose your cook</span>
                    <option>As who are you cooking?</option>
                    <?php
                    foreach ($cooks as $cook ) {
                        echo "<option value='$cook->id'";
                        if($recipe->cooks_id == $cook->id) {
                            echo "selected='selected'";
                        }
                        echo "'>$cook->firstname</option>";
                    }
                    ?>
                </select>
            </label>
        </fieldset>

        <h2>
            Teaser information
        </h2>
        <fieldset>
        <label class="full-line">
            <span>Title</span>
                <input type="text" name="title" maxlength="128" placeholder="Title of the recipe" value="<?php echo $recipe->title ?? '';?>" required>
            </label>
            <label class="full-line">
                <span>Teaser-text</span>
                <textarea name="teaser" id="" rows="6" placeholder="What is the story about this recipe?"><?php echo $recipe->{'teaser-text'} ?? '';?></textarea>
            </label>
            <label class="full-line">
                <span>Teaser picture</span>
                <input type="file" name="teaserPicture">
            </label>
            <label>
                <span>Amount of people</span>
                <input type="number" name="amountOfPeople" value="<?php echo $recipe->{'amount-of-people'} ?? '2'; ?>">
            </label>
            <label>
                <span>Preparation time (in m)</span>
                <select name="prep-time"  class="selectBox">
                    <option selected="selected">Amount of mins</option>
                    <?php
                    $time = array(10, 20, 30, 40, 50, 60);
                    foreach($time as $item){
                    ?>
                        <option value="<?=$item?>"<?php
                        if(isset($recipe->{'preparation-time'}) && $recipe->{'preparation-time'} == $item) {
                            echo "selected='selected'";
                        }
                        ?>
                        ><?=$item?> min</option>
                    <?php
                    }
                    ?>
                    
                </select>
            </label>
            <label>
                <span>Skill level needed</span>
                <select name="skill-level"  class="selectBox">
                    <?php
                        $levels[] = new stdClass;
                        $levels[0]->value = 2;
                        $levels[0]->name = "Beginner";
                        $levels[1]->value = 4;
                        $levels[1]->name = "Intermediate";
                        $levels[2]->value = 6;
                        $levels[2]->name = "Advanced";
                        $levels[3]->value = 8;
                        $levels[3]->name = "Expert";
                        ?>
                        <option>Select the skill level</option>
                        <?php
                        foreach($levels as $item){
                        ?>
                            <option value='$item->value' <?php 
                            if(isset($recipe->level) && (int)$recipe->level == $item->value) {
                                echo "selected='selected'";
                            }
                            ?>>
                                <?=$item->name?>
                            </option>
                        
                        <?php
                        }
                        ?>

                </select>
            </label>
        </fieldset>

        <h2>Categories</h2>
        <fieldset>
            <?php
            foreach ($categories as $category ) {
            ?>
                <label class="form__checkbox">
                    <input type="checkbox" name="categories[]" value="<?=$category->id?>"
                    <?php
                    if(isset($categoriesForRecipe) && in_array($category->id, $categoriesForRecipe)) {
                        echo "checked";
                    }
                    ?>
                    >
                    <?= $category->name ?>
                </label>
            <?php
            }
            ?>
        </fieldset>
        
        <h2>
            List of ingredients
        </h2>
        <fieldset class="form__ingredients" >
            <div class="form__ingredients__list">
                <?php
                if($ingredientsForRecipe) {
                    foreach ($ingredientsForRecipe as $ingredientInRecipe) {
                    ?>
                        <div class="form__ingredients__list__item">
                            <select name="ingredients[]"  class="selectBox">
                                <option selected="selected">
                                    Choose your ingredients
                                </option>
                                <?php
                                foreach ($ingredients as $ingredient ) {
                                ?>
                                <option value="<?=$ingredient->id?>"<?php
                                    if((int)$ingredientInRecipe['ingredients_id'] === (int)$ingredient->id) {
                                        echo "selected='selected'";
                                    }
                                ?>
                                >
                                    <?=$ingredient->name?>
                                </option>
                                <?php
                                }
                                ?>
                            </select>
                            <input type="number" name="ingredientAmount[]" id=""
                            <?php
                                if((int)$ingredientInRecipe['quantity'] > 0) {
                                    echo "value='".$ingredientInRecipe['quantity']."'";
                                } 
                            ?>
                            >
                            <button id="removeIngredientFirst" class="removeIngredientsAlreadyLoaded" >
                                <img src="/resources/fonts/x.svg">
                            </button>
                        </div>
                    <?php
                    }
                }
                ?>
            </div>
            <div class="form__ingredients__new">
                <button type="button" class="add-ingredient-new" onclick="addNewIngredientInput()">
                    Add new ingredient
                </button>
            </div>
        </fieldset>

        <h2>
            Recipe steps
        </h2>
        <fieldset class="form__steps">
            <?php
            $stepsFromRecipe = $recipe->getSteps();

            foreach ($stepsFromRecipe as $step ) {
            ?>
                <h3>
                    Step <?=$step['step-number']?>
                </h3>

                <div class="form__steps__item">
                    <label class="full-line">
                        <span>Title</span>
                        <input type="text" name="stepTitle[]" maxlength="128" 
                        value="<?= 
                            $step['title']
                        ?>" required>
                    </label>
                    <label>
                        <span>Description</span>
                        <textarea name="stepDescription[]" rows="6" placeholder="What is the story about this recipe?"><?= $step['body'] ?></textarea>
                    </label>    
                    <label>
                        <span>Image</span>
                        <input type="file" name="stepImage[]" id="">
                    </label>
                </div>
            <?php
            }
            ?>
        </fieldset>
        
        <button type="submit" name="update-recipe">Update recipe</button>
    </form>
</div>

<script>
    /**
     * Global Variables
     */
    // Get PHP ingredients in JS
    $ingredients = <?=json_encode($ingredients)?>;
    // ingredientlist
    $ingredientList = document.querySelector('.form__ingredients__list');

    /**
     * Functions
     */
    // Update Cook image
    const getCookImage = async () => {
        const value = document.getElementById('cook_selector').value;
        const previewImage = document.querySelector('#previewCook');
        try {
            const response = await fetch(`/api/get_cook_by_CookId/${value}`);

            const data = await response.json();
            previewImage.src = `/resources${data['picture-url']}`;
        } catch (error) {
            console.error(error);
        }
    }

    // Remove node  with ingredient from DOM
    const removeIngredient = (e) => {
        let $listItem = e.target.parentNode;

        if($listItem.className === 'form__ingredients__list__item') {
        } else {
            $listItem = $listItem.parentNode;
        }
        $listItem.remove();
    }

   
    // Create new ingredient Input
    const addNewIngredientInput = () => {
        // Ingredient Selector
        $selector = document.createElement('select');
        $selector.name = 'ingredients[]';
        $selector.className = 'selectBox';    
        
        $firstOption = document.createElement('option');
        $firstOption.innerText = 'Choose your ingredients';
        $selector.appendChild($firstOption);
        
        $ingredients.forEach(ingredient => {
            $option = document.createElement('option');
            $option.value = ingredient.id;
            $option.innerText = ingredient.name;
            $selector.appendChild($option);
        })
                
        // Ingredient amount
        $input = document.createElement('input');
        $input.type = 'number';
        $input.name = 'ingredientAmount[]';
        $input.value = 1;

        // Remove ingredient
        $button = document.createElement('button');
        $button.type = 'button';
        $button.innerHTML = `<img src="/resources/fonts/x.svg">`;
        $button.addEventListener('click', removeIngredient);

        // Container
        $div = document.createElement('div');
        $div.className = 'form__ingredients__list__item';
        $div.appendChild($selector);
        $div.appendChild($input);
        $div.appendChild($button);

        $ingredientList.appendChild($div);
    }

    
    /**
     * Set Listeners
     */
    // Cook selector
    $selector = document.getElementById('cook_selector');
    $selector.addEventListener('change', getCookImage);
    // FIRST ingredient selector
    document.querySelector('#removeIngredientFirst').addEventListener('click', removeIngredient);
    $loadedIngredients =  document.querySelectorAll('.removeIngredientsAlreadyLoaded');
    $loadedIngredients.forEach(ingredient => {
        ingredient.addEventListener('click', removeIngredient);
    });
</script>