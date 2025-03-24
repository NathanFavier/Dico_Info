
function getDef(){
	
	// clearing previous query content
	const masterDiv = document.getElementById("query_content");
	while (masterDiv.firstChild) {
		masterDiv.removeChild(masterDiv.firstChild);
	}
	
	// get selected filter
	var filter = document.getElementById("filters").value;
	
	// get data.json content
	fetch(new Request("data.json"))
	.then((response) => response.json())
	.then((data) => {
		for (var def_info of data.data){
			if (def_info.tags.indexOf(filter) >= 0 || filter == "Aucun"){
				placeDef(def_info);				
			}
		}
	})
	.catch(console.error);
}

async function placeDef(def_info){
	
	// local div for the definition
	const div = document.createElement("div");
	div.setAttribute("class","def_box");
	
	
	// create element for the definition
	var def_exp = document.createElement("h3");
	def_exp.setAttribute("class","expression");
	def_exp.textContent = def_info.expression;
	div.appendChild(def_exp);
	
	var def = document.createElement("div");
	def.setAttribute("class","def");
	def.textContent = def_info.definition;
	div.appendChild(def);
	
	// append content to the page
	document.getElementById("query_content").appendChild(div);
}

async function addFilter(){
	// get selected filter
	var filter = document.getElementById("filters").value;
	
	if (!(getCurrentFilters().indexOf(filter) >= 0)){
		document.getElementById("add_filters_list").textContent += "   " + filter;
	}
	document.getElementById("hidden_filters_list").value = document.getElementById("add_filters_list").innerHTML;
}

async function rmFilter(){
	// get selected filter
	var filter = document.getElementById("filters").value;
	var filterList = getCurrentFilters();
	console.log(filterList);
	
	if (filterList.indexOf(filter) >= 0){
		document.getElementById("add_filters_list").textContent = "";
		for (var filt of filterList){
			if (filt != filter){
				document.getElementById("add_filters_list").textContent += "   " + filt;
			}
		}
	}
	document.getElementById("hidden_filters_list").value = document.getElementById("add_filters_list").innerHTML;
}

function getCurrentFilters(){
	return document.getElementById("add_filters_list").innerHTML.split("   ");
}