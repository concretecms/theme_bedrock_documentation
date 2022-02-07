<?php
defined('C5_EXECUTE') or die("Access Denied.");
$c = Page::getCurrentPage();
if ($c && $c->isEditMode()) {
    $loc = Localization::getInstance();
    $loc->pushActiveContext(Localization::CONTEXT_UI); ?>
    <div class="ccm-edit-mode-disabled-item"><?=t('Image Slider disabled in edit mode.'); ?></div>
    <?php
    $loc->popActiveContext();
} else {
    ?>

    <div class="owl-carousel owl-theme">
        <?php
        foreach ($rows as $row) { ?>
            <div class="item">
                <?php
                $f = File::getByID($row['fID']); ?>
                <?php if (is_object($f)) { ?>
                    <img class="img-responsive" src="<?=$f->getURL()?>">
                <?php } ?>
            </div>
            <?php
        } ?>

    </div>
    <?php
} ?>
