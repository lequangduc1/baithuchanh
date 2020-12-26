function menutogle() {
    const newLocal = document.getElementById('menu');
    var e = newLocal;
        if (e.style.display == 'block'){
            e.style.display = 'none';
        }
        else{
            e.style.display = 'block';
        }
}

function opentabs(tabname)
{
	var i;
	var x=document.getElementsByClassName("selection");
	for(i=0;i<x.length;i++)
	{
		x[i].style.display="none";
				
	}
	document.getElementById(tabname).style.display="block";
}