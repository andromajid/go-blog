var activeTab = 'tab1';
function tabMenu(show){
	var a = document.getElementById(show);
	var b = document.getElementById(activeTab);
	
	if(show != activeTab){
		a.style.display = 'block';
		b.style.display = 'none';
		activeTab = show;
	}
	
}