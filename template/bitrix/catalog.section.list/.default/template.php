<?php 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<?php if (!empty($arResult["SECTIONS"])): ?>
    <div class="section-list-wrapper">
        <div class="section-list-menu brand-filter">
            <?php foreach ($arResult["SECTIONS"] as $section): ?>
                <a href="<?= $section["CODE"] ?>">
                    <?= $section["NAME"] ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
