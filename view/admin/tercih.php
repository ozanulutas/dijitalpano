
<div class="form-wrapper">
    <h2 class="baslik"> <?php echo $data['baslik']; ?> </h2>
</div>

<hr>

<div class="form-wrapper">

    <div id="success" class="fade"></div>

    
    
    <div class="accordion form-item">Renk Ayarları</div>    
    <div class="panel">
        
        <form class="form" id="cssForm" action="" method="post">   
            <div class="btn-sil-wrapper select-all" >
                <span id="varsayilan" class="bolum-baslik">
                    Varsayılan Ayarlara Dön
                </span>
            </div>        

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
                    <div class="tooltip">
                        <h3>Renk 1</h3>
                        <span class="tooltiptext">Saat, tarih ve program arka plan rengi.</span>
                    </div>
                    <input type="hidden" name="id[]" class="css_id" value=""> 
                    <input type="hidden" name="name[]" class="css_name" value="--renk-1"> 
                    <input type="color" name="value[]" class="css_value" value="#ff5f01">
                </div>
                <div>
                    <div class="tooltip">
                        <h3>Renk 2</h3>
                        <span class="tooltiptext">Duyuru arka plan rengi.</span>
                    </div>
                    <input type="hidden" name="id[]" class="css_id" value=""> 
                    <input type="hidden" name="name[]" class="css_name" value="--renk-2"> 
                    <input type="color" name="value[]" class="css_value" value="#feac00">
                </div>

                <div>
                    <div class="tooltip">
                        <h3>Renk 3</h3>
                        <span class="tooltiptext">Slide arka plan rengi.</span>
                    </div>
                    <input type="hidden" name="id[]" class="css_id" value=""> 
                    <input type="hidden" name="name[]" class="css_name" value="--renk-3"> 
                    <input type="color" name="value[]" class="css_value" value="#ffb933">
                </div>
                <div>
                    <div class="tooltip">
                        <h3>Renk 4</h3>
                        <span class="tooltiptext">Saat gölgesi ve tarih rengi.</span>
                    </div>
                    <input type="hidden" name="id[]" class="css_id" value=""> 
                    <input type="hidden" name="name[]" class="css_name" value="--renk-4"> 
                    <input type="color" name="value[]" class="css_value" value="#800000">
                </div>
                <div>
                    <div class="tooltip">
                        <h3>Renk 5</h3>
                        <span class="tooltiptext">Hava durumu günleri arka plan rengi.</span>
                    </div>
                    <input type="hidden" name="id[]" class="css_id" value=""> 
                    <input type="hidden" name="name[]" class="css_name" value="--renk-5"> 
                    <input type="color" name="value[]" class="css_value" value="#ffc933">
                </div>
                <div>
                    <div class="tooltip">
                        <h3>Renk 6</h3>
                        <span class="tooltiptext">Hava durumu arka plan rengi.</span>
                    </div>
                    <input type="hidden" name="id[]" class="css_id" value=""> 
                    <input type="hidden" name="name[]" class="css_name" value="--renk-6"> 
                    <input type="color" name="value[]" class="css_value" value="#ff9100">
                </div>
            </div>
            
            <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button> <br>
            <!-- <button type="submit" name="iptal" formnovalidate class="form-item cancel-btn">İptal</button> <br> -->
        </form>
  
    </div>


    <div class="accordion form-item">Hız Ayarları</div>
    <div class="panel">
        <form action="" metho="post" id="tercihForm" class="form">

            <!-- <div id="success" class="fade"></div> -->

            <h3>Kayan Yazı Hızı</h3>
            <input type="hidden" name="ozellik[]" class="ozellik" value="marquee_hiz">
            <input type="number" name="deger[]" class="deger" min="0" value="<?php echo $data['tercihler']['marquee_hiz']->deger ?? ''; ?>">

            <h3>Slide Hızı</h3>
            <input type="hidden" name="ozellik[]" class="ozellik" value="slide_hiz">
            <input type="number" name="deger[]" class="deger" min="0" value="<?php echo $data['tercihler']['slide_hiz']->deger / 1000 ?? ''; ?>">

            <button type="submit" name="kaydet" class="form-item submit-btn">Kaydet</button>
        </form>
    </div>
    
</div>

