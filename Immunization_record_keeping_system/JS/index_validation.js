$(document).ready(function() {
$('#submit').click(function() {
// Initializing Variables With Form Element Values
//var uname = $('#uname').val();
//var pass = $('#pass').val();
var email= $("#email").val();
alert(email);

var phoneNumber = /[0-9-()+]{3,20}/; 
var emailRegex = '^[A-Z0-9._%+-]+@[A-Z0-9.-]+.[A-Z]{2,4}?$'; 
var fname= $("#fname").val();
var lname= $("#lname").val();
var gender= $("#gender").val();
var dob= $("#date").val();
var tel= $("#tel").val();
var email= $("#email").val();
var add= $("#add").val();

if (fname.length == 0 ) {
$('#check_fname').html("*Please enter <strong>Firstname</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#fname").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}


else if (lname.length == 0 ) {
$('#check_lname').html("*Please enter <strong>Lastname</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#lname").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}

 else if ($('input[name=gender]:checked').length == 0 ) {
$('#check_gender').html("*Please Select <strong>Gender</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#gender").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}



 else if (dob.length == 0 ) {
$('#check_dob').html("*Please enter the <strong>Date of birth</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#date").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}

 else if ((tel.length < 10) || (!phoneNumber.test(tel))) {
$('#check_tel').html("*Please enter a valid <strong>Telephone Number</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#tel").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}

else if ((email.length == 0)  || (!emailRegex.match(email))) {
$('#check_email').html("*Please enter a valid <strong>Email</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#email").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}



 if (add.length == 0 ) {
$('#check_add').html("*Please enter an <strong>address</strong>"); // This Segment Displays The Validation Rule For All Fields
$("#add").focus(); 

//$("#uname").change(function(){ $('#check_both').hide();
//});
return false;
}

});

/*
$("#registration").validate({
//specify the validation rules
rules: {
fname: "required",
lname: "required",
email: {
required: true,
email: true //email is required AND must be in the form of a valid email address
},
password: {
required: true,
minlength: 6
}
},
 
//specify validation error messages
messages: {
fname: "First Name field cannot be blank!",
lname: "Last Name field cannot be blank!",
password: {
required: "Password field cannot be blank!",
minlength: "Your password must be at least 6 characters long"
},
email: "Please enter a valid email address"
},
 
submitHandler: function(form){
form.submit();
}
 
});
*/
});