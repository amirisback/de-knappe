$(document).ready(function() {
		var detik = 30;
		var menit = 2;
		var jam 	= 0;
	function hitung() {
		setTimeout(hitung,1000);
		if(menit < 10 && jam == 0){
				var peringatan = 'style="color:red"';
		};
		$('#timer').html(
				'<h1 align="center"'+peringatan+'>Sisa waktu anda <br />' + jam + ' jam : ' + menit + ' menit : ' + detik + ' detik</h1><hr>'
		);
		detik --;
		if(detik < 0) {
			detik = 59;
			menit --;
			if(menit < 0) {
				menit = 59;
				jam --;
				if(jam < 0) {                                                                 
					clearInterval();  
				} 
			} 
		} 
	}           
	hitung();
}); 