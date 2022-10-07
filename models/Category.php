<?php
class Category extends BaseModel {

    protected $table = 'categories';
    protected $pk = 'id';

    public function getCategoriesByRecipeId( int $recipeId) {
        global $db;
        
        $sql = 'SELECT *
        FROM `recipe_has_categories`
        INNER JOIN `categories` ON `recipe_has_categories` . `categories_id` = `categories` . `id`
        WHERE `recipe_has_categories` . `recipes_id` = 1';
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute( [ ':r_id' => $recipeId ] );

        $db_items = $pdo_statement->fetchAll(); 
        return $db_items;
    }

    public static function getMostUsedCategories() {
        global $db;
        
        $sql = 'SELECT 
        count(recipes_id) as `count`,
        `categories_id`,
        `name`
        FROM recipe_has_categories
        INNER JOIN `categories` ON `recipe_has_categories` . `categories_id` = `categories` . `id`
        GROUP BY `categories_id`
        ORDER BY count(recipes_id) desc
        LIMIT 1';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_item = $pdo_statement->fetchObject(); 

        return $db_item;
    }
};