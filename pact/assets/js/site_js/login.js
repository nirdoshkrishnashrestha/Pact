// JavaScript Document
$(function(){	
	$('#loginBtn').click(function(){		
		if($("#loginform").valid())	
		{	
			$(this).val('Checking Login...');
			e = $(this);
			$.ajax({
				type: "POST",
				url: base_url+'admin/login/checkuser/true',
				data: $('#loginform').serialize(),
				success: function (msg) {
					if(msg.replace(/^\s+|\s+/,"")=='home')
					{
						window.location=msg;
					}
					else
					{										
						$('#message').show();
						$('#loginform').addClass('error');
						e.val('Login');
					}
					
				}
			});
		}
		else
		{
			$('#message').show();
			$('#loginform').addClass('error');	
		}
		return false;
	});
});