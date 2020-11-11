
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <?php if($data['action'] == 'edit') { ?> 
    <form action="index.php?section=kullanici&action=delete" method="post">

        <div class="btn-sil-wrapper">
            <button type="submit" name="sil" class="btn-sil" onclick="return deleteControl('Hesabınızı silmek istediğinize emin misiniz?');">
                Hesabı Sil
            </button>
        </div> 

    </form> <?php
    } ?>

    <form action="index.php?section=kullanici&action=<?php echo $data['action']; ?>" method="post" class="form">

        <div id="error"></div>
        <input type="hidden" name="currAction" id="currAction" value="<?php echo $data['action']; ?>" class="form-item">

        <input type="hidden" name="id" value="<?php echo $data['kullanici']->id ?? ''; ?>" class="form-item"> 

        <h3 class="form-item">Kullanıcı Adı</h3>
        <input type="text" name="k_adi" id="k_adi" value="<?php echo $data['kullanici']->k_adi ?? ''; ?>" placeholder="Kullanıcı Adınız" class="form-item" required> <br>
        
        <h3 class="form-item">Şifre</h3>
        <input type="password" name="sifre" id="sifre" value="<?php echo $data['kullanici']->sifre ?? ''; ?>" placeholder="Şifreniz" class="form-item" required> <br>
        <div class="form-item checkbox">
            <input type="checkbox" onclick="showPassword()">Şireyi Göster
        </div>

        <button type="submit" name="kaydet" id="kullaniciKaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>