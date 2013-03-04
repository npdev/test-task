<?php
class ChatController extends Controller
{
				public function actionIndex(){
								echo "Hello";
				}

				public function actionSendMessage(){
								//var_dump(Yii::app()->getRequest());die();
								$request = Yii::app()->request;//->getPost('text');
								if(!$request->isAjaxRequest){
												throw new CHttpException(404);
								}
								$message = Yii::app()->request->getPost('message');
								echo CJSON::encode(array("message" => $message));
				}
}
?>
