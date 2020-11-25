
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <a href="index.php?section=kullanici&action=create" class="ekle">Yeni Kullanıcı Ekle</a>

    <table>
        <tr>
            <th>Kullanıcı Adı</th>
        </tr>
        <?php foreach($data['kullanicilar'] as $kullanici) { ?>
        <tr class="td-empty">
            <td>
                <?php echo htmlspecialchars($kullanici->k_adi); ?>
            </td>
        </tr>
        <?php } ?>        
        
    </table>
        
</div>