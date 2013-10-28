<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/custom.js');
    }
    
    function index() {
        $this->view->projects = $this->model->getProjects();
        $this->view->render('index/index');
    }
    
}