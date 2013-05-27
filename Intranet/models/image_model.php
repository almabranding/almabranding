<?php
class Image_Model extends Model {
    public function __construct() {
        parent::__construct();
    }  
    public function form($type='add',$id='null') {
        $action=($type=='add')?URL.'image/create':URL.'image/edit/'.$id;
        if ($type=='edit')
            foreach ($this->getInfo($id) as $value);
        $form = new Zebra_Form('addProject','POST',$action);
        $obj = $form->add('hidden', '_add', 'page');

        $form->add('label', 'label_name', 'name', 'Name');
        $obj = $form->add('text', 'name', $value['name'], array('autocomplete' => 'off','required'  =>  array('error', 'Name is required!')));
        $form->add('label', 'label_info', 'info', 'Information');
        $obj = $form->add('textarea', 'info', $value['info'], array('autocomplete' => 'off'));

        $form->add('submit', '_btnsubmit', 'Submit');
        $form->validate();
        return $form;
    }
    public function getInfo($id){
        $consulta=$this->db->select('SELECT * FROM images WHERE id = :id', 
           array('id' => $id));
        return $consulta;
    }
    public function edit($id){
        $data = array(
            'name' => $_POST['name'],
            'info' => $_POST['info']
        );
        $this->db->update('images', $data, 
            "`id` = '{$id}'");
    }
    public function delete($id){
         foreach ($this->getInfo($id) as $value){
            $this->db->delete('images', "`id` = {$id}");
            unlink(UPLOAD.$value['page'].'/'.$value['img']);
         } 
    }
}