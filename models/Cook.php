<?php

class Cook extends BaseModel {
    protected $table = 'cooks';
    protected $pk = 'id';

    public function insert() {
        global $db;
        
        $sql = 'INSERT INTO
        `cooks` (`firstname`, `lastname`, `bio`, `quote`, `picture-url`)
        VALUES (:firstname, :lastname, :bio, :quote, :picture)';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':bio' => $this->bio,
                ':quote' => $this->quote,
                ':picture' => $this->{'picture-url'}
            ]
        );
    }   

    public function update($id) {
        global $db;
        
        $sql = 'UPDATE
        `cooks` 
        SET `firstname` = :firstname,
        `lastname` = :lastname,
        `bio` = :bio,
        `quote` = :quote,
        `picture-url` = :picture
        WHERE `id` = :id';
        $stmnt = $db->prepare($sql);
        $stmnt->execute(
            [
                ':firstname' => $this->firstname,
                ':lastname' => $this->lastname,
                ':bio' => $this->bio,
                ':quote' => $this->quote,
                ':picture' => $this->{'picture-url'},
                ':id' => (int)$id
            ]
        );
    }   

    public function getShortBio() {
        return substr($this->bio, 0, 30) . '...';
    }

    public function getShortQuote() {
        return substr($this->quote, 0, 30) . '...';
    }

    public function getOnlyFileName() {
        $url = $this->{'picture-url'};
        $url = explode('/', $url);
        $url = end($url);
        return substr($url, 0, 30) . '...';
    }

    // Get ID by Title
    public function getIdByFirstname() {
        global $db;
        
        $sql = 'SELECT `id`
        FROM `cooks`
        WHERE `firstname` = :p_name
        ORDER BY `id` DESC
        LIMIT 1';
    
        $pdo_statement = $db->prepare($sql);
        $pdo_statement->execute([ ':p_name' => $this->firstname ]);
    
        $db_item = $pdo_statement->fetchObject(); 
    
        return $db_item->id;
    }


}