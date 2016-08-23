<?php
use yii\helpers\Html;
?>
<?php if (isset($messages)): ?>
<ul class="chat">
<?php foreach($messages as $message): ?>
    <?php if (Yii::$app->user->id == $message->sender_id): ?>
    <?php echo ($message->status ? '<li class="chat_msg_user"><span class="chat_msg_status_ico glyphicon glyphicon-envelope"></span>' : '<li class="chat_msg_user_unread"><span class="chat_msg_status_ico glyphicon glyphicon-send"></span>') ?>
	<?php echo '<span class="glyphicon glyphicon-user"></span> '.Yii::t('app','Me').':<br />'; ?>
    <?php else: ?>
    <li class="chat_msg_opponent">
	<?php if (isset($user)) echo '<span class="glyphicon glyphicon-user"></span> '.$user->displayName().':<br />'; ?>
    <?php endif; ?>
    
    <?php echo nl2br(Html::encode($message->msg)); ?>
    <!--<span class="delete_chat_msg">x</span>-->
    </li>
<?php endforeach; ?>
</ul>
<?php endif; ?>
