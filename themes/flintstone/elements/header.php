<?php defined('C5_EXECUTE') or die("Access Denied."); ?>
<!DOCTYPE html>
<html lang="<?php echo Localization::activeLanguage() ?>">
<head>
    <?php
    View::element('header_required', [
        'pageTitle' => isset($pageTitle) ? $pageTitle : '',
        'pageDescription' => isset($pageDescription) ? $pageDescription : '',
        'pageMetaKeywords' => isset($pageMetaKeywords) ? $pageMetaKeywords : ''
    ]);
    ?>
    <?=$view->getThemeStyles()?>
</head>
<body>

<div class="<?php echo $c->getPageWrapperClass()?>">

    <?php
    $a = new GlobalArea('Top Navigation');
    $a->display();
    ?>
