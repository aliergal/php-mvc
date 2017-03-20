<?php

class Task extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('task/js/task.js');
    }
    
    function index(){    
        $this->view->title = 'Dashboard';
        
        $this->view->render('header');
        $this->view->render('task/index');
        $this->view->render('footer');
    }
    
    function add(){
        $this->model->add();
    }
    
    function getAll(){
        $this->model->getAll();
    }
    
    function delete(){
        $this->model->delete();
    }

}