<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>

<h1>Settings</h1>
<div class="row">
    <div class="col-md-8">
        <?php $form = ActiveForm::begin([
            'id' => 'settings-form',
            'fieldConfig' => [
                'template' => "<label>{label}</label>{input}<div>{error}</div>",
            ],
        ]); ?>

        <fieldset>
            <legend>Device</legend>
            <?= $form->field($user, 'deviceid')->textInput(['readOnly' => true]) ?>
        </fieldset>
        <fieldset>
            <legend>User Settings</legend>
            <?= $form->field($user, 'firstname') ?>
            <?= $form->field($user, 'lastname') ?>
            <?= $form->field($user, 'childsname') ?>
            <?= $form->field($user, 'email') ?>
            <?= $form->field($user, 'phonenumber') ?>
        </fieldset>

        <fieldset>
            <legend>Notifications</legend>
            <?= $form->field($user, 'email_notifications')->checkbox() ?>
            <?= $form->field($user, 'phone_notifications')->checkbox() ?>
        </fieldset>

    <div class="form-group">
        <div>
            <div class="pull-left">
            <?= Html::submitButton('Save my preferences', ['class' => 'btn btn-primary', 'name' => 'save-settings-button']) ?>
            </div>

            <div class="pull-right">
                <input type="submit" disabled value="Delete all data" class="btn btn-warning" />
                <input type="submit" disabled value="Delete my account" class="btn btn-danger" />
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
    <div class="col-md-4">
        <div class="well">
            <h4>Note:</h4>
            On this page you can set your preferences. If you would like to receive notifications on your
            email address and phone based on your child's behaviour, then make sure you provide a correct email
            address and phone number and turn off notifications.
        </div>
    </div>
</div>