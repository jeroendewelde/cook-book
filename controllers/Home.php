<?php

class HomeController extends BaseController {

    protected function index () {
        // get 3 random recipes for "cards"
        $this->viewParams['randomRecipes'] = Recipe::getRandomRecipes();

        // get random ingredients
        $this->viewParams['randomIngredients'] = Ingredient::getLimitedAmount();

        // get 3 out of steps from a random recipe
        $this->viewParams['randomSteps'] = Recipe::getRecipeStepsForRandomRecipe();

        $this->loadView();
    }
}