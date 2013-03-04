<div id="chat_window">
				CHAT WINDOW
				
				<?php echo CHtml::form('chat/chat/sendMessage', 'post'); ?>
				<?php echo CHtml::textArea('output', '', array('id'=>'output', 'cols'=>32, 'rows'=>6, 'disabled'=>'disabled' ,'style'=>'resize:none')) ?>

				<?php echo CHtml::activeTextArea($model, 'text', array('id'=>'text', 'cols'=>32, 'maxlength'=>100, 'style'=>'resize:none')) ?>

				<?php echo CHtml::ajaxSubmitButton('Send', 'chat/chat/sendMessage', array(
								'dataType'=>'json',
								'type'=>'post',
								'data'=>array('message'=> "js:$('#text').val()"),
								'success'=>"js: function(data){
																$('#output').append(data.message);
												}"
				)); ?>

				<?php echo CHtml::endForm(); ?>
</div>