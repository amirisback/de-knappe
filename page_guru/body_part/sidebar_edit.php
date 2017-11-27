<?php 
echo '
		<ul class="sidebar">
		  <li><a href="#">0</a></li>
		  <li><a href="../profil_guru.php"><i class="flaticon-id-card-4"></i> &nbsp PROFIL GURU</a></li>
          <li><a href="../set_remedi.php"><i class="flaticon-paper-plane"></i> &nbsp SET REMEDI</a></li>
		  <li><a href="../siswa.php"><i class="flaticon-users-1"></i> &nbsp SISWA</a></li>
          <li><a href="../soal.php"><i class="flaticon-edit-1"></i> &nbsp SOAL</a></li>
          <li><a href="../nilai.php"><i class="flaticon-notepad-2"></i> &nbsp NILAI</a></li>
';

echo"

				<div class='time'>
					<center>
					<div>
						<div>
							<script type='text/javascript'>								
								var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
								var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
								var date = new Date();
								var day = date.getDate();
								var month = date.getMonth();
								var thisDay = date.getDay(),
									thisDay = myDays[thisDay];
								var yy = date.getYear();
								var year = (yy < 1000) ? yy + 1900 : yy;
								document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
							</script>
						</div>";
echo'
						<div id="clock"></div>
							<script type="text/javascript">
								function showTime() {
									var a_p = "";
									var today = new Date();
									var curr_hour = today.getHours();
									var curr_minute = today.getMinutes();
									var curr_second = today.getSeconds();
									curr_hour = checkTime(curr_hour);
									curr_minute = checkTime(curr_minute);
									curr_second = checkTime(curr_second);
								document.getElementById("clock").innerHTML=curr_hour + " : " + curr_minute + " : " + curr_second + " " + a_p;
									}
                

								function checkTime(i) {
									if (i < 10) {
										i = "0" + i;
									}
									return i;
								}
								setInterval(showTime, 500);
							</script>
						</div>	
					</center>
				</div>
		</ul>
';


?>