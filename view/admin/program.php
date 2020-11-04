
<div class="form-wrapper duyuru-wrapper">
    <h2><?php echo $data['baslik']; ?></h2>
</div>

<hr>

<div class="form-wrapper duyuru-wrapper">

    <form action="index.php?section=program&action=create" method="post">
        <select name="sube_id" id="subeSec">     
            <?php foreach($data['subeler'] as $sube) { ?>
            <option value="<?php echo $sube->id; ?>" <?php if(isset($_GET['sube_id'])) echo ($_GET['sube_id'] == $sube->id) ? 'selected' : '' ?>>
                <?php echo $sube->isim; ?>
            </option>
            <?php } ?>
        </select> 
        <button type="submit" name="ekle">Yeni Etkinlik Ekle</button>
    </form>

    <form action="index.php?section=program&action=delete" method="post">
        <input type="hidden" name="sube_id" val="" id="subeId">

        <div class="btn-sil-wrapper">
            <button type="submit" name="topluSil" class="btn-sil" onclick="return deleteControl('Seçili şubeye ait programı silmek istediğinize emin misiniz?')">Programı Sil</button>
        </div>
    </form>


    <table class="duyuru-table" id="progTable">
        <tr>
            <th>Pazartesi</th>
            <th>Salı</th>
            <th>Çarşamba</th>
            <th>Perşembe</th>
            <th>Cuma</th>
            <th>Cumartesi</th>
            <th>Pazar</th>
        </tr>

        
        
        <?php /*foreach($data['programlar'] as $program) { ?>
        <!-- <tr>
            <td>
                <?php echo ($program->gun == 1) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>
            </td>
            <td>
                <?php echo ($program->gun == 2) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>
            </td>
            <td>
                <?php echo ($program->gun == 3) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>
            </td>
            <td>
                <?php echo ($program->gun == 4) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>               
            </td>
            <td>
                <?php echo ($program->gun == 5) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>
            </td>
            <td>
                <?php echo ($program->gun == 6) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>
            </td>
            <td>
                <?php echo ($program->gun == 0) ? ($program->saat . '<br>' . $program->etkinlik) : ''; ?>
            </td>
        </tr> -->
        <?php }*/ ?>

        <!-- <a href="index.php?section=program&action=create" id="programEkle">Yeni Program Ekle</a> -->
    </table>

</div>