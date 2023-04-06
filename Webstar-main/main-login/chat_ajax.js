	


function scrollSmoothToBottom (id) {
   var div = document.getElementById(id);
   $('#' + id).animate({
      scrollTop: div.scrollHeight - div.clientHeight
   }, 500);
}


	$(document).ready(function(){
				var refer=$("#refer").val();
			$.ajax(
		
	
	{
		url: "chat_session.php",
		type: "POST",
		async: true,
		data: {"msg_id": refer
		},	
		success: function(data){
		$("#msgarea").html(data);
		scrollSmoothToBottom("msgarea");
		}});}
);


	
	$(document).ready(setInterval( 
	
	
	function(){
			var refer='1';
		
			$.ajax(
	
	{
		url: "chat_session.php",
		type: "POST",
		async: true,
		data: {"online_status_update": refer
		},	
		success: function(data){}
	}
	);
	},3000));	
	
	
	$(document).ready(setInterval( 
	function(){
			var refer='1';
		
			$.ajax(
	{
		url: "chat_session.php",
		type: "POST",
		async: true,
		data: {"online_friend_list": refer
		},	
		success: function(data){
			$("#online_status").html(data);
		
		}
	}
	);
	},3000));
	
	
	$(document).ready(setInterval( 
	
	
	function(){
			var refer=$("#refer").val();
		
			$.ajax(
	
	{
		url: "chat_session.php",
		type: "POST",
		async: true,
		data: {"msg_id": refer},	
		success: function(data){
		$("#msgarea").html(data);
}});},3000)
);

function msg_send()
{
	var refer=$("#refer").val();
	var chat_content=$("#chat_content").val();
	$.ajax(
	{
		url: "chat_session.php",
		type: "POST",
		async: true,
		data: {"msg_id": refer,
		"msg_content": chat_content
		},	
		success: function(data){
				document.getElementById("chat_content").value =" ";
		$("#msgarea").html(data);
		scrollSmoothToBottom("msgarea");
		}});

	
}
	
