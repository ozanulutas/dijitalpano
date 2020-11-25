
<div class="form-wrapper bolum-baslik">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <div id="success" class="fade"></div>
    <div id="error" class="fade"></div>

    <form  class="form" id="progForm" action="index.php?section=program&action=<?php echo $data['action']; ?>" method="post">

        <?php if($data['action'] == 'edit') { ?>
        <div class="btn-sil-wrapper">
            <a href="index.php?section=program&action=delete&id=<?php echo $data['program']->id; ?>"
                onclick="return deleteControl('Etkinliği silmek istediğinize emin misiniz?')"
                class="sil">
                Etkinliği Sil
            </a>
        </div> <?php 
        } ?>

        <input type="hidden" name="id" value="<?php echo $data['program']->id ?? ''; ?>" class="form-item"> 

        <h3 class="form-item">Şube</h3>
        <select name="sube_id" id="sube_id">           
            <?php foreach($data['subeler'] as $sube) { ?>
                <option value="<?php echo $sube->id; ?>" 
                 <?php echo ((($data['sube_id'] ?? '') == $sube->id || ($data['program']->sube_id ?? '') == $sube->id)) ? ' selected' : ' '; ?>>
                    <?php echo htmlspecialchars($sube->isim); ?>
                </option> <?php 
            } ?>
        </select>

        <h3 class="form-item">Gün</h3>
        <select name="gun" id="gun">
            <?php foreach(GUNLER as $key => $value) { ?>
                <option value="<?php echo $key; ?>" <?php echo (($data['program']->gun ?? 'Yok') == $key) ? ' selected' : ' '; ?>>
                    <?php echo $value; ?>
                </option> <?php
            } ?>
        </select> 

        <h3 class="form-item">Ders Adı</h3>
        <input type="text" name="etkinlik" id="etkinlik" value="<?php echo htmlspecialchars($data['program']->etkinlik ?? ''); ?>" class="form-item" <?php echo $data['action'] == 'edit' ? ' required' : ''; ?>> 
        
        <h3 class="form-item">Saat Aralığı</h3>
        <div class="group">
            <input type="time" name="saat" id="saat" value="<?php echo $data['program']->saat ?? ''; ?>" class="form-item" <?php echo $data['action'] == 'edit' ? ' required' : ''; ?>> 
            <input type="time" name="bitis_saat" id="bitis_saat" value="<?php echo $data['program']->bitis_saat ?? ''; ?>" class="form-item" <?php echo $data['action'] == 'edit' ? ' required' : ''; ?>>
        </div>

        <hr style="width:100%">
        
        <button type="submit" name="kaydet" class="form-item submit-btn" id="<?php echo $data['action'] == 'create' ? 'progEkle' : ''; ?>">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>

