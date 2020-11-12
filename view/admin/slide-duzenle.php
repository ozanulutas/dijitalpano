
<div class="form-wrapper bolum-baslik">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <form action="index.php?section=slide&action=<?php echo $data['action']; ?>" method="post" class="form">
        <input type="hidden" name="id" value="<?php echo $data['slide']->id ?? ''; ?>"> 

        <h3 class="form-item">Slide Başlığı</h3>
        <input type="text" name="baslik" id="" value="<?php echo $data['slide']->baslik ?? ''; ?>" required> <br>

        <h3 class="form-item">Slide Metni</h3>
        <textarea name="metin" id="" cols="30" rows="10" required><?php echo $data['slide']->metin ?? ''; ?></textarea> <br>

        <input type="hidden" name="tarih" value="<?php echo date("Y-m-d"); ?>"> <br>

        <h3 class="form-item">Resim</h3>

        <div class="gallery">
            <?php foreach($data['resimler'] as $resim) { ?>            
            <div class="gallery-item">
                <img src="<?php echo $resim->yol; ?>" id="<?php echo $resim->id; ?>" onclick="goster(this.id)">            
                <input type="radio" name="resim_id" value="<?php echo $resim->id ?? ''; ?>" class="radio"
                 <?php if(isset($data['slide']->resim_id)) echo ($resim->id == $data['slide']->resim_id) ? 'checked' : ''; ?>>
            </div> <?php
            } ?>
        </div>   

        <br> 

        <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>


<div id="modal" class="modal">
    <span class="close">&times;</span>
    
    <img class="modal-content" id="modalContent">
    
    <div id="caption"></div>
</div> 