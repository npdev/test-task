<?php
class ChatForm extends CFormModel
{
				public $text;
				
				public function rules(){
								return array(
												array('text', 'required'),
												array('text', 'length', 'max'=>100),
								);
				}
}
?>
