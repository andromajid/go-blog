function $(id){
	return document.getElementById(id);
}

function hide(id){
	c = $(id);
	b = $(id+'btm');
	c.style.display = 'none';
	b.style.display = 'none';
}
function show(id){
	c = $(id);
	b = $(id+'btm');
	c.style.display = 'block';
	b.style.display = 'block';
}
function tooglemenu(id){
	c = $(id);
	if(c.style.display == 'block' || c.style.display == ''){
		hide(id);
	} else {
		show(id);
	}
}
function hideall(num){
	for(i=1;i<=num;i++){hide('menu'+i)}
}

var globalID = "menu1";
function toogleSubMenu(id){
	tooglemenu(id);
	if(id != globalID){
		hide(globalID);
		globalID = id;
	}
}
