<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\SignupForm $model */
/** @var ActiveForm $form */
?>
<div class="site-signup">

    <?php $form = ActiveForm::begin(['id'=>'form-signup']); ?>

    	<?= $form->field($model, 'username')->textInput()->label('Логин')?>
        <?= $form->field($model, 'password')->passwordInput()->label('Пароль')?>
        <?= $form->field($model, 'password_repeat')->passwordInput()->label('Повторите пароль')?>
        <div class="form-group">
            <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-signup -->