
<main id="main-pano">
   

    <!-- ALAN1 -->

    <div class="alan1">

        <!-- HEADER -->
        <header id="header">
            <h1 class="header-baslik"><!-- şube adı --></h1>
        </header>

        <!-- VIDEO -->
        <!--<div class="video-wrapper">
             <?php 
            /*if(($data['video']->yol)) { ?>
            <video class="video" controls id="video"> 
                <source src="<?php echo $data['video']->yol ?? ''; ?>" type="video/mp4">                
            </video> <?php
            }
            elseif(isset($data['videoEmbed'])) {
                echo $data['videoEmbed']->link;
            }*/
            ?>  
        </div>-->

        <div class="video-wrapper">        
            <!-- <iframe id="player" src="https://drive.google.com/file/d/1y5efhVA_2NgOtXZ6gNGl7l8nQ3B1HkYf/preview?enablejsapi=1"  frameborder="0" allowtransparency="true" onended="alert();"></iframe>  -->
        
            <iframe id="player" width="560" height="315" src="https://www.youtube.com/embed/eU4FItei9XY" frameborder="0" allow="autoplay;" allowfullscreen></iframe>
                <!-- <img width="200" src="https://lh3.googleusercontent.com/LCGNf-ziKGMmHH7KOF4CHrAGy3Bmt-MiybqdXTX6Wqp6NWmyG0U7POYqGFQcScrXKBd73SzPynR3b-GF3kb1o7_aHZ7UOyGhKyfKWZ1ds-a8ck6fbLJo-zHAU9Thc9IRQB7tI5ITvxCx0Bp-Z6dhO6KC4bsUe17vlJ32bNqMj0z0uGRkm83yv5Nz6zzBQxJMTCweQOZS8KiY0dff6zcZlmh_FtKxijGPaHpqXxKG3S7OASlj7KGHkxzrr20Q2OqSOuJ1vbp9Nq0wKtWV9vcCMH4-uJGY6Q8XtYdzOk1jq2DpN_88qeIbTnkq4MfOSwEjMkbQxCxRQR9YOeNKBW7Q22mo8eh4lO5hj9I-jfu2XAoCzpkaqkHS_vSoNq8lxwNpCDAPboPy3yOqYmYBrv03wtEJDvwh0Zm7TaEoOL_AbqjNk1X5cz2-jbcoLFZvySf6aQVFh0awcuyLU_02bvARnJ94RAi5waRzoAKle5qbE3tT-p8YgiCywxKI2sqWS-kKl_i1nEfynpUYi-CcJdGxCwlyIzKqYUbOeT97m_r-kdpFx88GgfoaCVuAogTZE5GypU2CyEm2DfrxNqcr8WDl_YxEec7rl2lFhDyDnvDu-oI4UpwsFczgC8q44bM_LhIhZ2vAMr-5qW-pNJc8e_Hf6Lu1DTq1k4BxiwNmdra-SfKeV1rdvsznW8DQApMx=w1274-h955-no?authuser=0" alt="yok">
                <img width="200" src="https://lh3.googleusercontent.com/iDZM_qwoEL3AWjpvu0AU_KP3UXj6o0tIYvFXVOPVvtkRN0O-zohik2tHORnvpRM1t1LsQHASdfQDn0_onBLIHzpNj7dmEkovWO3N7azvJaeaV1zRroS_P_x_FhPTyuxiRuwI7exyoYT1kqA4G4RTTRXznuewhwOo_6-RxBSnXjfvBWPz1e8Qxd0LIPBa3h6MMa191uvVGuFtUksoY47R8dd9gAa2Vy5O6rYIXQWZysjznvWkj7Rgi80jPohGdGh2nQ6u_gZBqe-Ubldzy1-YMzmdVas2HQdE8Knr-FxoeyUWqD-OJkKUDwUC9on6l5BbO7NeSyVqqXOYchxCHBweR7-v5RoEIyhLPbS4QSyI_VecqG0o7wqVsLxu0sLfnRQJhcKW0vKT8c8q6tezy1Ae72t2M3IB3C7V5iHSuE6V98lgTZfPqljjBDyZysN4r7KYc_zKafhOpJdrtu_OQD_F3us635Tku_AIl3M48qlzWjOQ68iURZalF7KeEtuByY8IiDC85C9JhFRedyydWkt8IHBTYrpGuTH6eurMCVIYvJc0c7BJilum7Mc9mjQ4jyEeS5OTIiyjyn0UG7ahUEtpsFqmRVNbvWsPjBiP5vYLuE1zNVz9CVrwUxcIAuWcURW7cCRB54x-uO9UD6hlCBVgOurGace4BTkZsLLad5Z_yzypjGSTVLze8Ong_1Vn=w717-h955-no?authuser=0" alt=""> -->
        </div>            
            
            <!-- <div id="player"></div>
            <script src="http://www.youtube.com/player_api"></script>
            <script>

                playlist = ['_jX1TYHiAmg', 'U9VF-4euyRo', 'eU4FItei9XY'];
                i = 0;

                // create youtube player
                var player;
                
                function onYouTubePlayerAPIReady() {
                    player = new YT.Player('player', {
                        height: '390',
                        width: '640',
                        videoId: playlist[i], 
                        playerVars: {'autoplay': 1},
                        events: {
                            'onReady': onPlayerReady,
                            'onStateChange': onPlayerStateChange
                        }
                    });
                }

                // The API will call this function when the video player is ready. // autoplay video
                function onPlayerReady(event) {
                    event.target.playVideo();
                }

                // when video ends
                function onPlayerStateChange(event) {        
                    if(event.data === 0) {            
                        // $('#player').css('display', 'none');
                        i++;
                        if(i == playlist.length) i = 0;
                        player.loadVideoById(playlist[i])
                    }
                }

            </script> -->
            

        <!-- GERİ SAYIM -->
        <div class="geri-sayim-wrapper">
            <div class="geri-sayim">
                <span class="geri-sayim-etkinlik">Genel Sınav İçin Kalan Süre:</span> 
                <span class="geri-sayim-sayac">2 gün, 13 saat, 23 dakika</span> 
            </div>
        </div>
    </div>

    <!-- ALAN2 -->

    <!-- SAAT -->
    <div class="alan2">
        <div id="saat">
            <h1><!-- saat --></h1>
        </div>

        <!-- HAVA DURUMU -->
        <div class="hava">
        
            <div class="bugun">
                <div class="hafta-gun">
                    <div class="gun kalin"> Bugün </div>                                       
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/09d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">13&deg;</div>
                    </div>
                </div>
                <div class="tarih kalin">
                    <div id="tarih"> TARİH </div>
                    <div id="gun"> GÜN </div>                    
                </div>
            </div>

            <div class="hafta">
                <div class="hafta-gun">
                    <div class="gun kalin"> GUN </div>
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/02d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">18&deg;</div>
                    </div>
                </div>
                <div class="hafta-gun">
                    <div class="gun kalin"> GUN </div>
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/09d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">16&deg;</div>
                    </div>
                </div>
                <div class="hafta-gun">
                    <div class="gun kalin"> GUN </div>
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/01d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">20&deg;</div>
                    </div>
                </div>
                <div class="hafta-gun">
                    <div class="gun kalin"> GUN </div>
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/02d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">19&deg;</div>
                    </div>
                </div>
                <div class="hafta-gun">
                    <div class="gun kalin"> GUN </div>
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/04d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">15&deg;</div>
                    </div>
                </div>
                <div class="hafta-gun">
                    <div class="gun kalin"> GUN </div>
                    <div class="hava-durum">
                        <img src="http://openweathermap.org/img/wn/04d@2x.png" alt="" class="hava-icon">
                        <div class="hava-derece kalin">16&deg;</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- PROGRAM -->
        <div class="prog" id="prog">
            <h2>Günlük Program</h2>
            <div id="progIcerik">
                <p class="simdi">
                    <span id="simdiSaat"> Şu an: </span> 
                    <span id="simdi" class="etkinlik"><!-- şimdiki ders --></span>
                </p>
                
                <div id="zaman-fark"><!-- sonraki derse kalan süre --></div>
                <div class="dikey-cizgi"></div>
                <p class="sonra">
                    <span id="sonraSaat"></span> 
                    <span id="sonra" class="etkinlik"><!-- sonraki ders --></span>             
                </p>   
            </div>
        </div>
    </div>


    <!-- ALAN3 -->

    <div class="alan3">

        <!-- DUYURULAR -->
        <div class="alan3-sol overflow">
            <h2 class="dikey-baslik">DUYURU</h2>
            <div class="alan3-sol-icerik">
                <div name="marquee" id="duyuru">  
                    <!-- duyurular -->              
                </div>
            </div>
        </div>


        <!-- SLIDE -->

        <div class="slideshow-container">            
        
            <!-- slide loop -->
            <div class="alan3-sag overflow slide rotate"> 
                <!-- slide resmi -->               
                <img src="" class="alan3-sag-resim">
               
                <div name="marquee">
                    <h2><!-- slide başlığı --></h2>
                    <p><!-- slide metni --></p>
                </div>            
            </div> 

            <!-- slide dot loop -->
            <div class="dot-container">             
                <span class="dot"></span>                
            </div>
        </div>

        <!-- PHP
        <div class="slideshow-container">  
            
            <?php /*foreach($data['slidelar'] as $slide) { ?>
            <div class="alan3-sag overflow slide rotate">
                <?php if($slide->resim_id) { ?>
                    <img src="<?php echo $data['resimler'][$slide->resim_id]->yol ?? ''; ?>" class="alan3-sag-resim"><?php
                } ?>
                <div name="marquee">
                    <h2><?php echo $slide->baslik; ?></h2>
                    <p><?php echo $slide->metin; ?></p>
                </div>            
            </div> <?php
            } ?>

            <div class="dot-container">
                <?php for($i = 0; $i < count($data['slidelar']); $i++) { ?>
                    <span class="dot"></span><?php 
                }*/ ?>
                
            </div>

        </div>
        -->
    </div>  

</main>