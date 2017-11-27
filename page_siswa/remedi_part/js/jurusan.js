// jurusan
var jenisjurusan;
function jurusan(){
	jenisjurusan = fungsiMapel();
	if (jenisjurusan == null){
		alert("Tidak support request");
		return;
	}
	var url = "remedi_part/jurusan.php";
	jenisjurusan.onreadystatechange = gantijurusan;
	jenisjurusan.open("GET",url,true);
	jenisjurusan.send(null);
}
function gantijurusan(){
	if(jenisjurusan.readyState == 4 || jenisjurusan.readyState == "complete"){
		document.getElementById("jurusan").innerHTML = jenisjurusan.responseText;
	}
}

function fungsiMapel(){
	var jenisjurusan = null;
	try{
		jenisjurusan = new XMLHttpRequest();
	}catch(e){
		try{
			jenisjurusan = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			jenisjurusan = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return jenisjurusan;
}
