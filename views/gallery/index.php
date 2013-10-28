<div id="Gallery" class="">

    <?
    foreach ($this->gallery as $key => $value) {
        $msh = ($key != 0) ? 'msh' : 'no-msh';
        $size = ($key != 0) ? 'med_' : '';
        ?>
        <div class="item <?= $msh ?>">
            <div class="itemBox">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?= UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . $size . $value['file_name']; ?>"/>
                <div class="focus-button"> </div>
            </div>
        </div>
        <? if ($key == 0) { ?> <div id="galleryImages"> <? } ?>
    <? } ?>
    </div>
    <article id="work-desc">
        
        <section>
            <h2>
            Lorem Ipsum es simplemente
        </h2>
            <div id="work-text">
<?= $this->project['content_' . LANG] ?>
            </div>
        </section><section>
            <div id="work-info" class="cast">
<?= $this->project['content_list_' . LANG] ?>
            </div>
        </section>
    </article>
</div>
<section id="lightBox" >
    <div class='backgroundContainer' onclick="hideLight();"></div>
    <div class="arrowLeft" onclick="showLight(this.getAttribute('id'));"></div>
    <div class="arrowRight" onclick="showLight(this.getAttribute('id'));"></div>
</section>
