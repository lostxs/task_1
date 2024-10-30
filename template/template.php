<?php if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
  die();
} ?>

<?php
function renderFormField($question, $answers, $requiredSign, $type = 'text', $id = '')
{
  if (empty($answers) || !isset($answers[0]['ID'], $answers[0]['MESSAGE'])) {
    return '';
  }

  $ans_id = $answers[0]['ID'];
  $input_name = 'form_' . ($type === 'email' ? 'email_' : 'text_') . $ans_id;
  $label_text = $answers[0]['MESSAGE'];
  $required = $question['REQUIRED'] === 'Y' ? $requiredSign : '';
  $requiredAttribute = $question['REQUIRED'] === 'Y' ? 'required' : '';

  return <<<HTML
<div class='input contact-form__input'>
    <label class='input__label' for='{$id}'>
        <div class='input__label-text'>{$label_text}{$required}</div>
        <input class='input__input' type='{$type}' id='{$id}' name='{$input_name}' {$requiredAttribute}>
    </label>
</div>
HTML;
}

function renderTextAreaField($question, $answers, $id = '')
{
  if (empty($answers) || !isset($answers[0]['ID'], $answers[0]['MESSAGE'])) {
    return '';
  }

  $ans_id = $answers[0]['ID'];
  $inp_name = 'form_textarea_' . $ans_id;
  $label_text = $answers[0]['MESSAGE'];

  return <<<HTML
<div class="contact-form__form-message">
    <div class="input">
        <label class="input__label" for="{$id}">
            <div class="input__label-text">{$label_text}</div>
            <textarea class="input__input" id="{$id}" name="{$inp_name}"></textarea>
        </label>
    </div>
</div>
HTML;
}
?>

<div class="contact-form">
    <div class="contact-form__head">
        <div class="contact-form__head-title">
            <?= $arResult['FORM_TITLE'] ?>
        </div>
        <?php if ($arResult['isFormDescription']): ?>
        <div class="contact-form__head-text">
            <?= $arResult['FORM_DESCRIPTION'] ?>
        </div>
        <?php endif; ?>
    </div>
    <form class="contact-form__form" action="<?= POST_FORM_ACTION_URI ?>" method="POST">
        <input type="hidden" name="WEB_FORM_ID" value="<?= $arParams['WEB_FORM_ID'] ?>">
        <input type="hidden" name="web_form_submit" value="Y">
        <?= bitrix_sessid_post() ?>

        <div class="contact-form__form-inputs">
            <?php
            $fields = ['name' => 'text', 'company' => 'text', 'email' => 'email', 'phone' => 'tel'];

            foreach ($fields as $field => $type) {
              if (isset($arResult['arAnswers'][$field])) {
                echo renderFormField(
                  $arResult['arQuestions'][$field],
                  $arResult['arAnswers'][$field],
                  $arResult['REQUIRED_SIGN'],
                  $type,
                  $field
                );
              }
            }
            ?>
        </div>

        <?= isset($arResult['arAnswers']['message'])
          ? renderTextAreaField(
            $arResult['arQuestions']['message'],
            $arResult['arAnswers']['message'],
            'medicine_message'
          )
          : '' ?>

        <?php if ($arResult['isFormErrors'] === 'Y'): ?>
            <h3><?= $arResult['FORM_ERRORS_TEXT'] ?></h3>
        <?php endif; ?>
        
        <div class="contact-form__bottom">
            <div class="contact-form__bottom-policy">
                <?= GetMessage('AGREEMENT_TEXT') ?>
            </div>
            <button type="submit" name="web_form_send" class="form-button contact-form__bottom-button">
                <div class="form-button__title">
                    <?= $arResult['arForm']['BUTTON'] ?>
                </div>
            </button>
        </div>
    </form>
</div>
