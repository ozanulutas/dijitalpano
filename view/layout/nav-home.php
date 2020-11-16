
<!-- SIDENAV -->

<div class="opennav" onclick="openNav()"><span class="custom-btn">&#9776;</span></div>

<nav id="sidenav">
   
    <div class="closenav-wrapper">
        <span class="closenav custom-btn" onclick="closeNav()">&times;</span>
    </div>
    

    <div class="sidenav-item kalin">Şube Seçin:</div> 
    <select name="sube_id" id="subeSec">           
       <?php foreach($data['subeler'] as $sube) { ?>
           <option value="<?php echo $sube->id; ?>"><?php echo $sube->isim; ?></option>
           <?php } ?>
    </select> 
    
    
    <div>
        <hr>
    </div>
    
    <div class="giris-wrapper">
        <?php if(isset($_SESSION['k_id'])) { ?>
            <a href="index.php?section=sube" class="kalin">Admin Paneli</a> <?php
        }/*
        else { ?>
            <span id="open-modal" class="kalin">Giriş</span> <?php
        } */?>
    </div>

</nav>       

<!-- LOGIN MODAL -->

<!-- <div id="modal">
    <div class="modal-content">
        
        <div class="closenav-wrapper">
            <span id="close-modal" class="closenav custom-btn">&times;</span>    
        </div>
        
        <form action="" method="post" class="modal-form" id="loginForm">

            <div id="error" class="fade form-item kalin"></div>

            <div class="form-item kalin">Kullanıcı Adı</div>            
            <input type="text" name="k_adi" id="k_adi" class="form-item" placeholder="Kullanıcı adınızı girin" required>
            
            <div class="form-item kalin">Şifre</div>            
            <input type="password" name="sifre" id="sifre" class="form-item" placeholder="Şifrenizi adınızı girin" required>   
            
            <input type="submit" value="Giriş" id="giris" name="giris" class="form-item submit-btn kalin">
            
        </form>

    </div>
</div> -->