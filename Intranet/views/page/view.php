<div class="white_box hide" id="newImage">
    <?php $this->form->render(); ?>
</div>
<div >
    <?php $value=$this->project;?>
    <h2 style="margin:0;"><?php echo $value['name'];?></h2><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['url'];?></a><br/>
    <table style="margin:30px 0;">
        <tr>
            <td  colspan="2"><img src="<?php echo URL.'uploads/projects/'.$value['img'];?>"></td>
        </tr>
        
        <tr class="titleRow" >
            <td  rowspan="3">FTP</td>
            <td><?php echo $value['ftpHost'].' (<span class="bold">Port: </span>'.$value['ftpPort'].')';?></td>
        </tr>
        <tr>
            <td><span class="bold">User: </span><?php echo $value['ftpUser'];?></td>
        </tr>
        <tr>
            <td><span class="bold">Password: </span><?php echo $value['ftpPass'];?></td>
        </tr>
        <tr class="titleRow" >
            <td rowspan="3">HOSTING</td>
            <td><a href="<?php echo $value['hostURL'];?>" target="_blank"><?php echo $value['hostURL'];?></a></td>
        </tr>
        <tr>
            <td><span class="bold">User: </span><?php echo $value['hostUser'];?></td>
        </tr>
        <tr>
            <td><span class="bold">Password: </span><?php echo $value['hostPass'];?></td>
        </tr>
        <tr class="titleRow" >
            <td rowspan="3">INTRANET</td>
            <td><a href="<?php echo $value['intranetURL'];?>" target="_blank"><?php echo $value['intranetURL'];?></a></td>
        </tr>
        <tr>
            <td><span class="bold">User: </span><?php echo $value['intranetUser'];?></td>
        </tr>
        <tr>
            <td><span class="bold">Password: </span><?php echo $value['intranetPass'];?></td>
        </tr>
    </table>
</div>
<h3>More information:</h3>
<div id="editable" contenteditable="true">
    <?php echo $value['info'];?>
</div>
<div style="text-align: right;">
   <input type="button" id="save" value="Edit" onclick="showPop('newImage');" class="btn" />
</div>
<script>
$(document).ready(function() {
    $('#editable').on('focusout',function(){
        var editabledata = CKEDITOR.instances.editable.getData();
        $.post("<?php echo URL.'page/edit/'.$value['id'];?>", { info: editabledata} );
    });
});
</script>