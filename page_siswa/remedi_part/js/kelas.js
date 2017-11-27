// kelas
var kls;
function kelas(){
	kls = fungsiKelas();
	if (kls == null){
		alert("Tidak support request");
		return;
	}
	var url = "remedi_part/kelas.php";
	kls.onreadystatechange = gantikelas;
	kls.open("GET",url,true);
	kls.send(null);
}
function gantikelas(){
	if(kls.readyState == 4 || kls.readyState == "complete"){
		document.getElementById("kelas").innerHTML = kls.responseText;
	}
}

function fungsiKelas(){
	var kls = null;
	try{
		kls = new XMLHttpRequest();
	}catch(e){
		try{
			kls = new ActiveXObject("Msxml2.XMLHTTP");
		}catch(e){
			kls = new ActiveXObject("Microsoft.XMLHTTP");
		}
	}
	return kls;
}