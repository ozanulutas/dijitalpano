
<div class="form-wrapper bolum-baslik">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <form action="index.php?section=sayac&action=<?php echo $data['action']; ?>" method="post" class="form">
        <input type="hidden" name="id" value="<?php echo $data['sayac']->id ?? ''; ?>"> 

        <h3 class="form-item">Etkinlik Adı</h3>
        <input type="text" name="etkinlik" value="<?php echo $data['sayac']->etkinlik ?? ''; ?>">

        <h3 class="form-item">Etkinlik Zamanı</h3>
        <div class="group">
            <input type="date" name="tarih" class="form-item" value="<?php echo $data['sayac']->tarih ?? ''; ?>" required> 
            <input type="time" name="saat" class="form-item" value="<?php echo $data['sayac']->saat ?? ''; ?>" required> 
        </div> 
        
        <h3 class="form-item">Yayınlanacak Tarih</h3>
        <input type="date" name="yayin_tarih" value="<?php echo $data['sayac']->yayin_tarih ?? null; ?>" required> 

        <div>
            <h3 class="form-item">Yayınlanacak Şubeler</h3>
            <div class="select-all">
                <span id="selectAll">Tümünü Seç</span> 
            </div>
        </div>
        <?php foreach($data['subeler'] as $sube) { ?>
            <div class="form-item checkbox">
                <input type="checkbox" name="sube_id[]" class="sube-sec"
                    value="<?php echo $sube->id ?? ''; ?>" 
                    <?php if(isset($data['subeSayac'][$sube->id])) echo ($data['subeSayac'][$sube->id]->sube_id == $sube->id) ? 'checked' : ''; ?>>
                <?php echo $sube->isim; ?> 
            </div> <?php            
        } ?>

        <!-- <div class="form-item checkbox">
            <h3>
                <input type="checkbox" name="goster" class="sube-sec"
                value="1" 
                <?php //if(isset($data['sayac']->goster)){ echo $data['sayac']->goster ? 'checked' : '';} ?>>
                Yayınla
            </h3>
        </div> -->

        <br>

        <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>