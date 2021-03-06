<?php
$this->title = $user['fio'];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary direct-chat direct-chat-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $user['fio'] ?></h3>

                <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="" class="badge bg-light-blue" data-original-title="3 New Messages">3</span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="" data-widget="chat-pane-toggle" data-original-title="Contacts">
                        <i class="fa fa-comments"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow-y: scroll; height: 350px">
                <!-- Conversations are loaded here -->

                <?php if(empty($message)): ?>
                    <h4 class="text-gray text-center">Здесь пока нет сообщение</h4>
                <?php else: ?>
                    <?php foreach ($message as $item): $class = ($item['user_id'] == $uid) ? 'right' : '' ?>
                        <div class="direct-chat-messages <?= $class ?>" style="height: unset!important;">
                            <div class="direct-chat-info clearfix">
                                <span class="direct-chat-name pull-<?= $class ?>"><?= $item['fio'] ?></span>
                                <span class="direct-chat-timestamp pull-<?=$class?>>"><?= date('d.m.Y H:i', $item['created_at'])?></span>
                            </div>
                            <img class="direct-chat-img" src="/uploads/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                            <div class="direct-chat-text">
                                <?= $item['message'] ?>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            <?php if(Yii::$app->user->can('/chat/send-message')): ?>
            <!-- /.box-body -->
            <div class="box-footer">
                <?php $form = \yii\widgets\ActiveForm::begin(['action' => 'send-message']) ?>
                <?php echo $form->field($model, 'chat_id')->hiddenInput(['value' => $chat_id])->label(false) ?>
                <?php echo $form->field($model, 'user_id')->hiddenInput(['value' => $uid])->label(false) ?>
                <?php echo $form->field($model, 'message')->textInput(['class' => 'form-control']) ?>
                <button type="submit" class="btn btn-primary btn-flat">Send</button>
                <?php \yii\widgets\ActiveForm::end() ?>
            </div>
            <!-- /.box-footer-->
            <?php endif; ?>
        </div>
    </div>
</div>
