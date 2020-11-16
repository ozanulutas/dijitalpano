
<main id="main-pano">
   

    <!-- ALAN1 -->

    <div class="alan1">

        <!-- HEADER -->
        <header id="header">
            <h1 class="header-baslik"> &nbsp; </h1>
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

        <!-- <div class="video-wrapper">
            <iframe src="https://drive.google.com/file/d/1y5efhVA_2NgOtXZ6gNGl7l8nQ3B1HkYf/preview"  frameborder="0" allowtransparency="true" ></iframe> 
        </div> -->

    </div>

    <!-- ALAN2 -->

    <!-- SAAT -->
    <div class="alan2">
        <div id="saat">
            <h1> &nbsp; </h1>
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
            <h2>GÜNLÜK PROGRAM</h2>
            <div id="progIcerik">
            <p class="simdi">
                <span id="simdiSaat"> Şu an: </span> 
                <span id="simdi"> &nbsp; </span>
            </p>
            
            <div id="zaman-fark"></div>
            <p class="sonra">
                <span id="sonraSaat"> &nbsp; </span> 
                <span id="sonra"> &nbsp; </span>             
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
                    &nbsp;               
                </div>
            </div>
        </div>


        <!-- SLIDE -->
        <div class="slideshow-container">  
            
            <?php foreach($data['slidelar'] as $slide) { ?>
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
                } ?>
                
            </div>

        </div>

    </div>  

</main>