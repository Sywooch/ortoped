<?php
use backend\assets\ChatAsset;
use yii\helpers\Html;
use yii\helpers\Url;

ChatAsset::register($this);
?>
<div id="chat_trigger">
<?= Yii::t('app','Chat') ?>
<?php if (isset($users)) echo ' ('.count($users).')'; ?>
</div>
<div id="chat_block" data-load_url="<?= Url::to(['chat/index']) ?>" data-send_url="<?= Url::to(['chat/create']) ?>" data-inform_url="<?= Url::to(['chat/inform']) ?>">
	<div id="chat_header">
		<a href="javascript:void(0)" id="chat_close_btn"><span class="glyphicon glyphicon-remove-sign"></span></a>
	</div>
	<div id="chat-body-wrapper">
    <div id="chat_msg">
		<div id="chat-welcome-message"><?= Yii::t('app', 'Select user from contacts') ?></div>
    </div>
    <div id="chat_users">
        <ul id="chat_user" >
            <?php if (isset($users)): ?>
            <?php foreach($users as $user): ?>
            <?php if ($user->id == Yii::$app->user->id) continue; ?>
            <li><a href="javascript:void(0)" class="chat_user_selector" data-id="<?= $user->id ?>"><?= Html::encode($user->displayName()) ?></a></li>
            <?php endforeach; ?>
            <?php endif; ?>
        </ul>
    </div>
    </div>
    <div><?= Yii::t('app','Enter message') ?></div>
    <div id="chat_text">
        <textarea id="chat_msgtext" rows="4"></textarea>
        <button class="btn btn-success" id="send_msg"><?= Yii::t('app', 'Send') ?></button>
    </div>

</div>
