
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <div id="success" class="fade"></div>
    <div id="error" class="fade"></div>

    <div class="btn-sil-wrapper">
        <a href="#" class="" id="varsayilan">
            Varsayılan Ayarlara Dön
        </a>
    </div>        

    <form  class="form" id="cssForm" action="" method="post">    

        <h3 class="form-item">Şube</h3>
        <select name="sube_id" id="cssSubeSec">           
            <?php foreach($data['subeler'] as $sube) { ?>
                <option value="<?php echo $sube->id; ?>" class="cssSubeSec">
                    <?php echo $sube->isim; ?>
                </option> <?php 
            } ?>
        </select>

        <div class="color-group">
            <div>
                <h3>Renk 1</h3>
                <input type="hidden" name="id[]" class="css_id" value=""> 
                <input type="hidden" name="name[]" class="css_name" value="--renk-1"> 
                <input type="color" name="value[]" class="css_value" value="#ff5f01">
            </div>
            <div>
                <h3>Renk 2</h3>
                <input type="hidden" name="id[]" class="css_id" value=""> 
                <input type="hidden" name="name[]" class="css_name" value="--renk-2"> 
                <input type="color" name="value[]" class="css_value" value="#feac00">
            </div>

            <div>
                <h3>Renk 3</h3>
                <input type="hidden" name="id[]" class="css_id" value=""> 
                <input type="hidden" name="name[]" class="css_name" value="--renk-3"> 
                <input type="color" name="value[]" class="css_value" value="#ffb933">
            </div>
            <div>
                <h3>Renk 4</h3>
                <input type="hidden" name="id[]" class="css_id" value=""> 
                <input type="hidden" name="name[]" class="css_name" value="--renk-4"> 
                <input type="color" name="value[]" class="css_value" value="#800000">
            </div>
            <div>
                <h3>Renk 5</h3>
                <input type="hidden" name="id[]" class="css_id" value=""> 
                <input type="hidden" name="name[]" class="css_name" value="--renk-5"> 
                <input type="color" name="value[]" class="css_value" value="#ffc933">
            </div>
            <div>
                <h3>Renk 6</h3>
                <input type="hidden" name="id[]" class="css_id" value=""> 
                <input type="hidden" name="name[]" class="css_name" value="--renk-6"> 
                <input type="color" name="value[]" class="css_value" value="#ff9100">
            </div>
        </div>
        
        <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button> <br>
        <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br>
    </form>

</div>

