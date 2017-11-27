<?php
echo"
<script>
        $(document).ready(function() {
        var detik = 0;
        var menit = ".$menits.";
        var jam = ".$jams[0].";
        function hitung() {
            setTimeout(hitung,1000);
            $('#timer').html(
                    jam + ' Jam : ' + menit + ' Menit : ' + detik + ' Detik'
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
</script>
";

?>