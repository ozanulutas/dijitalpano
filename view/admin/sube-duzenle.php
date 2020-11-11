
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

    <hr>

<div class="form-wrapper">

    <form action="index.php?section=sube&action=<?php echo $data['action']; ?>" method="post" class="form">
        <input type="hidden" name="id" value="<?php echo $data['sube']->id ?? ''; ?>" class="form-item"> 

        <h3 class="form-item">Şube Adı</h3>
        <input type="text" name="isim" value="<?php echo $data['sube']->isim ?? ''; ?>" placeholder="Şube Adı" class="form-item" required> <br>
        
        <h3 class="form-item">Şube Adresi</h3>
        <input type="text" name="adres" value="<?php echo $data['sube']->adres ?? ''; ?>" placeholder="Şube Adresi" class="form-item"> <br>
        
        <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>