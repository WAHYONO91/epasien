<?php
    if(strpos($_SERVER['REQUEST_URI'],"pages")){
        exit(header("Location:../index.php"));
    }
?>
<section id="team" data-stellar-background-ratio="1">
      <div class="container">
           <div class="row">
                <div class="col-md-12 col-sm-12">
                     <div class="section-title wow fadeInUp">
                          <h2 class="wow fadeInUp" data-wow-delay="0.1s"><center>Dokter Kami</center></h2>
                     </div>
                </div>
                       
                <div class="clearfix"></div>
                <?php
                    if(!isset($_SESSION["semuadokter"])){
                        $datadokter       = "";
                        $querysemuadokter = bukaquery("select dokter.kd_dokter,left(dokter.nm_dokter,20) as dokter,spesialis.nm_sps,dokter.no_ijn_praktek,pegawai.photo,dokter.no_telp from dokter inner join spesialis on dokter.kd_sps=spesialis.kd_sps inner join pegawai on dokter.kd_dokter=pegawai.nik where dokter.status='1' and dokter.kd_dokter<>'-' order by spesialis.nm_sps");
                        while($rsquerysemuadokter = mysqli_fetch_array($querysemuadokter)) {
                            $datadokter=$datadokter.
                                    "<div class='col-md-4 col-sm-6'>
                                        <div class='team-thumb wow fadeInUp' data-wow-delay='0.2s'>
                                             <img alt='Photo' src='https://8595-36-68-52-151.ngrok.io/webapps/penggajian/$rsquerysemuadokter[4]' class='img-responsive' />
                                              <div class='team-info'>
                                                   <h3>$rsquerysemuadokter[1]</h3>
                                                   <p>$rsquerysemuadokter[2]</p>
                                                   <ul class='social-icon'>
                                                        <li><a href='https://www.instagram.com/rsusitiasiyahbumiayu' class='fa fa-instagram'></a></li>
                                                        <li><a href='https://wa.me/message/BIMNHMEDCK46K1' class='fa fa-whatsapp'></a></li>
                                                   </ul>
                                              </div>
                                        </div>
                                        <br/>
                                   </div>";
                        }
                        $_SESSION["semuadokter"]=$datadokter;
                    }
                    echo $_SESSION["semuadokter"];
                ?>
           </div>
      </div>
 </section>