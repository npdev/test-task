<?php
class ChatWidget extends CWidget{
				
				public function init()	{
								$baseUrl = Yii::app()->baseUrl;
								$cs = Yii::app()->getClientScript();
								$assetsPath = Yii::app()->getAssetManager()->publish(dirname(__FILE__).'/../'.DIRECTORY_SEPARATOR.'assets');
								$cs->registerCssFile($assetsPath.'/css/chat.css');
								$cs->registerScriptFile($assetsPath.'/js/chat.js');
				}
				
				public function run()	{
								Yii::import("chat.models.*");
								$model = new ChatForm;
								$this->render('chat.views.chat_window', array('model'=>$model));
				}
				
				public static function actions()	{
								return array('chat.'=>'ext.chat.ChatAction');
				}
}
?>
