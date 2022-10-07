<?php

class IngredientController extends BaseController {
    
    protected function index () {
        $title = 'Ingredients';
        $this->viewParams['ingredients'] = Ingredient::getAll();

        $this->loadView();
    }

    protected function detail ($params) {
        $this->viewParams['ingredients'] = Ingredient::getById($params[0]);
        
        $this->loadView();
    }

    protected function create ($params) {
        if( isset($_POST['create-ingredient']) ) {
            $ingredient = new Ingredient();
    
            $ingredient->name = htmlspecialchars(trim($_POST['name']));
        
            if(isset($_FILES['ingredientPicture']) &&  $_FILES['ingredientPicture']['size'] > 0){
                $tmp_location = $_FILES['ingredientPicture']['tmp_name'];

                $new_filename = $_FILES['ingredientPicture']['name'];
                $new_location =  BASE_DIR . '/resources/images/ingredients/' . $new_filename;
                
                $ingredient->{'image-url'} = '/ingredients/' . $new_filename;

                move_uploaded_file($tmp_location, $new_location);
            } else {
                $ingredient->{'image-url'} = null;
            }            
            $ingredient->insert();
        }
        $this->loadView();
    }

    protected function update ($params) {
        $ingredient = Ingredient::getById($params[0]);
        $this->viewParams['ingredient'] = $ingredient;
        
        if( isset($_POST['update-ingredient']) ) {
            $updatedIngredient = new Ingredient();
    
            $updatedIngredient->name = htmlspecialchars(trim($_POST['name']));
            
            // if a file is uploaded by the user, upload to server & add to updated Cook
            if(isset($_FILES['ingredientPicture']) &&  $_FILES['ingredientPicture']['size'] > 0){
                $tmp_location = $_FILES['ingredientPicture']['tmp_name'];

                $new_filename = $_FILES['ingredientPicture']['name'];
                $new_location =  BASE_DIR . '/resources/images/ingredients/' . $new_filename;
                
                $updatedIngredient->{'image-url'} = '/images/ingredients/' . $new_filename;

                move_uploaded_file($tmp_location, $new_location);
            } else {
                // if the user hasn't selected an image, but there was one in the db, keep that one
                if($ingredient->{'image-url'} !== null){
                    $updatedIngredient->{'image-url'} = $ingredient->{'image-url'};
                } else {
                    $updatedIngredient->{'image-url'} = null;
                }
            }
            $updatedIngredient->update($params[0]);
            //SET HEADER To go to Detail page
            $newHeader = 'Location: ' . '/admin/ingredient/';
            header($newHeader);    
        }            
            $this->loadView();
    }
    
}