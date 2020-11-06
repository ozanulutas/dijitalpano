
<div class="form-wrapper gallery-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

    <hr>

<div class="form-wrapper gallery-wrapper">

    <form action="index.php?section=resim&action=delete" method="post">

        <div class="gallery">

            <?php foreach($data['resimler'] as $resim) { ?>            
            <div class="gallery-item">
                <img src="<?php echo $resim->yol; ?>" id="<?php echo $resim->id; ?>" onclick="goster(this.id)">            
                <input type="checkbox" name="id[]" value="<?php echo $resim->id; ?>">
            </div> <?php
            } ?>

        </div>  
        
        <div class="btn-sil-wrapper">
            <button type="submit" name="sil" class="btn-sil" onclick="return deleteControl('Seçili Resimleri Silmek İstediğinize Emin Misiniz?')">Seçili Resimleri Sil</button>
        </div>


    </form>
    
    <hr>

</div>

<div class="form-wrapper">

    <form action="index.php?section=resim&action=<?php echo $data['action']; ?>" method="post" class="form" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $data['resim']->id ?? ''; ?>" class="form-item"> 

        <h3 class="form-item">Resim Yükle</h3>
        <input type="file" name="yol" accept="image/*" required> <br>
        
        <button type="submit" name="kaydet" class="form-item submit-btn">Yükle</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>


<div id="modal" class="modal">
    <span class="close">&times;</span>
    
    <img class="modal-content" id="modalContent">
    
    <div id="caption"></div>
</div> 
