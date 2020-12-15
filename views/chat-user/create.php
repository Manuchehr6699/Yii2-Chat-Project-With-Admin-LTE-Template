<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ChatUser */

$this->title = 'Create Chat User';
$this->params['breadcrumbs'][] = ['label' => 'Chat Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="chat-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
