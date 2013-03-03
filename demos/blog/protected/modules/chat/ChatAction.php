<?php
class ChatAction extends CAction
{
				public function run(){
								echo "ChatAction";
								die();
								Yii::app()->end();
								/*		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
										{
																		echo CActiveForm::validate($model);
																		Yii::app()->end();
										}*/

										// collect user input data
							/*	if(isset($_POST['ChatForm']))
								{
												$model->attributes=$_POST['LoginForm'];
												if(!$model->validate()){
																echo "Validate crash";
																Yii::app()->end();
												}
								}*/
				}
}
?>
