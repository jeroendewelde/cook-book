<?php

class CookController extends BaseController {

    protected function index () {
        $this->viewParams['cooks'] = Cook::getAll();

        $this->loadView();
    }

    protected function detail ($params) {
        $this->viewParams['cook'] = Cook::getById($params[0]);
        
        $this->loadView();
    }

    protected function create ($params) {
        if( isset($_POST['create-cook']) ) {
            $values = [];
        
            $cook = new Cook();
    
            $cook->firstname = htmlspecialchars(trim($_POST['firstname']));
            $cook->lastname = htmlspecialchars(trim( $_POST['lastname']));
            $cook->bio = htmlspecialchars(trim($_POST['bio']));
            $cook->quote = htmlspecialchars(trim($_POST['quote']));

            if(isset($_FILES['cookPicture']) &&  $_FILES['cookPicture']['size'] > 0){
                $tmp_location = $_FILES['cookPicture']['tmp_name'];

                $new_filename = $_FILES['cookPicture']['name'];
                $new_location =  BASE_DIR . '/resources/images/cooks/' . $new_filename;
                
                $cook->{'picture-url'} = '/images/cooks/' . $new_filename;

                move_uploaded_file($tmp_location, $new_location);
            } else {
                $cook->{'picture-url'} = null;
            }            
            
            $cook->insert();

            //SET HEADER To go to Detail page
            $newHeader = '/cook/detail/' . $cook->getIdByFirstname();
            $newHeader = 'Location: ' . $newHeader;
            header($newHeader);    
        }
        $this->loadView();
    }

    protected function update ($params) {
        $cook = Cook::getById($params[0]);
        $this->viewParams['cook'] = $cook;
        
        if( isset($_POST['update-cook']) ) {
            $updatedCook = new Cook();
    
            $updatedCook->firstname = htmlspecialchars(trim($_POST['firstname']));
            $updatedCook->lastname = htmlspecialchars(trim( $_POST['lastname']));
            $updatedCook->bio = htmlspecialchars(trim($_POST['bio']));
            $updatedCook->quote = htmlspecialchars(trim($_POST['quote']));
            
            // if a file is uploaded by the user, upload to server & add to updated Cook
            if(isset($_FILES['cookPicture']) &&  $_FILES['cookPicture']['size'] > 0){
                $tmp_location = $_FILES['cookPicture']['tmp_name'];

                $new_filename = $_FILES['cookPicture']['name'];
                $new_location =  BASE_DIR . '/resources/images/cooks/' . $new_filename;
                
                $updatedCook->{'picture-url'} = '/images/cooks/' . $new_filename;

                move_uploaded_file($tmp_location, $new_location);
            } else {
                // if the user hasn't selected an image, but there was one in the db, keep that one
                if($cook->{'picture-url'} !== null){ 
                    $updatedCook->{'picture-url'} = $cook->{'picture-url'};
                } else {
                    $updatedCook->{'picture-url'} = null;
                }
                $updatedCook->update($params[0]);

                //SET HEADER To go to Detail page
                $newHeader = '/cook/detail/' . $cook->id;
                $newHeader = 'Location: ' . $newHeader;
                header($newHeader);    
            }
        }   
        $this->loadView();
    }
    
}