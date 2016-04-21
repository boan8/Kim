$(document).ready(function(){
		$("#datey").change(function(){
			var x = new Date(document.getElementById("datex").value);
			var y = new Date(document.getElementById("datey").value);
			if(x < y ){	
				$("#alert").css("display", "none");
			} else {
				document.getElementById("datey").value = "";
				$("#alert").css("display", "table-header-group");
				document.getElementById("alert").innerHTML  = "<strong style='color:red'>The end date can not be less then the start date</strong>";
			}
			
		});
	});
	
var selDates="";
function createDates() {   
	 var value = document.getElementById("datez").value;
	  if(value != ""){
		 if(selDates != "")
			selDates = selDates +"\n"+ value;
		else
			selDates = value;
		
		document.getElementById("selectedDinput").value= selDates; 
		
		var tr  = document.createElement("TR");
		document.getElementById("selectedDatesTable").appendChild(tr);
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
		button.setAttribute("onclick", "delRow(this.value)");
		var buttonText = document.createTextNode("Delete");
		button.appendChild(buttonText);
		td2.appendChild(button);
		
	  tr.appendChild(td);
	  tr.appendChild(td2);
	 }
}

function delRow(id){
	var val = document.getElementById("selectedDinput").value;
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
			var parent = document.getElementById("selectedDatesTable");
			var child = document.getElementById(id);
			parent.removeChild(child);
		}
	}
	selDates = newStr;
	document.getElementById("selectedDinput").value= newStr; 
}


