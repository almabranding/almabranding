<div id="thumbWrap">
    <ul>
    <? foreach ($this->projects as $key=>$value) { $col='col-'.($key%4); ?><li class="thumbBox <?=$col?>">
        <a href="<?=URL.'page/gallery/'.$value['project_id'].'-'.urlencode($value['name']);?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><li class="thumbBox">
            <a href="<?=URL.'page/gallery/'.$value['url'];?>">
                <img alt="<?= $value['caption_' . LANG]; ?>" src="<?=  UPLOAD . 'images/' . Model::idToRute($value['photo_id']) . 'med_' . $value['file_name']; ?>"/>
            </a>
            <img src="/public/img/thumbBox.png"/>
        </li><? } ?>
    </ul>
</div>