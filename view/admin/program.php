
<div class="form-wrapper duyuru-wrapper">
    <h2><?php echo $data['baslik']; ?></h2>
</div>

<hr>

<div class="form-wrapper duyuru-wrapper">
    
    <select name="sube_id" id="subeSec" class="sec">     
        <?php foreach($data['subeler'] as $sube) { ?>
        <option value="<?php echo $sube->id; ?>" <?php if(isset($_GET['sube_id'])) echo ($_GET['sube_id'] == $sube->id) ? 'selected' : '' ?>>
            <?php echo $sube->isim; ?>
        </option>
        <?php } ?>
    </select> 

    <div class="islem-group">
        <span class="create" onclick="create('program')">Yeni Etkinlik Ekle</span>

        <form action="index.php?section=program&action=delete" method="post">
            <input type="hidden" name="sube_id" val="" id="subeId">
            <div class="btn-sil-wrapper">
                <button type="submit" name="topluSil" class="btn-sil" onclick="return deleteControl('Seçili şubeye ait programı silmek istediğinize emin misiniz?')">Programı Sil</button>
            </div>
        </form>
    </div>


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
        
        <!-- <?php /*for($i = 0; $i < count(max($data['programlar'])); $i++) { ?>
        <tr>
            <?php foreach(array_keys(HAFTALAR) as $gun) { ?>
            <td>
                <?php 
                echo $data['programlar'][$gun][$i]->saat ?? '';
                echo '<br>'; 
                echo $data['programlar'][$gun][$i]->etkinlik ?? ''; 
                ?>
            </td> <?php
            } ?>
        </tr> <?php
        } */?> -->

        <!-- <a href="index.php?section=program&action=create" id="programEkle">Yeni Program Ekle</a> -->
    </table>

</div>