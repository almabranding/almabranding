<?PHP
require_once 'auth.php';
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora cuando la cargamos
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");
if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("functions/functions.php");
include_once("functions/Zebra_Form.php");
$id=$_GET['id'];
$consulta=new Consulta();
$projects=new Consulta();
$menu=new Consulta();
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
        $consulta->insert_bbdd('project',$_POST);
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
    <div id="wrapper">
        <?php include 'header.php'; ?>
        <div id="mainarea">
            <?php
           /*Formulario Añadir FTP*/
                $addFtp = new Zebra_Form('addFTP');
                $addFtp->show_all_error_messages(true);
                $obj = $addFtp->add('hidden', '_add', 'ftp');
                $obj = $addFtp->add('hidden', 'project', $id);
                
                $addFtp->add('label', 'label_host', 'host', 'Host');
                $obj = $addFtp->add('text', 'host', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  =>  array('error', 'URL is required!'),
                ));
                
                $addFtp->add('label', 'label_user', 'user', 'Usuario');
                $obj = $addFtp->add('text', 'user', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  => array('error', 'Introduce un usuario')
                ));
                
                $addFtp->add('label', 'label_password', 'password', 'Contraseña');
                $obj = $addFtp->add('text', 'password', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  => array('error', 'Introduce una contraseña')
                ));
                $addFtp->add('label', 'label_port', 'port', 'Puerto');
                $obj = $addFtp->add('text', 'port', '21', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  => array('error', 'Introduce una contraseña')
                ));
                
                $addFtp->add('submit', '_btn', 'Submit');
                $addFtp->validate();
                
                /*Formulario Añadir HOSTIN*/
                $addHosting = new Zebra_Form('addHosting');
                $obj = $addHosting->add('hidden', '_add', 'hosting');
                $obj = $addHosting->add('hidden', 'project', $id);
                
                $addHosting->add('label', 'label_name', 'name', 'Nombre');
                $obj = $addHosting->add('text', 'name', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  =>  array('error', 'Name is required!')
                ));
                
                $addHosting->add('label', 'label_url', 'url', 'Url');
                $obj = $addHosting->add('text', 'url', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  =>  array('error', 'URL is required!'),
                ));
                
                $addHosting->add('label', 'label_user', 'user', 'Usuario');
                $obj = $addHosting->add('text', 'user', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  => array('error', 'Introduce un usuario')
                ));
                
                $addHosting->add('label', 'label_password', 'password', 'Password');
                $obj = $addHosting->add('text', 'password', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(

                    'required'  => array('error', 'Password is required!')

                ));
                $addHosting->add('submit', '_btnsubmit', 'Submit');
                $addHosting->validate();
                
                /*Formulario Añadir Mailing*/
                $addMailing = new Zebra_Form('addMailing');
                $obj = $addMailing->add('hidden', '_add', 'mailing');
                $obj = $addMailing->add('hidden', 'project', $id);
                
                $addMailing->add('label', 'label_name', 'name', 'Persona');
                $obj = $addMailing->add('text', 'name', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  =>  array('error', 'Name is required!')
                ));
                
                $addMailing->add('label', 'label_mail', 'mail', 'Email');
                $obj = $addMailing->add('text', 'mail', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  =>  array('error', 'Introduce un usuario Email'),
                    'email'     =>  array('error', 'Email address seems to be invalid!'),
                    'style'     =>  array('class','popo'),

                ));
                $addMailing->add('label', 'label_user', 'user', 'Usuario');
                $obj = $addMailing->add('text', 'user', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  => array('error', 'Introduce un usuario')
                ));
                
                $addMailing->add('label', 'label_password', 'password', 'Contraseña');
                $obj = $addMailing->add('text', 'password', '', array('autocomplete' => 'off'));
                $obj->set_rule(array(
                    'required'  => array('error', 'Introduce una contraseña')
                ));
                
                $addMailing->add('submit', '_btnsubmit', 'Submit');
                $addMailing->validate();
             
                ?>
            <div class="white_full hide" onclick="$('.hide').css('display','none')"></div>
            <div class="white_box hide AddFtp">
                 <h2 style="width:100%">Add FTP</h2>
                    <?php 
                     $addFtp->render();
                     ?>
            </div>
            <div class="white_box hide AddHosting">
                 <h2 style="width:100%">Add Hosting</h2>
                    <?php 
                     $addHosting->render();
                     ?>
            </div>
            <div class="white_box hide AddMailing">
                 <h2 style="width:100%">Add Mailing</h2>
                    <?php 
                     $addMailing->render();
                     ?>
            </div>
            <h2>Works</h2>
            <div id="container">                
                <div>
                    <h1>FTP</h1>
                    <?php 
                    $projects->setConsulta("SELECT * FROM ftp WHERE project=".$id);
                    $b=array();
                        if($projects->num)do{
                            $b[]=
                            array(
                                "host"  =>$projects->getData('host'),
                                "user"  =>$projects->getData('user'),
                                "password"  =>$projects->getData('password'),
                                "port"  =>$projects->getData('port')
                            );
                        }while($projects->nextRow());
                     $a=array(
                        array(
                            "value"  =>"Host",
                            "width"  =>"10%"
                        ),array(
                            "value"  =>"User",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Password",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Port",
                            "width"  =>"20%"
                        ));
                     $c=array(
                            "sortable"  =>true
                        );
                    $vista=new View($c);
                    if($projects->num) $vista->viewGrill($a, $b);?>
                </div>
                <div>
                    <h1>Hosting</h1>
                    <?php 
                    $projects->setConsulta("SELECT * FROM hosting WHERE project=".$id);
                    $b=array();
                        if($projects->num)do{
                            $b[]=
                            array(
                                "url"  =>$projects->getData('name'),
                                "user"  =>$projects->getData('user'),
                                "password"  =>$projects->getData('password'),
                                "link"  =>'<a href="'.$projects->getData('url').'" target="_blank">Ir</a>'
                            );
                        }while($projects->nextRow());
                     $a=array(
                        array(
                            "value"  =>"Hosting",
                            "width"  =>"10%"
                        ),array(
                            "value"  =>"User",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Password",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Link",
                            "width"  =>"20%"
                        ));
                     $c=array(
                            "sortable"  =>true
                        );
                    $vista=new View($c);
                    if($projects->num) $vista->viewGrill($a, $b);?>
                </div>
                <div>
                    <h1>Hosting</h1>
                    <?php 
                    $projects->setConsulta("SELECT * FROM mailing WHERE project=".$id);
                    $b=array();
                        if($projects->num)do{
                            $b[]=
                            array(
                                "url"  =>$projects->getData('name'),
                                "user"  =>$projects->getData('user'),
                                "password"  =>$projects->getData('password'),
                                "mail"  =>$projects->getData('mail')
                            );
                        }while($projects->nextRow());
                     $a=array(
                        array(
                            "value"  =>"Persona",
                            "width"  =>"10%"
                        ),array(
                            "value"  =>"User",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Password",
                            "width"  =>"20%"
                        ),array(
                            "value"  =>"Email",
                            "width"  =>"20%"
                        ));
                     $c=array(
                            "sortable"  =>true
                        );
                    $vista=new View($c);
                    if($projects->num) $vista->viewGrill($a, $b);?>
                </div>
                    <div style="text-align: right;">
                       <input type="button" id="save" value="FTP" onclick="showForm('AddFtp');" class="btn" />
                       <input type="button" id="save" value="HOSTING" onclick="showForm('AddHosting');" class="btn" />
                       <input type="button" id="save" value="CORREO" onclick="showForm('AddMailing');" class="btn" />
                    </div>              
            </div>
        </div>
    </div>   
    <?php include 'footer.php'; ?>
    <script>
        function showForm(form){
            $('.white_full').css('display','block');
            $('.'+form).css('display','block')
            
        }
    </script>
</body>