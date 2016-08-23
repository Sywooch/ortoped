(function($){
	$(document).ready(function(){
		draggable.dragging = null;
		draggable.dragX = 0;
		draggable.dragY = 0;
		draggable.chatX = 0;
		draggable.chatY = 0;
		draggable('#chat_header','#chat_block');
		loadMessages.id = 0;
		loadMessages.locked = false;
		loadMessages.timer = false;
		loadMessages.interval = 10000;
		loadMessages.cache = []
		informer.timer = false;
		informer.interval = 30000;
		
		$('#chat_trigger').click(showChat);
		$('#chat_block #chat_close_btn').click(hideChat);
		$('#chat_block .chat_user_selector').click(function(){
			if (loadMessages.locked) return;
			$('#chat_block .chat_user_selector').removeClass('active');
			$(this).addClass('active');
			loadMessages(true);
		});
		$('#chat_block #send_msg').click(function(){
			sendMessage();
		});
		$('#chat_block #chat_msgtext').keyup(function(e){
			if (e.keyCode == 13 && e.ctrlKey) {
				sendMessage();
			}
		});

		startInformerTimer();
	});
	
	function draggable(draggable_selector, container_selector) {
		$(draggable_selector).addClass('is_draggable');
		$(draggable_selector).mousedown(function(e){
			if (typeof e.button != "undefined" && e.button == 0) {
				draggable.dragging = $(container_selector);
				draggable.dragX = e.pageX;
				draggable.dragY = e.pageY;
				draggable.chatX = $(container_selector).offset().left - $(window).scrollLeft();
				draggable.chatY = $(container_selector).offset().top - $(window).scrollTop();
				$(container_selector).addClass('chat_is_dragging');
			}
		});
		$('body').mouseup(function(e){
			if (draggable.dragging) {
				$(draggable.dragging).removeClass('chat_is_dragging');
				draggable.dragging = null;
			}
		});
		$('body').mouseleave(function(){
			if (draggable.dragging) {
				$(draggable.dragging).trigger('mouseup');
			}
		});
		$('body').mousemove(function(e){
			if (draggable.dragging) {
				var dx = e.pageX - draggable.dragX;
				var dy = e.pageY - draggable.dragY;
				var x = draggable.chatX + dx;
				var y = draggable.chatY + dy;
				if (x<0 || y<0) return;
				if (x+$(draggable.dragging).outerWidth() > $(window).width()) return;
				if (y+$(draggable.dragging).outerHeight() > $(window).height()) return;
				$(draggable.dragging).css({
					'left': x,
					'top': y,
					'bottom': 'auto'
				});
			}
		});
	}
	
	function showChat() {
		startLoadTimer();
		$('#chat_trigger').hide();
		$('#chat_block').show();
		$('#chat_block').animate({
			'left': 10,
			'bottom': 0
		},100);
	}
	
	function hideChat() {
		stopLoadTimer();
		$('#chat_trigger').show();
		$('#chat_block').animate({
			'left': 10,
			'top': $(window).height()
		},100, function(){
			$('#chat_block').css({
				'left': 10,
				'bottom': -$('#chat_block').height(),
				'top': 'auto'
			}).hide();
		});
	}
	
	function loadMessages(lock) {
		if (typeof lock == "undefined") lock = false;
		if(loadMessages.locked) return;
		var active = $('#chat_block .chat_user_selector.active');
		if ($(active).length==1) {
			var url = $('#chat_block').data('load_url');
			var id = $(active).data('id');
			if (typeof id == "undefined" || typeof url == "undefined") return;
			loadMessages.id = id;
			if (lock) {
				if (typeof loadMessages.cache[id] != "undefined" && loadMessages.cache[id]) {
					loadMessages.cache[id].scroll = true;
					updateMessages(loadMessages.cache[id], false);
					return;
				}
				loadMessages.locked = true;
				$('#chat_block').addClass('locked');
			}
			
			$.post(url, {
				'id': id,
				'scroll': lock ? 1 : 0,
				'format': 'json'
			}, function(response){
				updateMessages(response, true);
			},'json').fail(function(){
				loadMessages.locked = false;
				$('#chat_block').removeClass('locked');
				//TODO: show error
			});
		}
	}
	
	function updateMessages(response, save) {
		if (typeof save == "undefined") save = false;
		if (response &&
			typeof response.id != "undefined" &&
			typeof response.messages != "undefined" &&
			response.id==loadMessages.id
		) {
			if (response.messages.length>0) {
				$('#chat_block #chat_msg').html(response.messages);
			}
			if (typeof response.scroll != "undefined" && response.scroll) {
				$('#chat_block #chat_msg').animate({'scrollTop': $('#chat_block #chat_msg').get(0).scrollHeight}, 400);
			}
			$('#chat_block #chat_user .chat_user_selector[data-id="'+response.id+'"] .unread-co').remove();
			if (save) {
				loadMessages.cache[loadMessages.id] = response;
			}
		}
		loadMessages.locked = false;
		$('#chat_block').removeClass('locked');
	}

	function startLoadTimer() {
		stopLoadTimer();
		loadMessages.timer = window.setInterval(loadMessages, loadMessages.interval);
		loadMessages();
	}

	function stopLoadTimer() {
		try {
			window.clearInterval(loadMessages.timer);
		} catch(e) {}
	}

	function startInformerTimer() {
		stopInformerTimer();
		informer.timer = window.setInterval(informer, informer.interval);
		informer();
	}

	function stopInformerTimer() {
		try {
			window.clearInterval(informer.timer);
		} catch(e) {}
	}

	function sendMessage() {
		if(loadMessages.locked) return;
		var active = $('#chat_block .chat_user_selector.active');
		if ($(active).length==1) {
			var url = $('#chat_block').data('send_url');
			var id = $(active).data('id');
			var text = $('#chat_block #chat_msgtext').val();
			if (typeof id == "undefined" || typeof url == "undefined" || text.length==0) return;
			loadMessages.locked = id;
			$('#chat_block').addClass('locked');
			$.post(url, {
				'id': id,
				'text': text,
				'format': 'json'
			}, function(response){
				if (response &&
						typeof response.id != "undefined" &&
						typeof response.messages != "undefined" &&
						response.id==loadMessages.locked
				) {
					$('#chat_block #chat_msg').html(response.messages);
				}
				if (response && typeof response.error != "undefined" && response.error) {
					alert(response.error);
				}
				loadMessages.locked = false;
				$('#chat_block').removeClass('locked');
				$('#chat_block #chat_msg').animate({'scrollTop': $('#chat_block #chat_msg').get(0).scrollHeight}, 400);
				loadMessages.cache[loadMessages.id] = response;
			},'json').fail(function(){
				loadMessages.locked = false;
				$('#chat_block').removeClass('locked');
				//TODO: show error
			});
			$('#chat_block #chat_msgtext').val('');
		}
	}

	function informer() {
		var url = $('#chat_block').data('inform_url');
		if (typeof url == "undefined") return;
		$.post(url, {
			'format': 'json'
		}, function(response){
			$('#chat_block #chat_user .chat_user_selector .unread-co').remove();
			if (response && typeof response.unread != "undefined") {
				var inform_id = 0;
				for (var sender_id in response.unread) {
					$('#chat_block #chat_user .chat_user_selector[data-id="'+sender_id+'"]').append('<span class="unread-co">'+response.unread[sender_id]+'</span>');
					if (!inform_id) inform_id = sender_id;
					if (typeof loadMessages.cache[sender_id] != "undefined") loadMessages.cache[sender_id] = null;
				}
				if (inform_id && $('#chat_block').css('display')=='none') inform(inform_id);
			}
		},'json').fail(function(){
			//TODO: show error
		});
	}
	
	function inform(sender_id) {
		var sender_item = $('#chat_block #chat_user .chat_user_selector[data-id="'+sender_id+'"]');
		if ($(sender_item).length==0) return;
		$('#chat_block .chat_user_selector').removeClass('active');
		$(sender_item).addClass('active');
		showChat();
	}
})(jQuery);
