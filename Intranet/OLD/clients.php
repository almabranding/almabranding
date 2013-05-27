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
            <div class="white_full hide" onclick="$('.hide').css('display','none')"></div>
            <div class="white_box hide">
                <?php
                /*Formulario Añadir FTP*/
                $addClient = new Zebra_Form('addFTP');
                $addClient->show_all_error_messages(true);
                $obj = $addClient->add('hidden', '_add', 'client');
                
                $addClient->add('label', 'label_name', 'name', 'Nombre');
                $obj = $addClient->add('text', 'name', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  =>  array('error', 'Nombre is required!'),
                ));
                
                $addClient->add('submit', '_btn', 'Submit');
                $addClient->validate();
                ?>
                 <h2 style="width:100%">Nuevo cliente</h2>
                 <?php 
                     $addClient->render();
                ?>
            </div>
            <h2>Clients</h2>
            <div id="container">   
                    <?php 
                    echo "ds";
                    $projects->setConsulta("SELECT * FROM client ORDER BY orden");
                    $b=array();
                        if($projects->num)do{
                            $b[]=
                            array(
                                "name"  =>$projects->getData('name'),
                                "address"  =>$projects->getData('address'),
                                "contact"  =>$projects->getData('contact'),
                                "comments"  =>$projects->getData('comments')
                            );
                        }while($projects->nextRow());
                     $a=array(
                        array(
                            "value"  =>"Nombre",
                            "width"  =>"10%"
                        ),array(
                            "value"  =>"Dirección",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Contacto",
                            "width"  =>"30%"
                        ),array(
                            "value"  =>"Commentarios",
                            "width"  =>"30%"
                        ));
                     $c=array(
                            "sortable"  =>true
                        );
                    $vista=new View($c);
                    $vista->viewGrill($a, $b);?>
                   
                    <div style="text-align: right;">
                       <input type="button" id="save" value="Upload" onclick="$('.hide').css('display','block')" class="btn" />
                    </div>              
            </div>
        </div>
    </div>   
    <?php include 'footer.php'; ?>
</body>