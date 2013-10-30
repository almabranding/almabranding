<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/custom.js');
    }
    
    function index($pag=1) {
        $this->view->projects = $this->model->getProjects($pag,NUMPP);
        $this->view->pag = $this->model->countProjects($pag);
        $this->view->render('index/index');
    }
    
}