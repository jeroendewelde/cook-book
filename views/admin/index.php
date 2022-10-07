<div class="h-layout">
    <h1 class="alter-title">Dashboard</h1>


    <ul class="admin--menu">
        <li>
            <a href="/admin/recipe">Recipes</a>
        </li>
        <li>
            <a href="/admin/cook">Cooks</a>
        </li>
        <li>
            <a href="/admin/ingredient">Ingredients</a>
        </li>
        <li class="active"> 
            <a href="/admin">Dashboard</a>
        </li>
    </ul>

    <div class="grid--three grid--dashboard">
        <div class="grid__item">
            <h2>
                <?=$countOfIngredients?>
            </h2>
            <span>
                <span class="green-text">Ingredients</span> are used in the recipes
            </span>
        </div>
        <div class="grid__item">
            <h2>
                <?=$countOfRecipes?>
            </h2>
            <span>
                <span class="green-text">Recipes</span> have been made
            </span>
        </div>
        <div class="grid__item">
            <h2>
                <?=$mostUsedIngredient->name?>
            </h2>
            <span>
                Is the most used ingredient in <span class="green-text"><?=$mostUsedIngredient->count?></span>  recipes  
            </span>
        </div>
        <div class="grid__item">
            <h2>
                <?=$mostUsedCategoyObject->name?>
            </h2>
            <span>
                Has been used <span class="green-text"><?=$mostUsedCategoyObject->count?></span> times as a category
            </span>
        </div>
    </div>

    