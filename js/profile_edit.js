$(document).ready(function(){
	$("#save").hide();
	var click = 0;
	document.getElementById("id_numb").className = "col-md-10";
	document.getElementById("button").className = "col-md-2";	  
	
	
	
	document.getElementById("name").disabled=true;
	document.getElementById("college").disabled=true;
	document.getElementById("dept").disabled=true;
	document.getElementById("contact").disabled=true;
	document.getElementById("email").disabled=true;
	document.getElementById("pos").disabled=true;
	
	$("#edit").click(function(){
		if(click == 0){
		  $("#save").show();
		  document.getElementById("edit").innerHTML="Cancel";
		  document.getElementById("id_numb").className = "col-md-9";
			document.getElementById("button").className = "col-md-3";
			document.getElementById("image").type = "file";
			
			
			document.getElementById("name").disabled=false;
			document.getElementById("college").disabled=false;
			document.getElementById("dept").disabled=false;
			document.getElementById("contact").disabled=false;
			document.getElementById("email").disabled=false;
			document.getElementById("pos").disabled=false;
		  click = 1;
		 } else {
			$("#save").hide();
			document.getElementById("image").type = "hidden";
		  document.getElementById("edit").innerHTML="Edit";
		  document.getElementById("id_numb").className = "col-md-10";
		  document.getElementById("button").className = "col-md-2";
		  
		  
			document.getElementById("name").disabled=true;
			document.getElementById("college").disabled=true;
			document.getElementById("dept").disabled=true;
			document.getElementById("contact").disabled=true;
			document.getElementById("email").disabled=true;
			document.getElementById("pos").disabled=true;
			click = 0;
		 }
	 });
	 
});