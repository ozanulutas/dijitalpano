
<!-- SIDENAV -->

<nav id="sidenav">
   
    <div class="closenav-wrapper">
        <span class="closenav" onclick="closeNav()">&times;</span>
    </div>
    

    <div class="sidenav-item">Şube Seçin:</div> 
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
            <a href="index.php?section=sube">Admin Paneli</a> <?php
        }
        else { ?>
            <a href="#" id="open-modal" class="giris">Giriş</a> <?php
        } ?>
    </div>

</nav>       

<button class="opennav" onclick="openNav()" >&#9776;</button>

<!-- LOGIN MODAL -->

<div id="modal">
    <div class="modal-content">
        
        <span id="close-modal" class="closenav">&times;</span>    
        
        <form action="index.php?section=home&action=login" method="post" class="modal-form">

            <div class="form-item">Kullanıcı Adı</div>            
            <input type="text" name="k_adi" class="form-item" placeholder="Kullanıcı adınızı girin">
            

            <div class="form-item">Şifre</div>            
            <input type="text" name="sifre" class="form-item" placeholder="Şifrenizi adınızı girin">   
            
            <input type="submit" value="Giriş" name=giris class="form-item submit-btn">
            
        </form>

    </div>
</div>