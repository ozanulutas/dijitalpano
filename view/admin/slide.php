
<div class="form-wrapper duyuru-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

    <hr>

<div class="form-wrapper duyuru-wrapper">

    <table class="duyuru-table">
        <tr>
            <th>Slide Başlığı</th>
            <th>Slide Metni</th>
            <th>Tarih</th>
            <th colspan="2">Resim</th>
        </tr>

        <?php foreach($data['slidelar'] as $slide) { ?>
        <tr>
            <td onclick="edit('slide', <?php echo $slide->id; ?>)">
                <?php echo $slide->baslik; ?>
            </td>
            <td onclick="edit('slide', <?php echo $slide->id; ?>)">
                <?php echo $slide->metin; ?>
            </td>
            <td onclick="edit('slide', <?php echo $slide->id; ?>)">
                <?php echo $slide->tarih; ?>
            </td>
            <td onclick="edit('slide', <?php echo $slide->id; ?>)">
                <img src="<?php echo $data['resimler'][$slide->resim_id]->yol ?? ''; ?>" alt="">                
            </td>
            <td class="td-empty">
                <a href="index.php?section=slide&action=delete&id=<?php echo $slide->id; ?>"
                    onclick="return deleteControl('Slide\'ı silmek istediğinize emin misiniz?')"
                    class="sil">
                    SİL
                </a>
            </td>
        </tr>
        <?php } ?>
        
        <a href="index.php?section=slide&action=create">Yeni Slide Ekle</a>
    </table>
        
</div>