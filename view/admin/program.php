
<div class="form-wrapper duyuru-wrapper">
    <h2><?php echo $data['baslik']; ?></h2>
</div>

<hr>

<div class="form-wrapper duyuru-wrapper">
    
    <div id="success" class="fade form-item"></div>
    
    <div class="prog-secenek-wrapper">

        <div class="select-group">
            <select name="sube_id" id="subeSec" class="sec form-item"> 
                <?php foreach($data['subeler'] as $sube) { ?>
                <option value="<?php echo $sube->id; ?>" <?php if(isset($_GET['sube_id'])) echo ($_GET['sube_id'] == $sube->id) ? 'selected' : '' ?>>
                    <?php echo $sube->isim; ?>
                </option>
                <?php } ?>
            </select>  
        </div> 

        <div class="accordion-group">
            <div class="accordion form-item">Seçili Şubeden...</div>
            <div class="panel">

                <form id="importForm">   
                    <input type="file" name="yol" class="form-item" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" required>        
                    <button type="submit" name="import" id="import" class="form-item btn btn-aktar">İçe Aktar</button> 
                </form>

                <hr>
                
                <form method="post" action="index.php?section=program&action=export" id="exportForm">
                    <input type="hidden" name="sube_id" val="" class="subeId">
                    <select name="file_type" id="fileType" class="sec form-item">
                        <option value="Xlsx">Xlsx</option>
                        <option value="Xls">Xls</option>
                        <option value="Csv">Csv</option>
                    </select>                
                    <button type="submit" name="export" class="form-item btn btn-aktar" id="export">Dışa Aktar</button> 
                </form>                

            </div>
        </div>

    </div>


    <div class="islem-group">

        <span class="create" onclick="create('program')">Yeni Etkinlik Ekle</span>

        <form action="index.php?section=program&action=delete" method="post" id="progSil">
            <input type="hidden" name="sube_id" val="" class="subeId">
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