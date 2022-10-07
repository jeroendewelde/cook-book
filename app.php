<?php
session_start();

require 'config.php';

require BASE_DIR . '/libs/db.php';

require BASE_DIR . '/models/BaseModel.php';
require BASE_DIR . '/models/Category.php';
require BASE_DIR . '/models/Cook.php';
require BASE_DIR . '/models/Ingredient.php';
require BASE_DIR . '/models/Recipe.php';

require BASE_DIR . '/controllers/BaseController.php';


