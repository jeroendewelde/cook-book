<?php

class Recipe extends BaseModel {

    protected $table = 'recipes';
    protected $pk = 'id';

    /**
     * Create / Insert
     */

    // Recipe
    public function insert() {
        global $db;

        $sql = 'INSERT INTO 
        `recipes` 
        (`title`, `teaser-text`, `image-url`, `preparation-time`, `level`, `amount-of-people`, `cooks_id`)
        VALUES 
        (:title, :teaserText, :imageUrl, :preparationTime, :lvl, :amountOfPeople, :cooksId)';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':title' => $this->title,
                ':teaserText' => $this->{'teaser-text'},
                ':imageUrl' => $this->{'image-url'},
                ':preparationTime' => $this->{'preparation-time'},
                ':lvl' => $this->level,
                ':amountOfPeople' => $this->{'amount-of-people'},
                ':cooksId' => $this->cooks_id
            ]
        );
    }

    // Categories
    public static function insertCategoriesForRecipe($categories, $recipeId) {
        global $db;
    
        foreach ($categories as $category) {
            $sql = 'INSERT INTO 
            `recipe_has_categories` (`recipes_id`, `categories_id`)
            VALUES (:recipeId, :categoryId)';
    
            $stmnt = $db->prepare($sql);
            $stmnt->execute(
                [
                    ':recipeId' => (int)$recipeId,
                    ':categoryId' => (int)$category
                ]
            );
    
        }
    }

    // Ingredients
    public static function insertIngredientsForRecipe($ingredientsList, $recipeId) {
        global $db;
    
        // insert into database, looping through ingredients, added conversion-type is 1 -> "none"
        foreach ($ingredientsList as $ingredient) {
            $sql = 'INSERT INTO 
            `recipe_has_ingredients` (`recipes_id`, `ingredients_id`, `quantity`, `conversion-type_id`)
            VALUES (:recipeId, :ingredientId, :quantity, 1)';
    
            $stmnt = $db->prepare($sql);
            $stmnt->execute(
                [
                    ':recipeId' => $recipeId,
                    ':ingredientId' => $ingredient->id,
                    ':quantity' => $ingredient->quantity
                ]
            );
    
        }
    }
    
    // Steps
    public function insertStepsForRecipe($steps, $recipeId) {
        global $db;
    
        // insert into database, looping through steps
        foreach ($steps as $step) {
            $sql = 'INSERT INTO 
            `recipe-steps` (`recipes_id`, `step-number`, `title`, `body`, `image-url`)
            VALUES (:recipeId, :stepNumber, :title, :body, :imageUrl)';
    
            $stmnt = $db->prepare($sql);
            $stmnt->execute(
                [
                    ':recipeId' => $recipeId,
                    ':stepNumber' => $step->stepNumber,
                    ':title' => $step->title,
                    ':body' => $step->body,
                    ':imageUrl' => $step->imageUrl
                ]
            );
            
        }
    }
    
    /**
     * Read / Get
     */
    
    // Get Recipes from search string
    public static function getRecipesBySearchString($searchString) {
        global $db;
    
        $sql = 'SELECT *
        FROM `recipes`
        WHERE `title` LIKE :searchString';
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute(
            [
                ':searchString' => '%' . $searchString . '%'
            ]
        );
    
        $db_items = $pdo_statement->fetchAll(); 

        $items = [];

        foreach( $db_items as $db_item ) {
            
            $db_item = (object) $db_item;
            $item = new Recipe();

            foreach($db_item as $column => $value) {
                $item->{$column} = $value;
            }
            $items[] = $item;
        } 
        return $items;
    }

    // Get COUNT of all recipes
    public static function getCountOfRecipes() {
        global $db;
    
        $sql = 'SELECT COUNT(*) AS `count` 
        FROM `recipes`';
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
    
        $db_item = $pdo_statement->fetchObject(); 
        $count = (int) $db_item->count;
    
        return $count;
    }

    // Get ID by Title
    public static function getIdByTitle($title) {
        global $db;
        
        $sql = 'SELECT `id`
        FROM `recipes`
        WHERE `title` = :p_title
        ORDER BY `id` DESC
        LIMIT 1';
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_title' => $title ]);
    
        $db_item = $pdo_statement->fetchObject(); 
    
        return $db_item->id;
    }

    // Get Cook by ID
    public function getCookById() {
        global $db;
        
        $sql = 'SELECT *
        FROM `cooks`
        WHERE `id` = :p_id
        LIMIT 1';
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_id' => $this->id ]);
    
        $db_item = $pdo_statement->fetchObject(); 
    
        return $db_item;
    }



    // Get Recipe Steps By Cook ID
    public static function getRecipeSteps(int $id) {
        global $db;
    
        $sql = 'SELECT * 
        FROM `recipe-steps`
        WHERE `recipes_id` = :p_id';
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_id' => $id ]);
    
        $db_items = $pdo_statement->fetchAll(); 
    
        return $db_items;
    }

    // Most Used Ingredients
    public static function getMostUsedIngredients() {
        global $db;
        
        $sql = 'SELECT
        `name`,
        `ingredients_id`,
        `image-url`,
        count(ingredients_id) as `count`
        FROM `recipe_has_ingredients`
        INNER JOIN `ingredients` ON `recipe_has_ingredients` . `ingredients_id` = `ingredients` . `id`
        group by `ingredients_id`
        order by count(ingredients_id) desc
        LIMIT 1';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_item = $pdo_statement->fetchObject(); 

        return $db_item;
    }
    
    // Get first 3 Recipe Steps for random Recipe
    public static function getRecipeStepsForRandomRecipe() {
        global $db;
        
        $recipes_count = Recipe::getCountOfRecipes();
        $random_recipe_id = rand(1, $recipes_count);

        $sql = 'SELECT * 
        FROM `recipe-steps`
        WHERE `recipes_id` = :p_id
        ORDER BY `recipes_id` , `step-number`
        LIMIT 3';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_id' => $random_recipe_id ]);

        $db_items = $pdo_statement->fetchAll(); 

        return $db_items;
    }

    // Get Ingredients by Recipe ID
    public function getIngredientsByRecipeId(int $id) {
        global $db;

        $sql = 'SELECT `i` . `image-url`,
        `i` . `name`,
        `rhi` . `quantity`,
        `ct` . `name` AS `conversion_name`,
        `i` . `id` AS `ingredient_id`
                FROM `ingredients` AS `i`
                INNER JOIN `recipe_has_ingredients` AS `rhi` ON `i` . `id` = `rhi` . `ingredients_id`
                INNER JOIN `conversion-type` AS `ct` ON `rhi` . `conversion-type_id` = `ct` . `id`
        WHERE `rhi` . `recipes_id` = :p_id';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_id' => $id]);

        $db_items = $pdo_statement->fetchAll();

        return $db_items;
    }

    // Get Ingredients IDs by Recipe ID
    public function getIngredientIdsByRecipeId(int $id) {
        global $db;

        $sql = 'SELECT
        `ingredients_id`,
        `quantity`
        FROM
        `recipe_has_ingredients`
        WHERE `recipes_id` = :p_id'; 

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_id' => $id]);

        $db_items = $pdo_statement->fetchAll();

        // $ids = [];
        // $quantities = [];

        // foreach($db_items as $item) {
        //     $ids[] = (int)$item['ingredients_id'];
        //     $quantities[] = (int)$item['quantity'];
        // }

        // return [$ids, $quantities];
        return $db_items;
    }


    // Get Steps For Current Recipe
    public function getSteps() {
        global $db;

        $sql = 'SELECT * 
        FROM `recipes`
        INNER JOIN `recipe-steps` ON `recipes` . `id` = `recipe-steps` . `recipes_id`
        WHERE `recipes` . `id` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $this->id ] );

        $db_items = $pdo_statement->fetchAll(); 

        return $db_items;
    }

    // Get Categories By Recipe ID
    public function getCategoriesForRecipeByid($id) {
        global $db;

        $sql = 'SELECT * 
        FROM `categories`
        INNER JOIN `recipe_has_categories` ON `categories` . `id` = `recipe_has_categories` . `categories_id`
        WHERE `recipe_has_categories` . `recipes_id` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_items = $pdo_statement->fetchAll(); 
 
        return $db_items;
    }
    // Get Categories Ids By Recipe ID
    public function getCategoryIdsForRecipeByid($id) {
        global $db;

        $sql = 'SELECT 
        `categories` . `id` 
        FROM `categories`
        INNER JOIN `recipe_has_categories` ON `categories` . `id` = `recipe_has_categories` . `categories_id`
        WHERE `recipe_has_categories` . `recipes_id` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_items = $pdo_statement->fetchAll(); 
        
        $ids = [];

        foreach($db_items as $item) {
            $ids[] = (int)$item['id'];
        }
 
        return $ids;
    }

    // Get Recipe & Cook Information By Recipe ID
    public function getRecipeAndCookInfoByRecipeId($id) {
        global $db;

        $sql = 'SELECT * 
        FROM `recipes`
        INNER JOIN `cooks` ON `recipes` . `cooks_id` = `cooks` . `id`
        WHERE `recipes` . `id` = :p_id';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':p_id' => $id ] );

        $db_item = $pdo_statement->fetchObject(); 
 
        return $db_item;
    }

    // Get 3 Random Recipes (not optimal)
    public static function getRandomRecipeIds() {
        global $db;
        $sql = 'SELECT `id`
        FROM recipes';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 

        $random = array_rand($db_items, 3);

        return $random;
    }

    // Get 3 Random Recipes for Cards (Home)
    public static function getRandomRecipes() {
        global $db;

        $sql = 'SELECT 
        `r` . `id`,
        `r`. `title` , 
        `r` . `teaser-text`,
        `r` . `level`,
        `r` . `cooks_id`,
        `r` . `image-url`,
        `cooks` . `picture-url`,
        GROUP_CONCAT( `c` . `name` ORDER BY `c` . `name`  ) AS `categories`
        FROM `recipes` AS `r`
        INNER JOIN `recipe_has_categories` AS `rhc` ON `r` . `id` = `rhc` . `recipes_id`
        INNER JOIN `categories` AS `c` ON `rhc` . `categories_id` = `c` . `id`
        INNER JOIN `cooks` ON `r` . `cooks_id` = `cooks` . `id`
        GROUP BY 
        `r` . `id`,
        `r` . `title`,
        `r` . `teaser-text`,
        `r` . `level`,
        `r` . `cooks_id`,
        `cooks` . `picture-url`,
        `r` . `image-url`
        ORDER BY rand()
        LIMIT 3';
        
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( );

        $db_items = $pdo_statement->fetchAll(); 
 
        return $db_items;
    }

    // Get ALL Recipes for Cards
    public static function getAllForOverviewOriginal() {
        global $db;
        $sql = '
        SELECT 
        `r` . `id`,
        `r`. `title` , 
        `r` . `teaser-text`,
        `r` . `level`,
        `r` . `cooks_id`,
        `r` . `image-url`,
        `cooks` . `picture-url`,
        GROUP_CONCAT( `c` . `name` ORDER BY `c` . `name`  ) AS `categories`
        FROM `recipes` AS `r`
        INNER JOIN `recipe_has_categories` AS `rhc` ON `r` . `id` = `rhc` . `recipes_id`
        INNER JOIN `categories` AS `c` ON `rhc` . `categories_id` = `c` . `id`
        INNER JOIN `cooks` ON `r` . `cooks_id` = `cooks` . `id`
        GROUP BY 
        `r` . `id`,
        `r` . `title`,
        `r` . `teaser-text`,
        `r` . `level`,
        `r` . `cooks_id`,
        `cooks` . `picture-url`,
        `r` . `image-url`';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_items = $pdo_statement->fetchAll(); 

        $items = [];

        foreach( $db_items as $db_item ) {
            
            $db_item = (object) $db_item;
            $item = new Recipe();

            foreach($db_item as $column => $value) {
                $item->{$column} = $value;
            }
            $items[] = $item;
        } 
        return $items;
    }


    /**
     * Update
     */

    // Update Recipe
    public function update($id) {
        global $db;

        $sql = 'UPDATE
        `recipes` 
        SET
        `title` = :p_title,
        `teaser-text` = :p_teaser_text,
        `preparation-time` = :p_prepTime,
        `level` = :p_level,
        `amount-of-people` = :p_amountOfPeople,
        `cooks_id` = :p_cooks_id
        WHERE `id` = :p_id';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':p_title' => $this->title,
                ':p_teaser_text' => $this->{'teaser-text'},
                ':p_prepTime' => $this->{'preparation-time'},
                ':p_level' => $this->{'level'},
                ':p_amountOfPeople' => $this->{'amount-of-people'},
                ':p_cooks_id' => $this->cooks_id,
                ':p_id' => (int)$id
            ]
        );
    }

    // Teaser Image
    public function updateTeaserImage($imageUrl, $id) {
        global $db;

        $sql = 'UPDATE 
        `recipes` 
        SET `image-url` = :imageUrl 
        WHERE `id` = :id';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':imageUrl' => $imageUrl,
                ':id' => $id
            ]
        );
    }

    /**
     * Delete
     */

    // Remove All Categories
    public static function removeAllCategoriesForRecipe($recipeId) {
        global $db;
    
        $sql = 'DELETE
        FROM
        `recipe_has_categories`
        WHERE `recipes_id` =  :recipeId';

        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':recipeId' => (int)$recipeId
            ]
        );
    }

    // Remove All Ingredients
    public static function removeAllIngredientsForRecipe($recipeId) {
        global $db;
    
        $sql = 'DELETE
        FROM
        `recipe_has_ingredients`
        WHERE `recipes_id` =  :recipeId';

        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':recipeId' => (int)$recipeId
            ]
        );
    }

    // Remove All Steps
    public static function removeAllStepsFromRecipe($recipeId) {
        global $db;
    
        $sql = 'DELETE
        FROM
        `recipe-steps`
        WHERE `recipes_id` =  :recipeId';

        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':recipeId' => (int)$recipeId
            ]
        );
    }

    /**
     * Helpers / Utilities
     */

    // Upload TeaserImage to Server
    public static function uploadTeaserImage($file, $recipeId) {
        if(isset($file) && $file['size'] > 0 ) {
            $tmp_location = $file['tmp_name'];

            $new_filename = $file['name'];
            $new_location =  BASE_DIR . '/resources/images/recipes/' . $recipeId . '/' . $new_filename;
            
            $pathForRecipe = '/recipes/' . $recipeId . '/'  . $new_filename;

            //create folder if non existent:
            if (!file_exists(BASE_DIR . '/resources/images/recipes/' . $recipeId)) {
                mkdir(BASE_DIR . '/resources/images/recipes/' . $recipeId, 0777, true);
            }

            move_uploaded_file($tmp_location, $new_location);

            return $pathForRecipe;
            
        } else return null;
        
    }

    // Upload Step(s)Image to Server
    public static function uploadStepImage($size, $tmp_name, $name, $recipeId) {
        if($size > 0 ) {
            $tmp_location = $tmp_name;

            $new_filename = $name;
            $new_location =  BASE_DIR . '/resources/images/recipes/' . $recipeId . '/steps/' . $new_filename;
            
            $pathForStep = '/recipes/' . $recipeId . '/steps/'  . $new_filename;

            //create folder if non existent:
            if (!file_exists(BASE_DIR . '/resources/images/recipes/' . $recipeId . '/steps')) {
                mkdir(BASE_DIR . '/resources/images/recipes/' . $recipeId . '/steps', 0777, true);
            }

            move_uploaded_file($tmp_location, $new_location);

            return $pathForStep;
            
        } else return null;
        
    }

    // Get Short Teaser Text
    public function getShortTeaserText() {
        return substr($this->{'teaser-text'}, 0, 30) . '...';
    }

    // Get Short Image Url
    public function getImageUrl() {
        $url = $this->{'image-url'};
        $url = explode('/', $url);
        $url = end($url);
        return '...' . substr($url, -30);
    }

}