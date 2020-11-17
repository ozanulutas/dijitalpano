
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">
    
    <?php if(($data['action'] == 'create') || (($data['action'] == 'edit') && ($data['video']->kaynak == 'gdrive'))) { ?>
        <!-- GOOGLE DRIVE VIDEOSU -->
    <div class="accordion form-item"><?php echo $data['panelBaslik']['gdrive']; ?></div>
    <div class="panel"> 
        <div class="form-wrapper">
            <form class="form" id="embedForm" method="post" action="index.php?section=video&action=<?php echo $data['action']; ?>">

                <input type="hidden" name="kaynak" value="gdrive">
                <input type="hidden" name="id" value="<?php echo $data['video']->id ?? ''; ?>"> 

                <h3>Video Adı</h3>
                <input type="text" name="isim" value="<?php echo $data['video']->isim ?? ''; ?>" required>

                <h3>Video Linki</h3>
                <input type="text" name="yol" id="embedLink" value="<?php echo $data['video']->yol ?? ''; ?>" required>

                <button type="submit" name="kaydet" class="form-item submit-btn"><?php echo $data['action'] == 'create' ? 'Ekle' : 'Kaydet'; ?></button>
                <button name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> 
            </form>
        </div>
    </div>

    <?php 
    }
    if(($data['action'] == 'create') || (($data['action'] == 'edit') && ($data['video']->kaynak == 'sunucu'))) { ?>    
        <!-- SUNUCU VIDEOSU -->
    <div class="accordion form-item"><?php echo $data['panelBaslik']['sunucu']; ?></div>
    <div class="panel"> 
        <div class="form-wrapper">
            <form class="form" id="<?php echo $data['action'] == 'create' ? 'uploadForm' : ''; ?>" 
            action="<?php echo $data['action'] == 'create' ? $data['action'] : 'index.php?section=video&action=' . $data['action']; ?>" 
            method="post" enctype="multipart/form-data">
                <div id="error" class="fade"></div>

                <input type="hidden" name="kaynak" value="sunucu">  
                <input type="hidden" name="id" value="<?php echo $data['video']->id ?? ''; ?>">               

                <h3>Video Adı</h3>
                <input type="text" name="isim" value="<?php echo $data['video']->isim ?? ''; ?>" required>       

                <?php if($data['action'] == 'create') { ?>
                <h3 class="form-item">Video Seç</h3>
                <input type="file" name="yol" id="inpFile" accept="video/*" required> <?php 
                } ?>
                
                <button type="submit" name="kaydet" class="form-item submit-btn" id="videoYukle"><?php echo $data['action'] == 'create' ? 'Yükle' : 'Kaydet'; ?></button> <br>        

                <div class="progress-bar" id="progressBar">
                    <div class="progress-bar-fill">
                        <span class="progress-bar-text">
                            0%
                        </span>
                    </div>
                </div>

                <button name="iptal" formnovalidate class="form-item cancel-btn" id="videoCancel">İptal</button> 

            </form>
        </div>
    </div> <?php
    } ?>
    
</div>