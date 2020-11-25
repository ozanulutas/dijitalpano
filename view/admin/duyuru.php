
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
                <?php echo htmlspecialchars($sube->isim); ?>
            </option>
            <?php } ?>
        </select>  
    </div> 

    <a href="index.php?section=duyuru&action=create" class="ekle">Yeni Duyuru Ekle</a>

    <table class="duyuru-table">
        <tr>
            <th>Duyuru Metni</th>
            <th>Yayınlanma Tarihi</th>
            <th>Bitiş Tarihi</th>
            <th>Şubeler</th>
            <th class="td-input">Seçenek</th>
        </tr>
        
        <?php foreach($data['duyurular'] as $duyuru) { ?>
        <tr class="filter <?php echo $data['subeFiltre'][$duyuru->id] ?? ''; ?>">
            <td class="duyuru-metin" onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo htmlspecialchars($duyuru->metin); ?>
            </td>
            <td onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo $duyuru->yayin_tarih; ?>
            </td>
            <td onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo $duyuru->bitis_tarih; ?>
            </td>
            <td onclick="edit('duyuru', <?php echo $duyuru->id; ?>)">
                <?php echo htmlspecialchars($data['sube'][$duyuru->id] ?? ''); ?>                
            </td>
            <td class="td-empty td-input">
                <a href="index.php?section=duyuru&action=delete&id=<?php echo $duyuru->id; ?>"
                    onclick="return deleteControl('Duyuruyu silmek istediğinize emin misiniz?')"
                    class="sil">
                    SİL
                </a>
            </td>
        </tr>
        <?php } ?>
        
    </table>

</div>