
<div class="form-wrapper gallery-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper gallery-wrapper">

    <div id="success" class="fade"></div>

    <form action="index.php?section=video&action=delete" method="post">

        <div class="gallery">
            <?php foreach($data['thumbs'] as $thumb) { ?>            
            <div class="gallery-item">
                <div class="video-baslik"><?php $isim = explode('/', $thumb->yol); echo end($isim); ?></div>          
                <img src="<?php echo $thumb->yol; ?>" id="<?php echo $thumb->video_id; ?>" onclick="videoGoster(this.id)">  
                <input type="radio" name="video_id" value="<?php echo $thumb->video_id; ?>" class="radio"
                 <?php echo ($data['videolar'][$thumb->video_id][0]->goster == true) ? ' checked' : ''; ?>>
            </div> <?php
            } ?>
        </div>  
        
        <?php if(!empty($data['thumbs'])) { ?> 
        <div class="islem-group">            
            <span class="create" id="yayinla" onclick="yayinla()">Seçili Videoyu Yayınla</span>

            <div class="btn-sil-wrapper">
                <button type="submit" name="sil" class="btn-sil" onclick="return deleteControl('Seçili videoyu Silmek İstediğinize Emin Misiniz?')">Videoyu Sil</button> 
            </div>
        </div> <?php
        } ?>  

    </form>
    
    <hr>

</div>

<div class="form-wrapper">
 
    <form class="form" id="uploadForm" action="index.php?section=video&action=<?php echo $data['action']; ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="uri" id="uri" value="">
        <input type="hidden" name="fname" id="fname" value="">

        <h3 class="form-item">Video Yükle</h3>
        <input type="file" name="yol" id="inpFile" accept="video/*" required> <br>        
        
        <button type="submit" name="kaydet" class="form-item submit-btn" id="yukle">Yükle</button> <br>        

        <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill">
                <span class="progress-bar-text">
                    0%
                </span>
            </div>
        </div>

        <button name="iptal" formnovalidate class="form-item cancel-btn" id="videoCancel">İptal</button> <br>

    </form>


    <!-- <div class="progress-bar" id="progressBar">
            <div class="progress-bar-fill">
                <span class="progress-bar-text">
                    0%
                </span>
            </div>
        </div> -->



</div>

<img id="thumbnail" style="display: none">

<div id="modal" class="modal">
    <span class="close">&times;</span>
    
    <div class="modal-content" id="modalContent">
        <video class="video" controls>
            <source src="" type="video/mp4" id="source">
        </video> 
    </div>
    
    <div id="caption"></div>
</div> 


