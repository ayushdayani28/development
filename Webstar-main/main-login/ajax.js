
$(document).ready(function()
{
$("#post").click(
function()
{
	var content= $("#content").val();
	if(content==='')
	{  alert("Field is empty");}
else
	$.ajax(
	
	{
		url: "logged-in/timeline_ajax.php",
		type: "POST",
		async: true,
		data: {
			"content": content
		},
				
		success: function(data){
			
			document.getElementById('content').value = '';
			$( "#timeline" ).load("logged-in/shared_timeline.php" );
		}
	}
	
	
	);	
}

)	;
$( "#timeline" ).load("logged-in/shared_timeline.php" );
});

setInterval(function() {


 $.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
    data: {"not_request":'1'},	
		success: function(data){
			if(data!='0'){
	
		 $("#request").html(data);	
			}
	}});
 
 $.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"not_not":'1'},	
		success: function(data){
		if(data!='0')
		{ 
				
		 $( "#bell" ).html(data);	
		}
	}});	
	 $.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"not_msg":'1'},	
		success: function(data){
		if(data!='0')
		{ 
				
		 $( "#msg" ).html(data);	
		}
	}});	 
 },7000);
 
$(document).ready(setInterval(function()
{
	 $( "#timeline" ).load("logged-in/shared_timeline.php" );
},30000));
	$(document).ready(setInterval( 
	
	
	function(){
			var refer='1';
		
			$.ajax(
	
	{
		url: "chat_session.php",
		type: "POST",
		async: true,
		data: {"online_status_update": refer
		},	success: function(data){}}
	);
	},3000));	
function count_appreciate(post_id)
{
$.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"get_post_id": post_id},	
		success: function(data){
			p_id="'"+post_id+"'";
			
			$("#"+post_id+"count").replaceWith('<span id="'+post_id+'count">appreciated by '+data+'</span>');
					}});}
function comment_load(post_id)
{

$.ajax({
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"load_comment": post_id},	
		success: function(data){$("#"+post_id+"-comment-modal-body").append(data);}});}
function like(post_id)
{$.ajax({url: "main-login/like_ajax.php",type: "POST",async: true,data: {"add_post_id": post_id},	
		success: function(data){
			p_id="'"+post_id+"'";
			count_appreciate(post_id);
		
			$("#"+post_id).replaceWith('<button id="'+post_id+'" class="btn btn-info" onclick="unlike('+p_id+');"><font color="red"><span class="glyphicon glyphicon-heart"></span></button>');
	}});
}
function unlike(post_id)
{
	
$.ajax({
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"remove_post_id": post_id},	
		success: function(data){
			p_id="'"+post_id+"'";
			count_appreciate(post_id);
		$("#"+post_id).replaceWith('<button id="'+post_id+'" class="btn btn-info" onclick="like('+p_id+');"><font color="white"><span class="glyphicon glyphicon-heart"></span></button>');
					}
	}
	
	
	);
}


function load_liker(post_id)
{

$.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"load_liker":post_id},	
		success: function(data){
			$("#"+post_id+"-modal-body").replaceWith(data);
			
	}
	}
	
	
	);
}
function comment_insert(post_id)
{
var comment = $("#"+post_id+"comment_content").val();
$.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"comment_post_id":post_id,"comment":comment},	
		success: function(data){
			$("#comment-append-"+post_id).prepend(data);
					}
	}
	
	
	);
}
function delete_comment(comment_id)
{
$.ajax(
	
	{
		url: "main-login/like_ajax.php",
		type: "POST",
		async: true,
		data: {"comment_id":comment_id},	
		success: function(data){}});}
function circle(id)
{
var ops= $("#"+id+"-ops").val();	
var to= $("#"+id+"-to").val();	
	
	$.ajax(
	
	{
		url: "logged-in/add-friend1.php",
		type: "POST",
		async: true,
		data: {"to":to,"ops":ops},	
		success: function(data){
		if	(ops=='request')
{$('#'+id+'-div_id').replaceWith("<font color='red'>Request Sent</font>");}
if(ops=='cancel')
{$('#'+id+'-div_id').replaceWith("<font color='red'>Request canceled</font>");}
if(ops=='accept')
{$('#'+id+'-div_id').replaceWith("<font color='red'>Added in our circle</font>");}
if(ops=='remove')
{$('#'+id+'-div_id').replaceWith("<font color='red'>Removed from circle</font>");}
	}
  }	);
	
	
}