
<div class="form-wrapper bolum-baslik">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <form action="index.php?section=duyuru&action=<?php echo $data['action']; ?>" method="post" class="form">
        <input type="hidden" name="id" value="<?php echo $data['duyuru']->id ?? ''; ?>"> 

        <h3 class="form-item">Duyuru Metni</h3>
        <textarea name="metin" id="" cols="30" rows="10" required><?php echo htmlspecialchars($data['duyuru']->metin ?? ''); ?></textarea> <br>

        <h3 class="form-item">Yayınlanacak Tarih</h3>
        <input type="date" name="yayin_tarih" value="<?php echo $data['duyuru']->yayin_tarih ?? ''; ?>" required> 

        <h3 class="form-item">Yayından Kalkış Tarihi</h3>
        <input type="date" name="bitis_tarih" value="<?php echo $data['duyuru']->bitis_tarih ?? ''; ?>" required> 

        <div>
            <h3 class="form-item">Yayınlanacak Şubeler</h3>
            <div class="select-all">
                <span id="selectAll">Tümünü Seç</span> 
            </div>
        </div>
        <?php foreach($data['subeler'] as $sube) { ?>
            <div class="form-item checkbox">
                <input type="checkbox" name="sube_id[]" class="sube-sec"
                    value="<?php echo htmlspecialchars($sube->id ?? ''); ?>" 
                    <?php if(isset($data['subeDuyuru'][$sube->id])) echo ($data['subeDuyuru'][$sube->id]->sube_id == $sube->id) ? 'checked' : ''; ?>>
                <?php echo $sube->isim; ?> 
            </div> <?php            
        } ?>
        <br>

        <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>