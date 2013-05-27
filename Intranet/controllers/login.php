<?php
class Login extends Controller {

    function __construct() {
        parent::__construct();
        $this->view->js = array('index/js/custom.js', 'index/js/jquery.ez-bg-resize.js');
        //$this->view->js = array('login/js/jquery.ez-bg-resize.js','login/js/custom.js');
    }
    
    function index() {
        echo "ds";
        $this->view->label='labelLogin';
        $attr = array(
            'col' => 'name',
            'id' => 'Login'
        );
        $template = $this->model->getTemplatebyCol($attr);
        $attr = array(
            'col' => 'template',
            'id' => $template['id']
        );
        $this->view->page = $this->model->getPageByCol($attr);
        $this->view->gallery = $this->model->getGallery($this->view->page['id']);
        $this->view->render('index/index', true);
    }
    function run() {
        $this->model->run();
    }
    
}