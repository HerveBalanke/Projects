 $(document).ready(function (){
				$('#submit').click(function (){
				var uname pass;
				uname= $('#uname').val();
				pass= $('#pass').val();
				
				var alert1="<div class='alert alert-warning'> * All fields are <strong>Required</strong> </div>"
				if(uname==''){
				$('check_both').val(alert1);
				}
				
				});
				});