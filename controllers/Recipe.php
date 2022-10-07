<?php

class RecipeController extends BaseController {

    protected function index () {
        if(isset($_GET['search_string'])) {
            $search_string = $_GET['search_string'];
            // $ids = Recipe::getRecipesBySearchString($search_string);
            $this->viewParams['recipes'] = Recipe::getRecipesBySearchString($search_string);

        } else {
            // $this->viewParams['recipes'] = Recipe::getAllForOverview();
            $this->viewParams['recipes'] = Recipe::getAll();
        }

        $this->loadView();
    }



    protected function detail ($params) {
        $this->viewParams['recipes'] = Recipe::getById($params[0]);
        
        $this->viewParams['ingredients'] =  $this->viewParams['recipes']->getIngredientsByRecipeId($params[0]);
        $this->viewParams['recipeCategories'] =  $this->viewParams['recipes']->getCategoriesForRecipeByid($params[0]);
        $this->viewParams['recipeTest'] =  $this->viewParams['recipes']->getRecipeAndCookInfoByRecipeId($params[0]);

        $this->loadView();
    }

    protected function search () {
        global $db;
        if( isset($_POST['search-recipe']) ) {
            $search_string = $_POST['search_string'];
            $sql = 'SELECT *
                    FROM `recipes`
                    WHERE `title` LIKE :test_str';
                    
            $stmnt = $db->prepare($sql);
            $stmnt->execute(
                [
                    ':test_str' => '%' . $search_string . '%'
                ]

            );
            $recipesSearch = $stmnt->fetchAll();
        }

        $this->loadView();
    }

    protected function create ($params) {
        $this->viewParams['cooks'] = Cook::getAll();
        $this->viewParams['categories'] = Category::getAll();
        $this->viewParams['ingredients'] = Ingredient::getAllIngredientsSortedByName();

        if( isset($_POST['create-recipe']) ) {
            $recipe = new Recipe();

            $recipe->title = htmlspecialchars(trim($_POST['title']));
            $recipe->{'teaser-text'} = htmlspecialchars(trim($_POST['teaser']));
            $recipe->{'cooks_id'} = (int)$_POST['cook'];
            $recipe->{'amount-of-people'} = (int)$_POST['amountOfPeople'];
            $recipe->{'preparation-time'} = (int)$_POST['prep-time'];
            $recipe->level = (int)$_POST['skill-level'];
            
            // Array of Categories
            $categories = $_POST['categories'];

            // Array of Ingredient input
            $ingredients = $_POST['ingredients'];
            $ingredientAmounts = $_POST['ingredientAmount'];
            $ingredientList = [];

            for($i = 0; $i < count($ingredients); $i++) {
                $object = new stdClass();
                $object->id = (int)$ingredients[$i];
                $object->quantity = (int)$ingredientAmounts[$i];
                $ingredientList[] = $object;
            }

            // Recipe Steps
            $stepTitles = $_POST['stepTitle'];
            $stepDescriptions = $_POST['stepDescription'];
            $stepImages = $_FILES['stepImage'];

            // Add recipe without junction tables
            $recipe->insert();
            
            // GET ID from inserted record
            $createdRecipeId = Recipe::getIdByTitle($recipe->title);

            // INSERT Categories
            Recipe::insertCategoriesForRecipe($categories,$createdRecipeId);

            // INSERT Ingredients
            Recipe::insertIngredientsForRecipe($ingredientList,$createdRecipeId);

            // Upload teaser image & receive path for DB
            $pathForRecipe =  Recipe::uploadTeaserImage($_FILES['teaserPicture'], $createdRecipeId);
            
            if($pathForRecipe) {   
                $recipe->updateTeaserImage($pathForRecipe, $createdRecipeId);
            }

            $arrayOSteps = [];
            for ($i=0; $i <= count($stepImages) ; $i++) { 
                $step = new stdClass();
                
                // Upload step image & receive path for DB
                $pathForStep =  Recipe::uploadStepImage(
                    $stepImages['size'][$i], 
                    $stepImages['tmp_name'][$i], 
                    $stepImages['name'][$i], 
                    $createdRecipeId
                );
                
                $step->stepNumber = $i+1;
                $step->title = htmlspecialchars(trim($stepTitles[$i]));
                $step->body = htmlspecialchars(trim($stepDescriptions[$i]));
                
                if($pathForStep) {   
                    $step->imageUrl = $pathForStep;
                } else {
                    $step->imageUrl = null;
                }

                $arrayOSteps[] = $step;
            }

            // INSERT Steps
            $recipe->insertStepsForRecipe($arrayOSteps, $createdRecipeId);

            //SET HEADER To go to Detail page
            $newHeader = '/recipe/detail/' . $createdRecipeId;
            $newHeader = 'Location: ' . $newHeader;
            header($newHeader);    
        }
        $this->loadView();
    }

    protected function update ($params) {
        $recipe = Recipe::getById($params[0]);
        $recipeStepsFromDb = Recipe::getRecipeSteps($params[0]);

        $this->viewParams['recipe'] = $recipe;
        $this->viewParams['cooks'] = Cook::getAll();
        $this->viewParams['categories'] = Category::getAll();
        $this->viewParams['ingredients'] = Ingredient::getAllIngredientsSortedByName();
        $this->viewParams['categoriesForRecipe'] = $recipe->getCategoryIdsForRecipeByid($params[0]);
        $this->viewParams['ingredientsForRecipe'] = $recipe->getIngredientIdsByRecipeId($params[0]);
        // $this->viewParams['ingredientsForRecipe'] = Recipe::getIngredientIdsByRecipeId($params[0])[0];
        // $this->viewParams['ingredientAmountForRecipe'] = Recipe::getIngredientIdsByRecipeId($params[0])[1];

        if( isset($_POST['update-recipe']) ) {
            $updatedRecipe = new Recipe();

            $updatedRecipe->title = htmlspecialchars(trim($_POST['title']));
            $updatedRecipe->{'teaser-text'} = htmlspecialchars(trim($_POST['teaser']));
            $updatedRecipe->{'cooks_id'} = (int)$_POST['cook'];
            $updatedRecipe->{'amount-of-people'} = (int)$_POST['amountOfPeople'];
            $updatedRecipe->{'preparation-time'} = (int)$_POST['prep-time'];
            $updatedRecipe->level = (int)$_POST['skill-level'];
            
            // Array of Categories
            $categories = $_POST['categories'];

            // Array of Ingredient input
            $ingredients = $_POST['ingredients'];
            $ingredientAmounts = $_POST['ingredientAmount'];
            $ingredientList = [];

            for($i = 0; $i < count($ingredients); $i++) {
                $object = new stdClass();
                $object->id = (int)$ingredients[$i];
                $object->quantity = (int)$ingredientAmounts[$i];
                $ingredientList[] = $object;
            }

            // Recipe Steps
            $stepTitles = $_POST['stepTitle'];
            $stepDescriptions = $_POST['stepDescription'];
            $stepImages = $_FILES['stepImage'];

            // Add recipe without junction tables
            $updatedRecipe->update($recipe->id);
            
            // GET ID from inserted record
            $createdRecipeId = $recipe->id;

            // UPDATE Categories
            Recipe::removeAllCategoriesForRecipe($recipe->id);   
            Recipe::insertCategoriesForRecipe($categories,$createdRecipeId);

            // UPDATE Ingredients
            Recipe::removeAllIngredientsForRecipe($recipe->id);
            Recipe::insertIngredientsForRecipe($ingredientList,$createdRecipeId);

            // if a file is uploaded by the user, upload to server & add to updated Recipe
            if(isset($_FILES['teaserPicture']) &&  $_FILES['teaserPicture']['size'] > 0){
                $pathForRecipe =  Recipe::uploadTeaserImage($_FILES['teaserPicture'], $createdRecipeId);
                $updatedRecipe->updateTeaserImage($pathForRecipe, $createdRecipeId);
            }

            $arrayOSteps = [];

            for ($i=0; $i < count($stepImages) ; $i++) { 
                $step = new stdClass();
                
                // Upload step image & receive path for DB
                if(isset($stepImages['tmp_name'][$i]) &&  $stepImages['size'][$i] > 0){
                    $pathForStep =  Recipe::uploadStepImage(
                        $stepImages['size'][$i], 
                        $stepImages['tmp_name'][$i], 
                        $stepImages['name'][$i], 
                        $createdRecipeId
                    );

                    $step->imageUrl = $pathForStep;
                } else {
                    if($recipeStepsFromDb[$i+1]) {
                        $step->imageUrl = $recipeStepsFromDb[$i+1]['image-url'];
                    } else {
                        $step->imageUrl = null;
                    }
                }

                $step->stepNumber = $i+1;
                $step->title = $stepTitles[$i];
                $step->body = $stepDescriptions[$i];

                $arrayOSteps[] = $step;
            }

            // UPDATE Steps
            Recipe::removeAllStepsFromRecipe($recipe->id);
            $updatedRecipe->insertStepsForRecipe($arrayOSteps, $createdRecipeId);

            //SET HEADER To go to Detail page
            $newHeader = '/recipe/detail/' . $createdRecipeId;
            $newHeader = 'Location: ' . $newHeader;
            header($newHeader);    
        }
        $this->loadView();
    }
}