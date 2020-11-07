
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <div id="success" class="fade"></div>
    <div id="error" class="fade"></div>

    <form  class="form" id="form" action="index.php?section=program&action=<?php echo $data['action']; ?>" method="post">

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
                    <?php echo $sube->isim; ?>
                </option> <?php 
            } ?>
        </select>

        <h3 class="form-item">Gün</h3>
        <select name="gun" id="gun">
            <?php foreach(GUNLER as $gun) { ?>
                <option value="<?php echo $gun; ?>" <?php echo (($data['program']->gun ?? 'Yok') == $gun) ? ' selected' : ' '; ?>>
                    <?php echo $gun; ?>
                </option> <?php
            } ?>
        </select> 

        <h3 class="form-item">Ders Adı</h3>
        <input type="text" name="etkinlik" id="etkinlik" value="<?php echo $data['program']->etkinlik ?? ''; ?>" class="form-item"> <br>
        
        <h3 class="form-item">Ders Saati</h3>
        <input type="time" name="saat" id="saat" value="<?php echo $data['program']->saat ?? ''; ?>" class="form-item"> <br>
        <hr style="width:100%">
        
        <button type="submit" name="kaydet" class="form-item submit-btn" id="<?php echo $data['action'] == 'create' ? 'progEkle' : ''; ?>">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>

