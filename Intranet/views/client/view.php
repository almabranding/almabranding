<div class="white_box hide" id="edit">
    <?php $this->form->render(); ?>
</div>
<div>
    <?php $value=$this->client;?>
   <h2 style="margin:0;"><?php echo $value['company'];?></h2><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['url'];?></a><br/>
    <table style="margin:30px 0;">
        <tr>
            <td  colspan="2"><img src="<?php echo URL.'uploads/projects/'.$value['img'];?>"></td>
        </tr>
        <tr class="titleRow" >
            <td><span class="bold">Contact: </span></td>
            <td><?php echo $value['contact'];?></td>
        </tr>
        <tr class="titleRow" >
            <td><span class="bold">Telephone: </span></td>
            <td><?php echo $value['tel'];?></td>
        </tr>
        <tr class="titleRow" >
            <td><span class="bold">e-Mail: </span></td>
            <td><?php echo $value['mail'];?></td>
        </tr>
        <tr class="titleRow" >
            <td><span class="bold">Address: </span></td>
            <td><?php echo $value['address'];?></td>
        </tr>
        
    </table>
</div>
<div style="text-align: right;">
   <input type="button" id="save" value="Edit" onclick="showPop('edit');" class="btn" />
</div>