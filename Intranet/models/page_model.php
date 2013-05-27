<?php
class Page_Model extends Model {
    public function __construct() {
        parent::__construct();
    }
    public function form($type='add',$id='null') {
        $action=($type=='add')?URL.'page/create':URL.'page/edit/'.$id;
        if ($type=='edit')
        $project=$this->getProject($id);
        $form = new Zebra_Form('addProject','POST',$action);

        $form->add('label', 'label_name', 'name', 'Name');
        $form->add('text', 'name', $project['name'], array('autocomplete' => 'off'));
        
        $form->add('label', 'label_url', 'url', 'URL');
        $form->add('text', 'url', $project['url'], array('autocomplete' => 'off'));
        
        $form->add('label', 'label_client', 'client', 'Cliente');
        $obj = $form->add('select', 'client', $project['template'], array('autocomplete' => 'off'));
        foreach($this->getClient() as $key => $value) {
            $menu[$value['id']]=$value['company'];
        }
        $obj->add_options($menu);
        $form->add('label', 'labelFtp', 'ftp', 'FTP',array('style' => 'margin-bottom:0'));
        $form->add('text', 'ftpHost', $project['ftpHost'], array('placeholder' => 'Host'));
        $form->add('text', 'ftpUser', $project['ftpUser'], array('placeholder' => 'User'));
        $form->add('text', 'ftpPass', $project['ftpPass'], array('placeholder' => 'Pass'));
        $form->add('text', 'ftpPort', $project['ftpPort'], array('placeholder' => 'Port'));
        
        $form->add('label', 'labelHost', 'host', 'Hosting',array('style' => 'margin-bottom:0'));
        $form->add('text', 'hostURL', $project['hostURL'], array('placeholder' => 'URL'));
        $form->add('text', 'hostUser', $project['hostUser'], array('placeholder' => 'User'));
        $form->add('text', 'hostPass', $project['hostPass'], array('placeholder' => 'Pass'));
        
        $form->add('label', 'labelIntranet', 'intranet', 'Intranet',array('style' => 'margin-bottom:0'));
        $form->add('text', 'intranetURL', $project['intranetURL'], array('placeholder' => 'URL'));
        $form->add('text', 'intranetUser', $project['intranetUser'], array('placeholder' => 'User'));
        $form->add('text', 'intranetPass', $project['intranetPass'], array('placeholder' => 'Pass'));
        
        

        $form->add('submit', 'btnsubmit', 'Submit');
        $form->validate();
        return $form;
    }
    
    public function getList() {
        $lista=$this->db->select("SELECT * FROM project");
        $b[0]=array(
           array(
               "title"  =>"Id",
               "width"  =>"5%"
           ),array(
               "title"  =>"Name",
               "width"  =>"10%"
           ),array(
               "title"  =>"URL",
               "width"  =>"20%"
           ),array(
               "title"  =>"Client",
               "width"  =>"20%"
           ),array(
               "title"  =>"Options",
               "width"  =>"10%"
           ));
                     
        foreach($lista as $key => $value) {
            $b[]=
            array(
                "id"  =>$value['id'],
                "name"  =>$value['name'],
                "url"  =>$value['url'],
                "client"  =>$this->getClient($value['client'],'company'),
                "Options"  =>'<a href="'.URL.'page/view/'.$value['id'].'"><div class="editTBtn"></div></a><a href="'.URL.'page/delete/'.$value['id'].'"><div class="deleteTBtn"></div></a>'
            );
        }
        return $b;
    }
    public function getInfo($id){
         $consulta=$this->db->select('SELECT * FROM page WHERE id = :id', 
            array('id' => $id));
         return $consulta;
    }
    public function getGallery($id){
         return $this->db->select('SELECT * FROM images WHERE page = :id', 
            array('id' => $id));
    } 
    
    public function create() {
        $data = array(
            'name' => $_POST['name'],
            'url'  => $_POST['url'],
            'client' => $_POST['client'],
            'ftpHost' => $_POST['ftpHost'],
            'ftpUser' => $_POST['ftpUser'],
            'ftpPass' => $_POST['ftpPass'],
            'ftpPort' => $_POST['ftpPort'],
            'hostURL' => $_POST['hostURL'],
            'hostUser' => $_POST['hostUser'],
            'hostPass' => $_POST['hostPass'],
            'intranetURL' => $_POST['intranetURL'],
            'intranetUser' => $_POST['intranetUser'],
            'intranetPass' => $_POST['intranetPass'],
        );
        $page=$this->db->insert('project', $data);
    }
    public function edit($id){
        $data = array(
            'name' => $_POST['name'],
            'url'  => $_POST['url'],
            'client' => $_POST['client'],
            'ftpHost' => $_POST['ftpHost'],
            'ftpUser' => $_POST['ftpUser'],
            'ftpPass' => $_POST['ftpPass'],
            'ftpPort' => $_POST['ftpPort'],
            'hostURL' => $_POST['hostURL'],
            'hostUser' => $_POST['hostUser'],
            'hostPass' => $_POST['hostPass'],
            'intranetURL' => $_POST['intranetURL'],
            'intranetUser' => $_POST['intranetUser'],
            'intranetPass' => $_POST['intranetPass'],
            'info' => $_POST['info'],
        );
        $data=array_filter($data);
        $this->db->update('project', $data, 
            "`id` = '{$id}'");
    }
    public function delete($id){
         $this->db->delete('project', "`id` = {$id}");
         $this->delTree(UPLOAD.$id);
    }   
}