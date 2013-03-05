<div id="chat_window">
				<div id="toggle">&gt;</div>
				<div id="chat_form">
								<?php echo CHtml::form('chat/chat/sendMessage', 'post'); ?>
								<?php echo CHtml::textArea('output', '', array('id'=>'output', 'cols'=>60, 'rows'=>20, 'disabled'=>'disabled' ,'style'=>'resize:none')) ?>

								<?php echo CHtml::activeTextField($model, 'text', array('id'=>'text', 'size'=>46, 'maxlength'=>100)) ?>

								<?php echo CHtml::ajaxSubmitButton('Send', 'chat/chat/sendMessage', array(
												'dataType'=>'json',
												'type'=>'post',
												'data'=>array('message'=> "js:$('#text').val()"),
												'success'=>"js: function(data){
																				if(typeof(data.error) == 'String'){
																								$('#output').val(data.error);
																								return false;
																				}
																				$('#output').val($('#output').val() + '['+ data.time +']' + data.userName + ': ' + data.message + '\\n');
																				$('#text').val('');
																}"
								)); ?>

								<?php echo CHtml::endForm(); ?>
					</div>
</div>