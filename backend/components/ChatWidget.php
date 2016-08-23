<?php

namespace backend\components;

use yii\base\Widget;
use yii\helpers\Html;
use backend\models\User;

class ChatWidget extends Widget
{
    public function init()
    {
        parent::init();
        
         \Yii::$app->i18n->translations['app*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en-US',
            'basePath' => '@common/messages',
            'fileMap' => [
                'app' => 'app.php'
            ],
        ];
    }

    public function run()
    {
		$users = User::find()
					->with('userInfo')
					->where(['status' => 1])
					->all();
		
        return $this->render('chat', [
			'users' => $users
        ]);
    }
}
