<?php

class Ingredient extends BaseModel {

    protected $table = 'ingredients';
    protected $pk = 'id';

    public function insert() {
        global $db;
        
        $sql = 'INSERT INTO
        `ingredients` (`name`, `image-url`)
        VALUES (:imgName, :imageUrl)';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':imgName' => $this->name,
                ':imageUrl' => $this->{'image-url'}
            ]
        );
    }   

    public static function getCountOfIngredients() {
        global $db;

        $sql = 'SELECT COUNT(*) AS `count` 
        FROM `ingredients`';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();

        $db_item = $pdo_statement->fetchObject(); 
        $count = (int) $db_item->count;

        return $count;
    }

    public function update($id) {
        global $db;
        
        $sql = 'UPDATE
        `ingredients` 
        SET `name` = :imgName,
        `image-url` = :imgUrl
        WHERE `id` = :id';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':id' => (int)$id,
                ':imgName' => $this->name,
                ':imgUrl' => $this->{'image-url'},
            ]
        );
    }   

    public static function getLimitedAmount() {
        global $db;

        $sql = 'SELECT * 
        FROM `ingredients` 
        ORDER BY rand()
        LIMIT 24';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        $db_items = $pdo_statement->fetchAll(); 

        return $db_items;
    }

    public static function getAllIngredientsSortedByName() {
        global $db;
        $sql = 'SELECT *
        FROM `ingredients` 
        ORDER BY `name` 
        ASC';

        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute();
        $db_items = $pdo_statement->fetchAll(); 

        $items = [];

        foreach( $db_items as $db_item ) {
            
            $db_item = (object) $db_item;
            $item = new Ingredient();

            foreach($db_item as $column => $value) {
                $item->{$column} = $value;
            }
            $items[] = $item;
        } 
        return $items;
    }
}