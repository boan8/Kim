
function edit(id,name,t_id){
		document.body.style.padding  = "0px 0px 0px 0px";
		document.getElementById("name_input").value = name;
		document.getElementById("id_input").value = id;
		document.getElementById("name").innerHTML = name;
		
		var disabled_dates = "";
		
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("tbody").innerHTML = xmlhttp.responseText;
			}
		};
		xmlhttp.open("GET", "lib/getData.php?id="+id+"&t_id="+t_id, true);
		xmlhttp.send();
}