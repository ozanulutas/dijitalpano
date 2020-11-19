
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <table class="duyuru-table">
        <tr>
            <th>Şube Adı</th>
            <th>Adres</th>
            <th>Seçenek</th>
        </tr>
        <?php foreach($data['subeler'] as $sube) { ?>
        <tr>
            <td onclick="edit('sube', <?php echo $sube->id; ?>)">
                <?php echo $sube->isim; ?>
            </td>
            <td onclick="edit('sube', <?php echo $sube->id; ?>)">
                <?php echo $sube->adres; ?>
            </td>
            <td class="td-empty">
                <a href="index.php?section=sube&action=delete&id=<?php echo $sube->id; ?>"
                    onclick="return deleteControl('Şubeyi silmek istediğinize emin misiniz?')"
                    class="sil">
                    SİL
                </a>
            </td>
        </tr>
        <?php } ?>
        
        <a href="index.php?section=sube&action=create">Yeni Şube Ekle</a>
    </table>
        
</div>
