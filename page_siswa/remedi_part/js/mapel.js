// mapel
var matapelajran;
function mapel(isi){
	matapelajran = fungsiMapel();
	if (matapelajran == null){
		alert("Tidak support request");
		return;
	}
	var url = "remedi_part/mapel.php";
	url = url+"?jurusan="+isi;
	matapelajran.onreadystatechange = gantimapel;
	matapelajran.open("GET",url,true);
	matapelajran.send(null);
}
function gantimapel(){
	if(matapelajran.readyState == 4 || matapelajran.readyState == "complete"){
		document.getElementById("mapel").innerHTML = matapelajran.responseText;
	}
}

function fungsiMapel(){
	var matapelajran = null;
	try{
		matapelajran = new XMLHttpRequest();
	}catch(e){
		try{
			matapelajran = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			matapelajran = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return matapelajran;
}
