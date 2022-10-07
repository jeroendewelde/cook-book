<?php

class CategoryController extends BaseController {
    
    protected function index () {
        echo 'index';
        $title = 'Categories';
        $this->viewParams['categories'] = Category::getAll();

        $this->loadView();
    }

    protected function detail ($params) {
        $this->viewParams['categories'] = Category::getById($params[0]);
        
        $this->loadView();
    }
}