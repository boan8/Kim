function date_modal_XFunction() {
		var x = document.getElementById("dateModalFrom").value;
		document.getElementById("date_From_text").value = x;
	}
function date_modal_YFunction() {
	var x = document.getElementById("dateModalTo").value;
	document.getElementById("dateModalTo_text").value = x;
}

function disableSpecific(){
	document.getElementById("dateModalFrom").disabled=false;
	document.getElementById("dateModalTo").disabled=false;
	document.getElementById("date_From_text").disabled=false;
	document.getElementById("dateModalTo_text").disabled=false;
	
	document.getElementById("date_modal_specific").disabled=true;
	document.getElementById("select_date_modal_button").disabled=true;
}
function disableConsecutive(){
	document.getElementById("dateModalFrom").disabled=true;
	document.getElementById("dateModalTo").disabled=true;
	
	document.getElementById("date_From_text").disabled=true;
	document.getElementById("dateModalTo_text").disabled=true;
	
	document.getElementById("date_modal_specific").disabled=false;
	document.getElementById("select_date_modal_button").disabled=false;
	
}




$(document).ready(function(){
		$("#dateModalTo").change(function(){
			var x = new Date(document.getElementById("dateModalFrom").value);
			var y = new Date(document.getElementById("dateModalTo").value);
			if(x < y ){	
				$("#alert_modal").css("display", "none");
			} else {
				document.getElementById("dateModalTo").value = "";
				$("#alert_modal").css("display", "table-header-group");
				document.getElementById("alert_modal").innerHTML  = "<strong style='color:red'>The end date can not be less then the start date</strong>";
			}
			
		});
	});
	
var selDates_modal="";
function createDates_modal() {    
	 var value = document.getElementById("date_modal_specific").value;
	 if(value != ""){
		 if(selDates_modal != "")
			selDates_modal = selDates_modal +"\n"+ value;
		else
			selDates_modal = value;
		
		document.getElementById("selected_modal_input").value= selDates_modal; 
		
		var tr  = document.createElement("TR");
		document.getElementById("selected_modal_table").appendChild(tr);
		tr.setAttribute("id", value);
		var td = document.createElement("TD");
		var t = document.createTextNode(value);
		td.appendChild(t);
		
		var td2 = document.createElement("TD");
		
		var button = document.createElement("BUTTON");
		button.setAttribute("id", "del");
		button.setAttribute("type", "button");
		button.setAttribute("class", "btn btn-sm btn-danger");
		button.setAttribute("value", value);
		button.setAttribute("onclick", "modal_delRow(this.value)");
		var buttonText = document.createTextNode("Delete");
		button.appendChild(buttonText);
		td2.appendChild(button);
		
	  tr.appendChild(td);
	  tr.appendChild(td2);
  }
}

function modal_delRow(id){
	var val = document.getElementById("selected_modal_input").value;
	var j = 0;
	var str = val.split("\n");
	var newStr = "";
	for(j;j < str.length;j++){
		if(id != str[j]){
			 if(newStr != "")
				newStr = newStr +"\n"+  str[j];
			else
				newStr = str[j];
		} else {
			var parent = document.getElementById("selected_modal_table");
			var child = document.getElementById(id);
			parent.removeChild(child);
		}
	}
	selDates_modal = newStr;
	document.getElementById("selected_modal_input").value= newStr; 
}

function updateTraining(t_id,t_code,title,venue,noh,sonumber){
	document.getElementById("training_id").value = t_id;
	document.getElementById("training_code").value= t_code;
	document.getElementById("title").value= title;
	document.getElementById("venue").value= venue;
	document.getElementById("noh").value= noh;
	document.getElementById("sonumber").value= sonumber;
}


