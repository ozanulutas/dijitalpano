
<div class="form-wrapper bolum-baslik">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <div id="success"></div>
    <div id="error"></div>

    <?php if($data['action'] == 'edit') { ?> 
    <form action="index.php?section=kullanici&action=delete" method="post" class="form">

        <div class="btn-sil-wrapper">
            <button type="submit" name="sil" class="btn-sil" onclick="return deleteControl('Hesabınızı silmek istediğinize emin misiniz?');">
                Hesabı Sil
            </button>
        </div> 

    </form> <?php
    } ?>

    <form action="index.php?section=kullanici&action=<?php echo $data['action']; ?>" method="post" class="form" id="<?php echo ($data['action'] == 'edit') ? 'kullaniciEditForm' : ''; ?>" >


        <input type="hidden" name="currAction" id="currAction" value="<?php echo $data['action']; ?>" class="form-item">

        <input type="hidden" name="id" value="<?php echo $data['kullanici']->id ?? ''; ?>" class="form-item"> 

        <!-- ESKİ -->
        <?php if($data['action'] == 'create') { ?> 
        <h3 class="form-item">Kullanıcı Adı</h3>
        <input type="text" name="k_adi" id="k_adi" value="" placeholder="Kullanıcı Adı" class="form-item" required> <br> 
        
        <h3 class="form-item">Şifre</h3>
        <input type="password" name="sifre" id="sifre" value="" placeholder="Şifre" class="form-item" required> <br>

        <?php 
        }
        elseif($data['action'] == 'edit') { ?> 
        <!-- YENİ -->        
        <h2 class="form-item">Şifre Değiştir</h2>        

        <h3 class="form-item">Eski Şifre</h3>
        <input type="password" name="eskiSifre" id="eskiSifre" value="" placeholder="Mevcut şifreniz..." class="form-item sifre" required>

        <h3 class="form-item">Yeni Şifre</h3>
        <input type="password" name="yeniSifre" id="yeniSifre" value="" placeholder="Yeni şifreniz..." class="form-item sifre" required>

        <div class="form-item checkbox">
            <input type="checkbox" onclick="showPassword()">Şireyi Göster
        </div> <?php
        } ?>

        <button type="submit" name="kaydet" id="kullaniciKaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn" id="kullaniciFormIptal">İptal</button> <br>
    </form>

</div>