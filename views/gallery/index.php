<section id="Gallery" class="">

    <?
    foreach ($this->gallery as $key => $value) {
        $msh = ($key != 0) ? 'msh' : 'no-msh';
        $size = ($key != 0) ? 'med_' : '';
        $lightbox=($value['isVideo'])?$value['video']:UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . $value['file_name'];
        ?>
        <div class="item <?= $msh ?>">
            <div class="itemBox">
                <a href="<?= $lightbox ?>" rel="shadowbox[<?=$this->project['name']?>]" title="<?=$value['caption']?>">
                    <img alt="<?= $value['caption_' . LANG]; ?>" src="<?= UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . $size . $value['file_name']; ?>"/>
                    <div class="focus-button"> </div>
                </a>
            </div>
        </div>
        <? if ($key == 0) { ?> <div id="galleryImages"> <? } ?>
    <? } ?>
    </div>
    <article id="work-desc">
        
        <section>
            <div id="work-text">
<?= $this->project['content_' . LANG] ?>
            </div>
        </section><section>
            <div id="work-info" class="cast">
<?= $this->project['content_list_' . LANG] ?>
            </div>
        </section>
    </article>
</section>
<section id="lightBox" >
    <div class='backgroundContainer' onclick="hideLight();"></div>
    <div class="arrowLeft" onclick="showLight(this.getAttribute('id'));"></div>
    <div class="arrowRight" onclick="showLight(this.getAttribute('id'));"></div>
</section>
