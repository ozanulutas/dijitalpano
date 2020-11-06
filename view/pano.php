
<main id="main-pano">
   

    <!-- ALAN1 -->

    <div class="alan1">
        <header id="header">
            <h1 class="header-baslik"> &nbsp; </h1>
        </header>

        <div class="video-wrapper">
            <video class="video" controls>
                <!-- <source src="/home/karpuz/İndirilenler/Laravel PHP Framework Tutorial - Full Course for Beginners (2019).mp4" type="video/mp4">                 -->
            </video> 
        </div>

    </div>

    <!-- ALAN2 -->

    <div class="alan2">
        <h1 id="saat"> &nbsp; </h1>

        <div class="hava">
            <a id="hava" class="weatherwidget-io" href="https://forecast7.com/tr/40d9827d51/tekirdag/" 
            data-label_1=" &nbsp; " data-label_2=" &nbsp; " 
            data-theme="orange" data-basecolor="#ff7220" data-accent="#ffad00" ></a>
        </div>

        <div class="prog" id="prog">
            <h2>GÜNLÜK PROGRAM</h2>
            <p class="simdi">
                <span id="simdi-saat"> &nbsp; </span> 
                <span id="simdi"> &nbsp; </span>
            </p>
            
            <div id="zaman-fark">12 DAKİKA SONRA</div>
            <p class="sonra">
                <span id="sonra-saat"> &nbsp; </span> 
                <span id="sonra"> &nbsp; </span>             
            </p>               
            
        </div>
    </div>


    <!-- ALAN3 -->

    <div class="alan3">

        <div class="alan3-sol overflow">
            <h2 class="dikey-baslik">duyuru</h2>
            <div class="alan3-sol-icerik">
                <div name="marquee" id="duyuru">  
                    &nbsp;               
                    <!-- <?php /*foreach($data['duyurular'] as $duyuru) { ?>
                        <p><?php echo $duyuru->metin; ?></p> <?php
                    } */?>                         -->
                </div>
            </div>
        </div>


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