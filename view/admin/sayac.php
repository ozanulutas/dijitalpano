
<div class="form-wrapper duyuru-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
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
    
    <a href="index.php?section=sayac&action=create">Yeni Geri Sayım Ekle</a>    

    <table class="duyuru-table">
        <tr>
            <th>Etkinlik Adı</th>
            <th>Etkinlik Tarihi</th>
            <th>Yayınlanma Tarihi</th>
            <th>Şubeler</th>
            <th>Seçenek</th>
        </tr>
        <?php foreach($data['sayaclar'] as $sayac) { ?>
        <tr class="filter <?php echo $data['subeFiltre'][$sayac->id] ?? ''; ?>">
            <td onclick="edit('sayac', <?php echo $sayac->id; ?>)">
                <?php echo $sayac->etkinlik; ?>
            </td>
            <td onclick="edit('sayac', <?php echo $sayac->id; ?>)">
                <?php echo $sayac->tarih . '<br>' . $sayac->saat; ?>
            </td>
            <td onclick="edit('sayac', <?php echo $sayac->id; ?>)">
                <?php echo $sayac->yayin_tarih; ?>
            </td>
            <td onclick="edit('sayac', <?php echo $sayac->id; ?>)">
                <?php echo $data['sube'][$sayac->id] ?? ''; ?>                
            </td>
            <td class="td-empty">
                <a href="index.php?section=sayac&action=delete&id=<?php echo $sayac->id; ?>"
                    onclick="return deleteControl('Geri sayımı silmek istediğinize emin misiniz?')"
                    class="sil">
                    SİL
                </a>
            </td>
        </tr>
        <?php } ?>
        
        
    </table>
        
</div>
