
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

    <hr>

<div class="form-wrapper">

    <table>
        <tr>
            <th>Şube Adı</th>
            <th colspan="2">Adres</th>
        </tr>
        <?php foreach($data['subeler'] as $sube) { ?>
        <tr>
            <td onclick="edit('sube', <?php echo $sube->id; ?>)">
                <?php echo $sube->isim; ?>
            </td>
            <td onclick="edit('sube', <?php echo $sube->id; ?>)">
                <?php echo $sube->adres; ?>
            </td>
            <td>
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
