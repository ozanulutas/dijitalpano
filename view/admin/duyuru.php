
<div class="form-wrapper duyuru-wrapper">
    <h2><?php echo $data['baslik']; ?></h2>
</div>

<hr>

<div class="form-wrapper duyuru-wrapper">

    <div class="select-group">
        <select class="sec form-item"> 
            <option onclick="filter('hepsi')">Hepsini Göster</option>
            <?php foreach($data['subeler'] as $sube) { ?>
            <option onclick="filter(<?php echo '\'sbf-' . $sube->id . '\''; ?>)" >
                <?php echo $sube->isim; ?>
            </option>
            <?php } ?>
        </select>  
    </div> 

    <table class="duyuru-table">
        <tr>
            <th>Duyuru Metni</th>
            <th>Yayınlanma Tarihi</th>
            <th>Bitiş Tarihi</th>
            <th colspan="2">Şubeler</th>
        </tr>
        
        <?php foreach($data['duyurular'] as $duyuru) { ?>
        <tr class="filter <?php echo $data['subeFiltre'][$duyuru->id] ?? ''; ?>">
            <td class="duyuru-metin" onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo $duyuru->metin; ?>
            </td>
            <td onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo $duyuru->yayin_tarih; ?>
            </td>
            <td onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo $duyuru->bitis_tarih; ?>
            </td>
            <td onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo $data['sube'][$duyuru->id] ?? ''; ?>                
            </td>
            <td class="td-empty">
                <a href="index.php?section=duyuru&action=delete&id=<?php echo $duyuru->id; ?>"
                    onclick="return deleteControl('Duyuruyu silmek istediğinize emin misiniz?')"
                    class="sil">
                    SİL
                </a>
            </td>
        </tr>
        <?php } ?>

        <a href="index.php?section=duyuru&action=create">Yeni Duyuru Ekle</a>
    </table>

</div>