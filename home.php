<?php
    if(strpos($_SERVER['REQUEST_URI'],"pages")){
        exit(header("Location:../index.php"));
    }

    $besok                  = date("Y-m-d", strtotime("+1 day"));
    $thnbesok               = substr($besok,0,4);
    $blnbesok               = substr($besok,5,2);
    $tglbesok               = substr($besok,8,2);
?>
<section id="home" class="slider" data-stellar-background-ratio="0.5">
      <div class="container">
           <div class="row">
                 <div class="owl-carousel owl-theme">
                      <div class="item item-first">
                           <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                     <h3>PELAYANAN KAMI SAHABAT KESEHATAN ANDA</h3>
                                     <h1>Hidup Sehat</h1>
                                     <a href="#team" class="section-btn btn btn-default smoothScroll">Temui Dokter Kami</a>
                                </div>
                           </div>
                      </div>
                      <div class="item item-second">
                           <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                     <h3>Kami usahakan yang terbaik untuk Anda</h3>
                                     <h1>Jadikan Kami Sahabat Anda</h1>
                                     <a href="#about" class="section-btn btn btn-default btn-gray smoothScroll">Lebih Banyak Tentang Kami</a>
                                </div>
                           </div>
                      </div>
                      <div class="item item-third">
                           <div class="caption">
                                <div class="col-md-offset-1 col-md-10">
                                     <h3>Jangan sampai waktu anda bersama keluarga menjadi terganggu</h3>
                                     <h1>Manfaatkan Kesehatan Anda</h1>
                                     <a href="#news" class="section-btn btn btn-default btn-blue smoothScroll">Lihat Jadwal Dokter</a>
                                </div>
                           </div>
                      </div>
                 </div>
           </div>
      </div>
 </section>

 <!-- ABOUT -->
 <section id="about">
      <div class="container">
           <div class="row">
                <div class="col-md-6 col-sm-6">
                     <div class="about-info">
                          <h2 class="wow fadeInUp" data-wow-delay="0.6s"></h2>
                          <div class="wow fadeInUp" data-wow-delay="0.8s">
                              <p> <font face="arial" color="black" size="3"> <?=$_SESSION["nama_instansi"]." merupakan salah satu rumah sakit umum di wilayah ".$_SESSION["kabupaten"]." yang berkedudukan di ".$_SESSION["alamat_instansi"].". ".$_SESSION["nama_instansi"]." merupakan pengembangan dari balai pengobatan, yang sekarang berada dibawah Yayasan Citra Fastabiqul Khoirot ".$_SESSION["nama_instansi"]." mendapat izin operasional  pertama pada tahun 1998 dari Kementerian Kesehatan dengan Kode PPK ".$_SESSION["kode_ppkkemenkes"]." dan RSU Siti Asiyah diresmikan pada tanggal 26 Oktober 1998 ".$_SESSION["nama_instansi"]." dalam memberikan pelayanannya mengacu pada Motto yaitu Pelayanan Kami Sahabat Kesehatan Anda , filosofi  dasar bahwa pelayanan kesehatan yang baik itu tidak harus mahal,  Filosofi dasar yang kedua adalah bersama yang tidak mampu kita harus maju. Hal ini memiliki arti bahwa ".$_SESSION["nama_instansi"]." harus mampu memajukan  dan membantu pemerintah dalam pelayanan kesehatan menuju arah yang lebih baik."?></p>
                          </div>
                          <figure class="profile wow fadeInUp" data-wow-delay="1s">
                               <img src="images/author-image.jpg" class="img-responsive" alt=""/>
                               <figcaption>
                                    <h3>dr. Anisa Paramitha</h3>
                                    <p>Direktur Utama</p>
                               </figcaption>
                          </figure>
                     </div>
                </div>
           </div>
      </div>
 </section>

 <!-- TEAM -->
 <section id="team" data-stellar-background-ratio="1">
      <div class="container">
           <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="about-info">
                          <h2 class="section-title wow fadeInUp" data-wow-delay="0.1s"><center>Dokter Kami</center></h2>
                     </div>
                </div>
                <div class="clearfix"></div>
                <?php
                    if(!isset($_SESSION["dokter"])){
                        $delay          = 0.2;
                        $datadokter     = "";
                        $querydokter=bukaquery("select dokter.kd_dokter,left(dokter.nm_dokter,20) as dokter,spesialis.nm_sps,dokter.no_ijn_praktek,pegawai.photo,dokter.no_telp from dokter inner join spesialis on dokter.kd_sps=spesialis.kd_sps inner join pegawai on dokter.kd_dokter=pegawai.nik where dokter.status='1' and dokter.kd_dokter<>'-' group by spesialis.nm_sps limit 5");
                        while($rsquerydokter = mysqli_fetch_array($querydokter)) {
                            $datadokter=$datadokter.
                               "<div class='col-md-4 col-sm-6'>
                                    <div class='team-thumb wow fadeInUp' data-wow-delay='".$delay."s'>
                                         <img alt='Photo' src='https://8595-36-68-52-151.ngrok.io/webapps/penggajian/$rsquerydokter[4]' class='img-responsive' />
                                          <div class='team-info'>
                                               <h3>$rsquerydokter[1]</h3>
                                               <p>$rsquerydokter[2]</p>
                                               <ul class='social-icon'>
                                                        <li><a href='https://www.instagram.com/rsusitiasiyahbumiayu' class='fa fa-instagram'></a></li>
                                                        <li><a href='https://wa.me/message/BIMNHMEDCK46K1' class='fa fa-whatsapp'></a></li>
                                                   </ul>
                                          </div>
                                    </div>
                                    <br/>
                               </div>";
                            $delay=$delay+0.2;
                        }
                        $_SESSION["dokter"]=$datadokter;
                    }

                    echo $_SESSION["dokter"];
                ?>
                <div class="col-md-4 col-sm-6">
                     <div class="wow fadeInUp" data-wow-delay="<?=$delay;?>s">
                         <br/><br/><br/><br/><center><a href='index.php?act=DokterKami' class="btn btn-warning" >Tampilkan Semua Dokter</a></center>
                     </div>
                </div>

           </div>
      </div>
 </section>

 <!-- Jadwal -->
 <section id="news" data-stellar-background-ratio="2.5">
    <div class="container">
         <div class="row">
              <div class="col-md-12 col-sm-12">
                   <div class="section-title wow fadeInUp" data-wow-delay="0.1s">
                        <h2>Jadwal Praktek Dokter</h2>
                   </div>
                   <div class="news-thumb wow fadeInUp" data-wow-delay="0.4s">
                       <form id="carikeyword" name="frmCariJadwal" method="post" action="" enctype=multipart/form-data>
                           <table width="100%" border='0' align="center">
                               <tr class="head">
                                  <td width="20%" align="right"><label for="keyword">Keyword</label></td>
                                  <td width="1%"><label for=":">&nbsp;:&nbsp;</label></td>
                                  <td width="60%"><input name="keyword" type="text" id="keyword" pattern="[a-zA-Z0-9, ./@_]{1,65}" title=" a-zA-Z0-9, ./@_" class="form-control" value="" size="65" maxlength="250" autocomplete="off"/></td>
                                  <td width="19%" align="left">&nbsp;<input name="BtnKeyword" type=submit class="btn btn-warning" value="Cari"></td>
                               </tr>
                           </table>
                       </form>
                       <div id='hasilcari'></div>
                   </div>
              </div>
         </div>
    </div>
 </section>

 <!-- MAKE AN APPOINTMENT -->
 <section id="appointment" data-stellar-background-ratio="3">
      <div class="container">
           <div class="row">
                <div class="col-md-6 col-sm-6">
                     <img src="images/appointment-image.jpg" class="img-responsive" alt="">
                </div>
                <div class="col-md-6 col-sm-6">
                     <form id="appointment-form" role="form" onsubmit="return validasiIsi();" method="post" action="index.php?act=PendaftaranPeriksa" enctype=multipart/form-data>
                          <div class="about-info wow fadeInUp" data-wow-delay="0.4s">
                               <h2><center> PENDAFTRAN ONLINE  BOKING </center></h2>
                               <div class="col-md-12 col-sm-12">
                                    <label for="nama">Nama</label>
                                    <input type="text" class="form-control text-uppercase" onkeydown="setDefault(this, document.getElementById('MsgIsi1'));" id="TxtIsi1" pattern="[a-zA-Z0-9, ./@_]{1,40}" title=" a-zA-Z0-9, ./@_ (Maksimal 40 karakter)" required name="nama" maxlength="40" placeholder="Nama Anda" autocomplete="off"/>
                                    <span id="MsgIsi1" style="color:#CC0000; font-size:10px;"></span>
                               </div>
                               <div class="col-md-12 col-sm-12">
                                    <label for="alamat">Alamat</label>
                                    <input type="text" class="form-control text-uppercase" onkeydown="setDefault(this, document.getElementById('MsgIsi2'));" id="TxtIsi2" pattern="[a-zA-Z0-9, ./@_]{1,200}" title=" a-zA-Z0-9, ./@_ (Maksimal 200 karakter)" required name="alamat" maxlength="200" placeholder="Alamat Anda" autocomplete="off" />
                                    <span id="MsgIsi2" style="color:#CC0000; font-size:10px;"></span>
                               </div>
                               <div class="col-md-6 col-sm-6">    
                                    <label for="nohp">Nomor HP/Telephone</label>
                                    <input type="tel" class="form-control" onkeydown="setDefault(this, document.getElementById('MsgIsi3'));" id="TxtIsi3" pattern="[0-9]{1,40}" title=" 0-9 (Maksimal 40 karakter)" required name="nohp" maxlength="40" placeholder="Nomor HP/Telephone Anda" autocomplete="off" />
                                    <span id="MsgIsi3" style="color:#CC0000; font-size:10px;"></span>
                               </div>
                               <div class="col-md-6 col-sm-6">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" onkeydown="setDefault(this, document.getElementById('MsgIsi4'));" id="TxtIsi4" pattern="[a-zA-Z0-9, ./@_]{1,50}" title=" a-zA-Z0-9, ./@_ (Maksimal 50 karakter)" required name="email" maxlength="50" placeholder="Email Anda" autocomplete="off" />
                                    <span id="MsgIsi4" style="color:#CC0000; font-size:10px;"></span>
                               </div>
                               <div class="col-md-6 col-sm-6">
                                    <label for="tanggal">Pilih Tanggal</label>
                                    <table width="100%">
                                        <tr>
                                            <td>
                                               <select name="TglDaftar" class="form-control">
                                                <?php
                                                    echo "<option>$tglbesok</option>";
                                                    loadTgl2();
                                                ?>
                                               </select>
                                            </td>
                                            <td>
                                                <select name="BlnDaftar" class="form-control">
                                                 <?php
                                                    echo "<option>$blnbesok</option>";
                                                    loadBln2();
                                                 ?>
                                                </select>
                                            </td>
                                            <td>
                                                <select name="ThnDaftar" class="form-control">
                                                 <?php
                                                    echo "<option>$thnbesok</option>";
                                                    loadThn4();
                                                 ?>
                                                </select>
                                            </td>
                                        </tr>
                                    </table>
                               </div>
                               <div class="col-md-6 col-sm-6">
                                    <label for="poli">Poliklinik/Unit Penunjang</label>
                                    <select name="poli" class="form-control">
                                         <?php
                                            if(!isset($_SESSION["poli"])){
                                                $datapoli   = "";
                                                $querypoli  = bukaquery("SELECT * from poliklinik order by nm_poli");
                                                while($rsquerypoli = mysqli_fetch_array($querypoli)) {
                                                    $datapoli=$datapoli."<option value='$rsquerypoli[0]'>$rsquerypoli[1]</option>";
                                                }
                                                $_SESSION["poli"]=$datapoli;
                                            }
                                            
                                            echo $_SESSION["poli"];
                                        ?>
                                    </select>
                               </div>
                               <div class="col-md-12 col-sm-12">
                                    <label for="pesan">Tambahan Pesan</label>
                                    <textarea class="form-control" rows="2" maxlength="400" onkeydown="setDefault(this, document.getElementById('MsgIsi5'));" id="TxtIsi5" required name="pesan" placeholder="Tambahan Pessan" autocomplete="off"></textarea>
                                    <span id="MsgIsi5" style="color:#CC0000; font-size:10px;"></span>
                                    <button type="submit" class="form-control" id="cf-submit" name="btnBooking">Kirimkan</button>
                               </div>
                               <div class="col-md-12 col-sm-12">
                                   <label><a href="index.php?act=CekBooking" class="btn btn-danger">Cek Booking</a> untuk melihat status booking Anda. Sudah pernah periksa sebelumnya? Silahkan <a href="index.php?act=LoginPasien" class="btn btn-success">Log In</a></label><br/><br/>
                               </div>
                          </div>
                    </form>
                </div> 
           </div>
      </div>
 </section>

 <section id="google-map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.8272240369174!2d109.00356311414839!3d-7.2604952733460335!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f8f7851a82041%3A0x756f29c7fd229616!2sRumah%20Sakit%20Umum%20Siti%20Asiyah!5e0!3m2!1sid!2sid!4v1629101402463!5m2!1sid!2sid" width="100%" height="350" style="border:0" allowfullscreen="true"></iframe>
 </section>     

 