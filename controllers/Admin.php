<?php

class AdminController extends BaseController {

    protected function index () {
        $title = 'Ingredients';
        $this->viewParams['countOfIngredients'] = Ingredient::getCountOfIngredients();
        $this->viewParams['countOfRecipes'] = Recipe::getCountOfRecipes();
        $this->viewParams['mostUsedIngredient'] = Recipe::getMostUsedIngredients();
        $this->viewParams['mostUsedCategoyObject'] = Category::getMostUsedCategories();

        $this->loadView();
    }

    protected function cook () {
        $this->viewParams['cooks'] = Cook::getAll();
        $this->loadView();
    }

    protected function recipe () {
        $this->viewParams['recipes'] = Recipe::getAll();
        $this->loadView();
    }

    protected function ingredient () {
        $this->viewParams['ingredients'] = Ingredient::getAll();
        $this->loadView();
    }
}