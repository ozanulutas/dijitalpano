
// RESPONSIVE-NAV

function responsive() {
    var nav = document.getElementById("nav-admin");
    if (nav.className === "nav-admin") {
      nav.className += " responsive";
    } else {
      nav.className = "nav-admin";
    }
} 

// SAAT FORMAT

function formatTime(saat) {
    return saat.substr(0, 5);
}

// ÇEŞİTLİ

function deleteControl(text) {
    return confirm(text);
}

function edit(section, id) {
    location = "index.php?section=" + section + "&action=edit&id=" + id;        
}  

function create(section) {
    let id = $('#subeSec').val();
    location = "index.php?section=" + section + "&action=create&sube_id=" + id; 
}

// AKORDİYON

akordiyon();

function akordiyon() {
    var acc = document.getElementsByClassName("accordion");
    
    for (let i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
                panel.style.overflow = 'hidden';
                
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                setTimeout(function() { 
                    panel.style.overflow = 'visible'; 
                }, 200);
            } 
        });
    }
} 

// MODAL

function goster(id) {

    var modal = document.getElementById("modal");
    var img = document.getElementById(id);
    var modalImg = document.getElementById("modalContent");
    var captionText = document.getElementById("caption");
    var caption = img.src.split('/');

    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = caption[caption.length - 1];

    var span = document.getElementsByClassName("close")[0];
    span.onclick = function() {
        modal.style.display = "none";
    } 
}

// TOGGLE RADIO SELECT

$(function() {
    $('.radio').on('click', function() {
        var waschecked = $(this).data('checked');
        if( waschecked ) {
            $(this).prop('checked', false);
        }
        $(this).data('checked', !waschecked)
        $(':radio[name=' + this.name + ']').not(this).data('checked', false);
    });
});

// SELECT ALL - DUYURU-DUZENLE

$(function() {
    $('#selectAll').click(function() {
        if($('#selectAll').text() === 'Seçimi Kaldır') {
            $('#selectAll').text('Tümünü Seç');
            $('.sube-sec').each(function(i, checkbox) {
                $(this).prop('checked', false);
            });
        } else {            
            $('#selectAll').text('Seçimi Kaldır');
            $('.sube-sec').each(function(i, checkbox) {
                $(this).prop('checked', true);
            });
        }
    });
});

// ŞİFREYİ GÖSTER

function showPassword() {
    var inp = document.getElementById("sifre");
    if (inp.type === "password") {
        inp.type = "text";
    } else {
        inp.type = "password";
    }
}

// RESİM CHECKBOX KONTROL

resimSecKontrol();

function resimSecKontrol() {

    if(!$('.resim-sec').is(':checked')) {
        $('#resimSil').prop('disabled', true);
    }
    $('.resim-sec').click(function() {
        $('#resimSil').prop('disabled', false);
    
        if(!$('.resim-sec').is(':checked')) {
            $('#resimSil').prop('disabled', true);
        }
    });
}

// RESİM YÜKLE

$(function() {
    $('#resimForm').submit(function(e) {
        e.preventDefault();
        formData = new FormData(this);
        formData.append('section', 'resim');
        formData.append('action', 'create');
        formData.append('kaydet', 'kaydet');
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: formData,
            contentType:false,
            cache:false,
            processData:false,
            success: function(data) {
                if(data) {
                    $("#error").html(data);
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');
                } else {
                    location.reload();
                }
            },
            error: function() {
                $("#error").html('Hata');
                $("#error").show();
                $('#error').delay(5000).fadeOut('slow');
            }
        });
    }); 
});

// AJAX - PRGORAM GOSTER

progGoster();

function progGoster() {

    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'program', 
            action: 'show',
            sube_id: $('#subeSec').val()
        },
        dataType: 'json',

        success: function(data) {  
            (data.programlar == null) ? $('#progSil').hide() : $('#progSil').show();

            var gunler = ['Pazartesi', 'Salı', 'Çarşamba', 'Perşembe', 'Cuma', 'Cumartesi', 'Pazar'];
            var maxRow = 0;
            for (let i in data.programlar) {
                if (maxRow < data.programlar[i].length)
                    maxRow = data.programlar[i].length;                         
            }
            
            $('#progTable').find("tr:gt(0)").remove();  

            for (let i = 0; i < maxRow; i++) {
                var row = '<tr>';
                for (let j = 0; j < gunler.length; j++) {
                    
                    if ((typeof data.programlar[j] !== 'undefined') && (typeof data.programlar[j][i] !== 'undefined')) {
                        row += '<td onclick="edit(\'program\', ' + data.programlar[j][i]['id'] + ');" class="prog-edit">' 
                        + formatTime(data.programlar[j][i]['saat']) 
                        + '<br>' 
                        + data.programlar[j][i]['etkinlik']
                        + '</td>';
                    }
                    else {
                        row += '<td class="td-empty"></td>'; 
                    }
                } 
                row += '</tr>';
                $('#progTable > tbody:last-child').append(row);
            }
        },
    });
    $('.subeId').each(function(){
        $(this).val($('#subeSec').val());
    });
}

$(function() {
    $('#subeSec').change(function() {        
        progGoster();
        


    }); 
});


// PRGORAM EKLE - AJAX

$(function() {
    $('#progEkle').click(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'program', 
                action: 'create',
                formData: $("#progForm").serialize(),
            },
            dataType: 'json',
            success: function(data) {
                console.log(data);
                if(data.id > 0) {
                    $("#success").html('Kayıt başarıyla eklendi.');
                    $("#success").show();
                    $('#success').delay(5000).fadeOut('slow');
                    
                    $('#etkinlik').val('');
                    $('#saat').val('');
                    $('#bitis_saat').val('');
                } else {
                    $("#error").html('Lütfen tüm alanları doldurun.');
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');
                }
            },
            error: function() {
                $("#error").html('Kayıt ekleme başarısız.');
                $("#error").show();
                $('#error').delay(5000).fadeOut('slow');
            }
        });
    }); 
});

// PROG IMPORT

$(document).ready(function(){
    $('#importForm').on('submit', function(event){
        event.preventDefault();
        var formData = new FormData(this);
        formData.append('section', 'program');
        formData.append('action', 'import');
        formData.append('import', 'import');
        formData.append('sube_id', $('#subeSec').val());
        $.ajax({
            url: "index.php",
            method: "POST",
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend: function() {
                $('#import').attr('disabled', 'disabled');
                $('#import').css('cursor', 'default');
                $('#import').text('Aktarılıyor...');
            },
            success: function(data) {
                console.log(data);
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');

                $('#importForm')[0].reset();
                $('#import').attr('disabled', false);
                $('#import').text('İçe Aktar');
                $('#import').css('cursor', 'pointer');

                progGoster();
            }
        });
    });
});

// THUMBNAIL KAYDET 
/*
function thumbnail() {

    var input = document.getElementById('inpFile');
    var img = document.getElementById('thumbnail');

    if(input != null) {
        input.addEventListener('change', function(event) {
            var file = this.files[0];
            var url = URL.createObjectURL(file);
            var video = document.createElement('video');
            video.src = url;

            var snapshot = function(){
                var canvas = document.createElement('canvas');
                canvas.width = 200;
                canvas.height = 200;
                var ctx = canvas.getContext('2d');
                
                ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
                img.src = canvas.toDataURL('image/png');
                video.removeEventListener('canplay', snapshot);

                $('#uri').val(img.src);
            };
            video.addEventListener('canplay', snapshot);

            let tmpName = $('#inpFile').val().split(/[\\\/]/);    
            if(tmpName[tmpName.length - 1].includes('.')) {
                tmpName[tmpName.length - 1] = tmpName[tmpName.length - 1].substr(0, tmpName[tmpName.length - 1].lastIndexOf("."));
            } 
            $('#fname').val(tmpName[tmpName.length - 1]);
        });
    }
}
thumbnail();*/

// VIDEO RADIO KONTROL

/*videoSecKontrol();

function videoSecKontrol() {

    if(!$('.video-sec').is(':checked')) {
        $('#videoSil').prop('disabled', true);
    }

    $('.video-sec').click(function() {
        $('#videoSil').prop('disabled', false);
        $('#yayinla').prop('disabled', false);
    
        if(!$('.video-sec').is(':checked')) {
            $('#videoSil').prop('disabled', true);
        }
    });
}*/

// VIDEO GOSTER

function videoGoster(id) {

    $(function() {    
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'video', 
                action: 'ajax',
                command: 'show',
                video_id: id,
            },
            dataType: 'json',

            success: function(data) {  
                // $('#modalContent video source').attr('src', data.video.yol);
                // $("#modalContent video")[0].load();  
                $('#modalContent iframe').attr('src', data.video.yol);
                // $("#modalContent iframe")[0].load(); 
                
                var modal = document.getElementById("modal");
                var captionText = document.getElementById("caption");
                // var caption = data.video.yol.split('/');
            
                modal.style.display = "block";
                // captionText.innerHTML = caption[caption.length - 1];
                captionText.innerHTML = data.video.isim
            
                var span = document.getElementsByClassName("close")[0];
                span.onclick = function() {
                    modal.style.display = "none";
                    // $("#modalContent video")[0].pause();
                    // $("#modalContent video")[0].currentTime = 0;
                    // $("#modalContent iframe")[0].pause();
                    // $("#modalContent iframe")[0].currentTime = 0;
                    $('#modalContent iframe').attr('src', '');
                }     
            }            
        });
    });            
}

// VIDEO YAYINLA
// YENİ
function yayinla() {

    $(function() {    
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'video', 
                action: 'publish',
                id: $('input[name="id[]"]:checked').serialize(),
            },

            success: function(data) { 
                console.log(data); 
                if(data != '') {

                    $("#success").html(data);
                    $("#success").show();
                    $('#success').delay(5000).fadeOut('slow');
                }                
            }            
        });
    });
} 

// VIDEO YAYINDAN KALDIR
// YENİ
function yayindanKaldir() {

    $(function() {    
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'video', 
                action: 'unpublish',
                id: $('input[name="id[]"]:checked').serialize(),
            },

            success: function(data) {  
                if(data != '') {

                    $('input[name="id[]"]:checked').prop('checked', false);

                    $("#success").html(data);
                    $("#success").show();
                    $('#success').delay(5000).fadeOut('slow');
                }                
            }      
        });
    });
} 

/*
// ESKİ
function yayinla() {

    $(function() {    
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'video', 
                // action: 'ajax',
                // command: 'edit',
                action: 'edit',
                command: 'yayinla',
                video_id: $('input[name=video_id]:checked').val()
            },

            success: function(data) {  
                if(data != '') {

                    $("#success").html(data);
                    $("#success").show();
                    $('#success').delay(5000).fadeOut('slow');
                }                
            }            
        });
    });
} 
*/

// VIDEO YAYINDAN KALDIR

// ESKİ
/*
function yayindanKaldir() {

    $(function() {    
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'video', 
                action: 'edit',
                command: 'yayindanKaldir',
                video_id: $('input[name=video_id]:checked').val()
            },

            success: function(data) {  
                if(data != '') {

                    $('input[name=video_id]:checked').prop('checked', false);

                    $("#success").html(data);
                    $("#success").show();
                    $('#success').delay(5000).fadeOut('slow');
                }                
            }      
        });
    });
} */

// VIDEO EMBED
/*
$(function() {  
    $('#embedForm').on('submit', function(e) {
        e.preventDefault();

        $(function() {    
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: {
                    section: 'video', 
                    action: 'embed',
                    link: $('#embedLink').val()
                },
    
                success: function(data) { 
                    console.log(data); 
                    if(data == 'err') {
                        $("#error").html('Önce yayındaki videoyu kaldırın.');
                        $("#error").show();
                        $('#error').delay(5000).fadeOut('slow');

                    }  
                    else if(data == 'succ') {
                        $("#success").html('Video yayında.');
                        $("#success").show();
                        $('#success').delay(5000).fadeOut('slow');
                    }             
                }      
            });
        });
    });
});
*/
// VİDEO UPLOAD - DENEME

$(function() {  
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('section', 'video');
        formData.append('action', $('#uploadForm').attr('action'));
        formData.append('kaydet', 'kaydet');

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: formData,
            contentType:false,
            cache:false,
            processData:false,
            xhr: function () {
                const progressBarFill = document.querySelector('#progressBar > .progress-bar-fill');
                const progressBarText = progressBarFill.querySelector('.progress-bar-text');
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener('progress', e => {
                    const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
                    progressBarFill.style.width = percent.toFixed(2) + '%';
                    progressBarText.textContent = percent.toFixed(2) + '%';
                });
                return xhr;
            },
            beforeSend: function() {
                $('#videoYukle').hide();
                $('#videoYukle').attr('disabled', 'disabled');
                $('#progressBar').fadeIn();            
            },            
            success: function(data) {  
                if(data) {
                    $('#progressBar').hide();
                    $('#videoYukle').show();
                    $('#videoYukle').attr('disabled', false);
                    $("#error").html(data);
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');
                } else {
                    location = "index.php?section=video"; 
                }
            }            
        });
    });

    $('#videoCancel').click(function() {
        location = "index.php?section=video";
    });
});

// VİDEO UPLOAD - ORJ
/*
$(function() {  
    $('#uploadForm').on('submit', function(e) {
        e.preventDefault();
        var formData = new FormData(this);
        formData.append('section', 'video');
        formData.append('action', 'create');
        formData.append('kaydet', 'kaydet');
        formData.append('sube_id', $('#subeSec').val());

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: formData,
            contentType:false,
            cache:false,
            processData:false,
            xhr: function () {
                const progressBarFill = document.querySelector('#progressBar > .progress-bar-fill');
                const progressBarText = progressBarFill.querySelector('.progress-bar-text');
                var xhr = new window.XMLHttpRequest();

                xhr.upload.addEventListener('progress', e => {
                    const percent = e.lengthComputable ? (e.loaded / e.total) * 100 : 0;
                    progressBarFill.style.width = percent.toFixed(2) + '%';
                    progressBarText.textContent = percent.toFixed(2) + '%';
                });
                return xhr;
            },
            beforeSend: function() {
                $('#videoYukle').hide();
                $('#videoCancel').show();
                $('#videoYukle').attr('disabled', 'disabled');
                $('#progressBar').fadeIn();            
            },            
            success: function(data) {  
                if(data) {
                    $('#progressBar').hide();
                    $('#videoYukle').show();
                    $('#videoYukle').attr('disabled', false);
                    $('#videoCancel').hide();
                    $("#error").html(data);
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');
                } else {
                    location.reload();
                }
            }            
        });
    });

    $('#videoCancel').click(function() {
        location.reload();
    });
});*/

// TEMA GOSTER

const defaultColor = ["#ff5f01", "#feac00", "#ffb933", "#800000", "#ffc933", "#ff9100"];

$(function() {
    cssGoster();

    $('.cssSubeSec').click(function() {
        cssGoster();       
    });

    $('#cssForm').submit(function(e) {
        e.preventDefault();
        cssKaydet();
    });

    $('#varsayilan').click(function() {
        cssVarsayilan();
    });
});

function cssGoster() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'css',
            action: 'show',
            sube_id: $('#cssSubeSec').val(),
        },
        dataType: 'json',

        success: function(data) {
            var cssId = document.getElementsByClassName('css_id');
            var cssValue = document.getElementsByClassName('css_value');

            $('#cssForm').attr('action', data.action);
            
            for(let i = 0; i < cssId.length; i++) {
                if(data.css.length > 0) {
                    cssId[i].value = data.css[i].id;
                    cssValue[i].value = data.css[i].value;
                } else {
                    cssValue[i].value = defaultColor[i];
                }
            }
        }
    });
}

// TEMA VARSAYILAN

function cssVarsayilan() {
    var cssValue = document.getElementsByClassName('css_value');
    for(let i = 0; i < cssValue.length; i++) {
        cssValue[i].value = defaultColor[i];
    }
}

// TEMA KAYDET & GÜNCELLE
    
function cssKaydet() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'css',
            action: $('#cssForm').attr('action'),
            sube_id: $('#cssSubeSec').val(),
            css_id: $('.css_id').serializeArray(),
            css_name: $('.css_name').serializeArray(),
            css_value: $('.css_value').serializeArray(),
        },
        success: function(data) {
            $("#success").html(data);
            $("#success").show();
            $('#success').delay(5000).fadeOut('slow');
        }
    });
}

// TERCİH GÜNCELLE

$(function() {
    $('#tercihForm').submit(function(e) {
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'tercih',
                action: 'edit',
                ozellik: $('.ozellik').serializeArray(),
                deger: $('.deger').serializeArray(),
            },
            success: function(data) {
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');
            }
        });
    });
});

// KULLANICI GÜNCELLE

$(function() {
    $('#kullaniciFormIptal').click(function(e) {
        e.preventDefault();
        location = "index.php?section=kullanici";  
    });

    $('#kullaniciEditForm').submit(function(e) {
        e.preventDefault();
        console.log($('#kullaniciEditForm').serialize());
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'kullanici',
                action: 'edit',
                formData: $('#kullaniciEditForm').serialize(),
            },
            success: function(data) {
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');
            }
        });
    });
});

// KULLANICI ADI KONTROL

$(function() {
    $('#k_adi').blur(function() {
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'kullanici',
                action: 'validate',
                k_adi: $('#k_adi').val(),
                validate: 'validate',
                currAction: $('#currAction').val(),
            },
            success: function(data) {
                if(data != "") {
                    $("#error").html(data);
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');

                    $('#kullaniciKaydet').prop('disabled', true);
                } else {
                    $('#kullaniciKaydet').prop('disabled', false);
                }
            }
        });
    });
});

// DUYURU FİLTRE

filter('hepsi');

function filter(sube) {
    if(sube == 'hepsi') 
        $('.filter').show();
    else {
        $('.filter').hide();
        $('.' + sube).show();
    }
}