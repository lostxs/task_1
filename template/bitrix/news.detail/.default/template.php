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

<?php if (!empty($arResult["ID"])): ?>
	<div class="article-card">
		<div class="article-card__title">
			<?= $arResult["NAME"] ?>
		</div>
		<div class="article-card__content">
			<?php if (is_array($arResult["DETAIL_PICTURE"])): ?>
				<div class="article-card__image sticky">
					<img 
						src="<?= $arResult["DETAIL_PICTURE"]["SRC"] ?>" 
						alt="<?= $arItem["PREVIEW_PICTURE"]["ALT"] ?>" 
						data-object-fit="cover"
					/>
				</div>
			<?php endif; ?>
			<div class="article-card__text">
				<div 
					class="block-content" 
					data-anim="anim-3"
				>
					<?= isset($arResult["DETAIL_TEXT"]) ? $arResult["DETAIL_TEXT"] : "" ?>
				</div>
				<a
					class="article-card__button" 
					href="<?= $arResult["LIST_PAGE_URL"] ?>"
				>
					Вернуться к новостям
				</a>
			</div>
		</div>
	</div>
<?php endif; ?>
