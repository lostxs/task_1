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

$currentSectionCode = trim($_SERVER["REQUEST_URI"], $arParams["IBLOCK_URL"]);
?>

<?php if (!empty($arResult["ITEMS"])): ?>
    <div id="barba-wrapper">
        <div class="article-list">
            <?php foreach ($arResult["ITEMS"] as $arItem): ?>
                <?php if ($currentSectionCode === "" || $arItem["SECTIONS_CODES"] == $currentSectionCode): ?>
                    <a
                        class="article-item article-list__item"
                        href="<?= $arItem["DETAIL_PAGE_URL"] ?>"
                        data-anim="anim-3"
                    >
                        <?php if ($arItem["PREVIEW_PICTURE"]["SRC"]): ?>
                            <div class="article-item__background">
                                <img
                                    src="<?= $arItem["PREVIEW_PICTURE"]["SRC"] ?>"
                                    alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>"
                                />
                            </div>
                        <?php endif; ?>

                        <div class="article-item__wrapper">
                            <div class="article-item__title">
                                <?= isset($arItem["NAME"]) ? $arItem["NAME"] : "" ?>
                            </div>
                            <div class="article-item__content">
                                <?= isset($arItem["SECTION_NAME"]) ? $arItem["SECTION_NAME"] : "" ?>
                            </div>
                        </div>
                    </a>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>
