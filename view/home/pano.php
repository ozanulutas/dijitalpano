
<main id="main-pano">
   

    <!-- ALAN1 -->

    <div class="alan1">

        <!-- HEADER -->
        <header id="header">
            <h1 class="header-baslik"><!-- şube adı --></h1>
        </header>

        <!-- VIDEO ESKİ -->
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
            
        <!-- VIDEO YENİ -->
        <div class="video-wrapper">           
            <?php /**/
            if(($data['video']->yol)) { ?>
            <iframe id="player" src="<?php echo $data['video']->yol ?? ''; ?>" frameborder="0"></iframe> <?php
            } ?> 
            <!-- <iframe id="player" src="https://drive.google.com/file/d/1y5efhVA_2NgOtXZ6gNGl7l8nQ3B1HkYf/preview?enablejsapi=1" frameborder="0" allowtransparency="true"></iframe>  -->
            <!-- <iframe id="player" width="560" height="315" src="https://www.youtube.com/embed/eU4FItei9XY" frameborder="0" allow="autoplay;" allowfullscreen></iframe> -->
        </div> 
            
        <!-- YOUTUBE DENEME
        <div id="player"></div>
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
                <span class="geri-sayim-etkinlik"><!-- etkinlik adı --></span> 
                <span class="geri-sayim-sayac"><!-- kalan süre --></span> 
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