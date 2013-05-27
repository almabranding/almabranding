<?PHP
require_once 'auth.php';
header ("Expires: Thu, 27 Mar 1980 23:59:00 GMT"); //la pagina expira en una fecha pasada
header ("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); //ultima actualizacion ahora
header ("Cache-Control: no-cache, must-revalidate"); //no guardar en CACHE
header ("Pragma: no-cache");

if (!isset($_SESSION))session_start();  $_SESSION['lang']='ES';
include_once("../functions/functions.php");
$consulta=new Consulta();
$menu=new Consulta();
$menu->setConsulta('select * from menu order by orden');
$fileElementName = 'fileToUpload';
$uploadsDir="../uploads";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    foreach($_POST['foo'] as $key=>$value){
         $consulta=new Consulta();
         $consulta->setConsulta('UPDATE images SET orden="'.$key.'" WHERE id="'.$value.'"');
         
    }
    if (isset($_POST['editImg'])) { 
        $id = $_POST['id'];
        $video=(isset($_POST['video']))?$_POST['video']:'0';
        $urlVideo=(isset($_POST['urlVideo']))?$_POST['urlVideo']:'';
        $wVideo=(isset($_POST['wVideo']))?$_POST['wVideo']:'600';
        $hVideo=(isset($_POST['hVideo']))?$_POST['hVideo']:'300';
        $consulta->setConsulta('UPDATE images SET caption="'.$_POST['caption'].'",urlVideo="'.$urlVideo.'",video="'.$video.'",wVideo="'.$wVideo.'",hVideo="'.$hVideo.'" WHERE id="'.$id.'"');
    }
    if ($_POST['_form']=='edit') {
        $id = $_POST['_id'];
        $name = $_POST['name'];
        
        
        $uploads_dir=$uploadsDir.'/'.$id;
        $consulta->setConsulta('SELECT * FROM project WHERE id=' . $id);
        $avatar=$consulta->getData('avatar');
        $nameFile=$consulta->getData('img');  
        if(empty($_FILES[$fileElementName]['tmp_name']) || $_FILES[$fileElementName]['tmp_name'] == 'none')
        {
        }else 
        {
            $tmp_name = $_FILES[$fileElementName]["tmp_name"];
            $pathinfo = pathinfo($_FILES[$fileElementName]["name"]);
            $ext='.'.$pathinfo['extension'];
            $file = uniqid($pathinfo['filename'].'_');
            $nameFile=$file.$ext;
            move_uploaded_file($tmp_name, "$uploads_dir/$nameFile");
        }
        $pathinfo = pathinfo($nameFile);
        $ext='.'.$pathinfo['extension'];
        $file = uniqid($pathinfo['filename'].'_');
        if(isset($_POST['w']) && $_POST['w']!=''){
            if($nameFile!=$avatar) unlink($uploads_dir.'/'.$avatar);
            $jpeg_quality = 90;
            $avatar = $file.'_avatar'.$ext;
            $src =$uploads_dir.'/'.$nameFile;
            $srcD=$uploads_dir.'/'.$avatar;
          
            $img_r = imagecreatefromjpeg($src);
            $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
            imagecopyresampled($dst_r,$img_r,0,0,$_POST['x']*$rel,$_POST['y']*$rel,$targ_w,$targ_h,$_POST['w']*$rel,$_POST['h']*$rel);
        }
      
        $consulta->setConsulta('UPDATE project SET name="'.$name.'",img="'.$nameFile.'",avatar="'.$avatar.'",photo="'.$photographer.'",director="'.$director.'",prod="'.$production.'",scompany="'.$scompany.'",agency="'.$agency.'",location="'.$location.'",urlVideo="'.$urlVideo.'",wVideo="'.$wVideo.'",hVideo="'.$hVideo.'",video="'.$video.'",dop="'.$dop.'",dopLink="'.$dopLink.'",scompanyLink="'.$scompanyLink.'",photoLink="'.$photoLink.'",agencyLink="'.$agencyLink.'",prodLink="'.$productionLink.'",directorLink="'.$directorLink.'" WHERE id="'.$id.'"');
	imagejpeg($dst_r,$srcD,$jpeg_quality);
    }
    if (isset($_POST['delete'])) {
        $consulta->setConsulta('SELECT * FROM images WHERE id=' . $_POST['id']);
        $id=$consulta->getData('project'); 
        unlink('../uploads/'.$id,'/images/'.$consulta->getData('name'));
        unlink('../uploads/'.$id,'/images/thumb_'.$consulta->getData('name'));
        
        $consulta->setConsulta('DELETE FROM images WHERE id=' . $_POST['id']);
    }
}

// If not a POST request, display page below:

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="last-modified" content="0">

    <meta http-equiv="expires" content="0">

    <meta http-equiv="cache-control" content="no-cache, mustrevalidate">

    <meta http-equiv="pragma" content="no-cache">

  <?php include 'head.php'; ?>
<script type="text/javascript">
 jQuery(function($){
    // Create variables (in this scope) to hold the API and image size
    var jcrop_api,
        boundx,
        boundy,

        // Grab some information about the preview pane
        $preview = $('#preview-pane'),
        $pcnt = $('#preview-pane .preview-container'),
        $pimg = $('#preview-pane .preview-container img'),

        xsize = $pcnt.width(),
        ysize = $pcnt.height();
    
    $('#target').Jcrop({
      onChange: updatePreview,
      onSelect: updatePreview,
      aspectRatio: 0
    },function(){
      // Use the API to get the real image size
      var bounds = this.getBounds();
      boundx = bounds[0];
      boundy = bounds[1];
      // Store the API in the jcrop_api variable
      jcrop_api = this;

      // Move the preview into the jcrop container for css positioning
      $preview.appendTo(jcrop_api.ui.holder);
    });

    function updatePreview(c)
    {
      $('.avatar').css('display','none');
      $('.preview').css('display','inherit');
      if (parseInt(c.w) > 0)
      {
        var rx = c.w / c.w;
        var ry = c.h / c.h;

        $pcnt.css({
          width: Math.round(c.w) + 'px',
          height: Math.round(c.h) + 'px'
        });
        $pimg.css({
          width: Math.round(rx * boundx) + 'px',
          height: Math.round(ry * boundy) + 'px',
          marginLeft: '-' + Math.round(rx * c.x) + 'px',
          marginTop: '-' + Math.round(ry * c.y) + 'px'
        });
      }
      updateCoords(c);
    };
  });
  function updateCoords(c)
  {
      var img = document.getElementById('target');
//or however you get a handle to the IMG

    var width = img.width;
    var width = img.width;
    var height = img.height
    var rel=width/$('#target').width();
    //rel=1.98;
    $('#rel').val(rel);
    $('#x').val(c.x);
    $('#y').val(c.y);
    $('#w').val(c.w);
    $('#h').val(c.h);
    $('#width').text(c.w);
    $('#height').text(c.h);
    if(c.w<300) $('#width').css('color','#ef3333');
    if(c.w<350 && c.w>300 ) $('#width').css('color','#278654');
    if(c.w>350 ) $('#width').css('color','#ffa61a');
    
    if(c.h<200 || c.h>400) $('#height').css('color','#ffa61a');
    else $('#height').css('color','#278654');
  };
  function checkCoords()
  {
    if (parseInt($('#w').val())) return true;
    return true;
  };
  function hidePreview()
  {
    $preview.stop().fadeOut('fast');
  };
  $(function() {
   $('#sortable').sortable({
        start: function(event, ui) {
            $(ui.helper).addClass("sortable-drag-clone");
        },
        stop: function(event, ui) {
            $(ui.helper).removeClass("sortable-drag-clone");
        },
        update: function(event, ui) {
            updateListItem($(ui.item).attr('rel'), $(this).attr('rel'));
        },
        tolerance: "pointer",
        connectWith: "#sortable",
        placeholder: "sortable-draggable-placeholder",
        forcePlaceholderSize: true,
        appendTo: 'body',
        helper: 'clone',
        zIndex: 666
    }).disableSelection();  
});
function updateListItem(itemId, newStatus) {
    var sorted = $( "#sortable" ).sortable( "serialize" );
    $.post('',sorted+'&action=updateOrder').done(function(data) {});
  }

  
</script>

</head>
<body>
    <div id="wrapper">
        <?php include 'sidebar.php'; ?>
        <?php 
        $id=$_GET['id'];
        $embedVideo="";
        $project=new Consulta();
        $project->setConsulta("SELECT * FROM project WHERE id='".$id."'");
        $preview=$project->getData('img');
        $avatar=$project->getData('avatar');
        $pathinfo = pathinfo($preview);
        $ext='.'.$pathinfo['extension'];
        $file = uniqid($pathinfo['filename'].'_');
        if($project->getData('video')==1)$embedVideo='<div class="embedVideo"></div>';
        ?>
        <div id="container"  style="padding-left: 30px;">
            <div id="white_full" class="white_full hide" onclick="$('.hide').css('display','none')"></div>
            <?php
                $consulta->setConsulta('SELECT * FROM images WHERE project="' . $id . '" ORDER BY orden');
                if($consulta->num) do{
                ?>
                     <div class="white_box hide img" id="hide_h<?php echo $consulta->getData('id'); ?>">
                    <h2 style="width:100%">Edit Picture</h2>
                    <form action="" method="post"  enctype="multipart/form-data" >
                    <p><label for="caption">Caption</label><input name="caption" id="caption" type="text" value="<?php echo $consulta->getData('caption');?>"></p>
                    <p><label for="urlVideo">Vimeo</label><input name="urlVideo" id="urlVideo" type="text" value="<?php echo $consulta->getData('urlVideo');?>"></p>
                    <p><label for="urlVideo">Video Height</label><input name="hVideo" id="urlVideo" type="text" value="<?php echo $consulta->getData('hVideo');?>"></p>
                    <p><label for="urlVideo">Video Width</label><input name="wVideo" id="urlVideo" type="text" value="<?php echo $consulta->getData('wVideo');?>"></p>
                    <p><label for="video">Video</label><input name="video" type="checkbox" <?php if($consulta->getData('video')==1) echo "checked='checked'"?> value="1"></p>
                    <input type="hidden" id="editImg" name="editImg" value="1"/>
                    <input type="hidden" id="id" name="id" value="<?php echo $consulta->getData('id');?>"/>

                    <input type="submit" id="save" value="Save" class="btn" /><input type="button" id="save" value="Cancel" class="btn" onclick="$('.hide').css('display','none')"/>
                </form>
                     </div>
                      
             <?php }while($consulta->nextRow());?>
            <div class="project_form">
                <form action="" method="post" onsubmit="return checkCoords();" enctype="multipart/form-data" >
                    <input type="hidden" id="_form" name="_form" value="edit"/>
                    <input type="hidden" id="_id" name="_id" value="<?php echo $id;?>"/>
                    <p><label for="name">Name</label><input name="name" id="name" type="text" value="<?php echo $project->getData('name');?>"></p>
                    <p><label for="info">Info</label><textarea name="info" id="info" type="text" value=""><?php echo $project->getData('info');?></textarea></p>
                     <p class="foto"><label for="photo">Menu</label>
                        <select>
                            <?php do{ ?>
                            <option value="<?php echo $menu->getData('id');?>" <?php if($menu->getData('id')==$project->getData('menu')) echo 'selected="selected"'; ?>><?php echo $menu->getData('name');?></option>
                            <?php }while($menu->nextRow());?>
                        </select>
                     </p>
                    <label ></label><input type="submit" id="save" value="Save" class="btn" /><input type="button" id="save" value="Cancel" class="btn" onclick="document.location.href='works.php';"/>
                </form>
            </div>
            <ul id="sortable" class="ui-sortable" rel="cosa">
                <?php
                $consulta->setConsulta('SELECT * FROM images WHERE project="' . $id . '" ORDER BY orden');
                if($consulta->num) do{
                ?>
                        <li id="foo_<?php echo $consulta->getData('id'); ?>" class="ui-state-default" onclick="">
                            <img src="<?php echo $uploadsDir.'/'.$consulta->getData('project').'/images/thumb_'.$consulta->getData('img'); ?>" caption="<?php echo $consulta->getData('caption'); ?>">
                            <form action="" method="post">
                            <input type="hidden" id="delete" name="delete" value="1"/>
                            <input id="h<?php echo $consulta->getData('id'); ?>" class="btn editImg" type="button" style="margin:0;" onclick="" value="Edit">
                            <input id="save" class="btn" type="submit" style="background: #bb0000;margin:0;" onclick="" value="Delete">
                            <input type="hidden" id="id" name="id" value="<?php echo $consulta->getData('id'); ?>"/>
                            <input type="hidden" id="img" name="idImg" value="<?php echo $consulta->getData('id'); ?>"/>
                            </form>
                        </li>
                <?php }while($consulta->nextRow());?>
                    </ul>
            <div id="dropbox">
                <input id="project" type="hidden" value="<?php echo $id; ?>">
                <input id="uploadType" type="hidden" value="">
                <input id="bbdd" type="hidden" value="images">
                <span class="message">Drop images here to upload. <br /></span>
            </div>
        </div>
    </div>
	<?php include '../footer.php'; ?>
<script>
    $("#container").on("click",".editImg", function(event){
      var h=$(this).attr('id');
      $('#white_full').css('display','block');
      $('#hide_'+h).css('display','block');
    });


    if($('#video').is(':checked')){
          $('.foto').hide();
          $('.video').show();
      }else{
          $('.foto').show();
          $('.video').hide();
      }
    $("#video").on("change", function(event){
      var form=$(this).parents('form') ;
      if($(this).is(':checked')){
          form.children('.foto').hide();
          form.children('.video').show();
      }else{
          form.children('.foto').show();
          form.children('.video').hide();
      }
    });
</script>
</body>

</html>
