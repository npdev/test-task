<?php
class ChatController extends Controller
{
				public function init(){
								parent::init();
								Yii::import("chat.models.*");
				}
				
				public function actionGetMessages(){
								$request = Yii::app()->request;
								if(!$request->isAjaxRequest){
												throw new CHttpException(404);
								}
								$messages = new Messages;
								$result = $messages->getMessages();
								$output = array();
								$len = count($result);
								foreach	($result as $key=>$value){
												foreach	(array('date','user','text') as $field){
																$output[$key][$field] = $result[$len -1 - $key][$field];
												}
												//$output[$key] = implode('\\n', $output[$key]);
								}
							//var_dump($len, $output); die();
						//		$output = implode('|||',	$output);
								echo CJSON::encode(array(
												"output" => $output,
								));
				}

				public function actionSendMessage(){
								//var_dump(Yii::app()->getRequest());die();
								$request = Yii::app()->request;//->getPost('text');
								if(!$request->isAjaxRequest){
												throw new CHttpException(404);
								}
								$text = htmlspecialchars(Yii::app()->request->getPost('message'));
								$userName = Yii::app()->user->isGuest ? 'Guest' : Yii::app()->user->getName();
								$time = date('Y-m-d H:i:s');
								$messages = new Messages;
								$save = $messages->model()->addMessage($userName, $text);
								if(!empty($save)){
												echo CJSON::encode(array(
																"error" => $save['error'],
												));
												Yii::app()->end();
								}
								echo CJSON::encode(array(
												"message" => $text,
												"userName" => $userName,
												"time" => $time,
												));
				}
}
?>
