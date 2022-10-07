<?php

class ApiController {

    public function get_recipes ($page = 0) {
        header('Content-Type: application/json; charset=utf-8');

        $recipes =  Recipe::getAll();
        echo json_encode($recipes);
        exit;
    }

    public function get_cook_by_CookId ($params) {
        header('Content-Type: application/json; charset=utf-8');
        
        $cook = Cook::getById($params[0]);
        echo json_encode($cook);
        exit;
    }

    public function get_ingredients() {
        header('Content-Type: application/json; charset=utf-8');

        $ingredients = Ingredient::getAll();
        echo json_encode($ingredients);
        exit;
    }

    public function deleteCook($params) {
        Cook::deleteById($params[0]);
        echo json_encode('Cook with ID:' . $params[0] . ' has been deleted');
        exit;
    }

    public function deleteRecipe($params) {
        Recipe::deleteById($params[0]);
        echo json_encode('Recipe with ID:' . $params[0] . ' has been deleted');
        exit;
    }
    
    public function deleteIngredient($params) {
        Ingredient::deleteById($params[0]);
        echo json_encode('Ingredient with ID:' . $params[0] . ' has been deleted');
        exit;
    }
}