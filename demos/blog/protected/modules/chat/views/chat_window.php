<div id="chat_window">
				CHAT WINDOW
				
				<?php $form=$this->beginWidget('CActiveForm', array('action'=>'chat')); ?>

				<?php echo $form->errorSummary($model); ?>

				<div class="row submit">
								<?php echo $form->label($model,'Enter your message: '); ?>
								<?php echo $form->textArea($model,'text', array('cols'=>32, 'rows'=>2, 'maxlength'=>100, 'style'=>'resize:none')) ?>
				</div>
				<div class="row submit">
								<?php echo CHtml::ajaxSubmitButton('Send', 'chat'); ?>
				</div>

				<?php $this->endWidget(); ?>
</div>