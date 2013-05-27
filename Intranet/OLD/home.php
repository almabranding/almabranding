<?PHP
require_once 'auth.php';
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("functions/functions.php");
include_once("functions/Zebra_Form.php");
$consulta=new Consulta();
$projects=new Consulta();
$fileElementName = 'fileToUpload';
$uploadsDir="../uploads/";
if ($_SERVER['REQUEST_METHOD']){
    if (isset($_POST['_add']))
    {
        $consulta->insert_bbdd($_POST['_add'],$_POST);
    }
    if ($_POST['_form']=='delete')
    {
        $id=$_POST['id'];
        $consulta->setConsulta('SELECT * FROM project WHERE id='.$id);
        $deleteDir=$uploadsDir.$consulta->getData('id');
        delTree($deleteDir);
        $consulta->setConsulta('DELETE FROM project WHERE id="'.$id.'"');

        $consulta->setConsulta('DELETE FROM images WHERE project="'.$id.'"');
    }
    if ($_POST['_form']=='insert')
    {
        $consulta->insert_bbdd('web',$_POST);
        $createDir=$uploadsDir.$consulta->lastID();
        mkdir($createDir);
        mkdir($createDir.'/images');
    /*if(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
    {
        $error = 'No file was uploaded...';
    }else 
    {
        $pathinfo = pathinfo($_FILES[$fileElementName]["name"]);
        $ext='.'.$pathinfo['extension'];
        $file = uniqid($pathinfo['filename'].'_');
        $nameFile=$file.$ext;
        $avatar = $file.'_avatar'.$ext;

        $column[]='img';    
        $insert[]=$nameFile;
        $columna='';
        $inserta='';
        foreach($column as $key=>$value){
            $columna.=$value.","; 
        }
        foreach($insert as $key=>$value){
            $inserta.="'".$value."',"; 
        }
        $inserta=substr ( $inserta , 0, -1 );
        $columna=substr ( $columna , 0, -1 );
        $consulta->setConsulta('INSERT INTO project ('.$columna.') VALUES  ('.$inserta.')');	
        $uploads_dir.='/'.$consulta->lastID();
        mkdir($uploads_dir);
        mkdir($uploads_dir.'/images');
        move_uploaded_file($_FILES[$fileElementName]['tmp_name'], "$uploads_dir/$nameFile");
        copy("$uploads_dir/$nameFile", "$uploads_dir/$avatar");
    }*/
    
    }
    
    if (isset($_POST['foo'])){
        foreach($_POST['foo'] as $key=>$value)
            $consulta->setConsulta('UPDATE project SET orden="'.$key.'" WHERE id="'.$value.'"');
    }
    if (!isset($_POST['_form']))
    { 
        if(isset($_POST['id'])){
            list($column, $id) = explode("_", $_POST['id']);
            $consulta->setConsulta('UPDATE project SET '.$column.'="'.$_POST['value'].'" WHERE id='.$id);
            $consulta->setConsulta('SELECT * FROM project WHERE id='.$id);
            echo $consulta->getData($column);
            exit;
        }
    } 
}
?>
<!DOCTYPE html>
<head>
     <?php include 'head.php'; ?>
</head>
<body>
    
    <script>
$(document).ready(function() {
     $('.edit_area').editable('videos.php', { 
         type      : 'textarea',
         onblur   : 'submit',
         indicator : '<img src="img/indicator.gif">',
         tooltip   : ''
     });
 });
 function hidePreview()
  {
    $preview.stop().fadeOut('fast');
  };
  
</script>
    <div id="wrapper">
        <?php include 'header.php'; ?>
        <div id="mainarea">
            <?php 
            $clients=new Consulta;
            $clients->setConsulta('SELECT * FROM client');
            $c=Array();
            if($clients->num)do{
                $c[$clients->getData('id')]=$clients->getData('name');
                
            }while($clients->nextRow ());
            $form = new Zebra_Form('my_form');
            $obj = $form->add('hidden', '_add', 'web');

            $form->add('label', 'label_client', 'client', 'Cliente');
            $obj = $form->add('select', 'client');
            $obj->add_options($c);
            
            $form->add('label', 'label_name', 'name', 'Nombre');
            $obj = $form->add('text', 'name', '', array('autocomplete' => 'off'));
            $obj->set_rule(array(
                'required'  =>  array('error', 'Name is required!')
            ));
            
            $form->add('label', 'label_url', 'url', 'Url');
            $obj = $form->add('text', 'url', '', array('autocomplete' => 'off'));
            $obj->set_rule(array(
                'required'  =>  array('error', 'Url is required!')
            ));
            
            $form->add('label', 'label_comments', 'comments', 'Info');
            $obj = $form->add('textarea', 'comments', '', array('autocomplete' => 'off'));
            $form->add('submit', '_btnsubmit', 'Submit');
            $form->validate()

            ?>
            <div class="white_full hide" onclick="$('.hide').css('display','none')"></div>
            <div class="white_box hide">
                 <h2 style="width:100%">Upload project</h2>
                 <?php
                 $form->render();
                 ?>
                 
            </div>
            <h2>Works</h2>
            <div id="container">   
                    <?php 
                    $projects->setConsulta("SELECT * FROM web ORDER BY orden");
                    if($projects->num)do{
                        $b['content'][]=
                        array(
                            "name"  =>$projects->getData('name'),
                            "url"  =>$projects->getData('url'),
                            "comments"  =>$projects->getData('comments'),
                            "_link"  =>"project.php?id=".$projects->getData('id')
                        );
                    }while($projects->nextRow());
                     $b['title']=array(
                        array(
                            "value"  =>"Nombre",
                            "width"  =>"10%"
                        ),array(
                            "value"  =>"URL",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Commentarios",
                            "width"  =>"70%"
                        ));
                    $a=array(
                        "sortable"  =>true
                    );
                    $vista=new View($a);
                    $vista->viewGrill($b['title'], $b['content']);?>
                   
                    <div style="text-align: right;">
                       <input type="button" id="save" value="Upload" onclick="$('.hide').css('display','block')" class="btn" />
                    </div>              
            </div>
        </div>
    </div>   
    <?php include 'footer.php'; ?>
</body>