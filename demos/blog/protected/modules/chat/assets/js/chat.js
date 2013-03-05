$(document).ready(function(){
				function chatUpdate(){
								$.ajax({
												url: 'chat/chat/getMessages',
												type: 'post',
												dataType: 'json',
												success: function(data){
																var output = "";
																$('#output').val('');
																for(key in data.output){
																				output += '[' + data.output[key]['date'] + ']' + data.output[key]['user'] + ': ' + data.output[key]['text'] + '\n';
																}
																$('#output').val($('#output').val() + output);// ! instead of .append()
												}
								});
				}
				chatUpdate();
				setInterval(chatUpdate, 5000);
				var clickBlock = 0;
				$('#chat_window #toggle').click(function(){
								if(clickBlock == 0){
												$('#toggle').html('<');
												$('#chat_window').animate({right: '-' + ($('#chat_form').width() - 200) + 'px' }, 200, function(){
																$('#chat_window').css('background','none');
																$('#chat_form').hide();
												});
												clickBlock = 1;
												return false;
								}
								if(clickBlock == 1){
												$('#toggle').html('>');
												$('#chat_window').animate({right: + 200 + 'px' }, 200)
												$('#chat_window').css('background-color','#DDD');
												$('#chat_form').show();
												clickBlock = 0;
												return false;
								}
				});
});