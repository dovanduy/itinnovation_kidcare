<?php
/**
 * Created by IntelliJ IDEA.
 * User: Dennis Eikelenboom
 * Date: 16-6-2015
 * Time: 12:51
 */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<h1>Filters: add keyword</h1>
<?php $form = ActiveForm::begin([
    'id' => 'settings-form',
    'fieldConfig' => [
        'template' => "<label>{label}</label>{input}<div>{error}</div>",
    ],
]); ?>

    <fieldset>
        <?= $form->field($filter, 'keyword') ?>
        <?= $form->field($filter, 'alerttype')->dropDownList(['mail' => 'mail','phone' => 'phone','mail+phone' => 'mail+phone','none' => 'none']) ?>
    </fieldset>

    <div class="pull-left">
        <?= Html::submitButton('Create filter', ['class' => 'btn btn-primary', 'name' => 'save-settings-button']) ?>
    </div>

<?php ActiveForm::end(); ?>