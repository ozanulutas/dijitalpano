
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <table>
        <tr>
            <th>Kullanıcı Adı</th>
        </tr>
        <?php foreach($data['kullanicilar'] as $kullanici) { ?>
        <tr class="td-empty">
            <td>
                <?php echo $kullanici->k_adi; ?>
            </td>
        </tr>
        <?php } ?>
        
        <a href="index.php?section=kullanici&action=create">Yeni Kullanıcı Ekle</a>
    </table>
        
</div>