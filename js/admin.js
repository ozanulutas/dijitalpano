
// SAAT FORMAT

function formatTime(saat) {
    return saat.substr(0, 5);
}

// ÇEŞİTLİ

function deleteControl(text) {
    return confirm(text);
}

function edit(section, id) {
    location="index.php?section=" + section + "&action=edit&id=" + id;        
}  

function create(section) {
    let id = $('#subeSec').val();
    location="index.php?section=" + section + "&action=create&sube_id=" + id; 
}

// AKORDİYON


function akordiyon() {
    var acc = document.getElementsByClassName("accordion");
    
    for (let i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
              } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
              } 
        });
    }
} 
akordiyon();

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

// AJAX - PRGORAM GOSTER

progGoster();
function progGoster() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'program', 
            action: 'ajax',
            command: 'goster',
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
                        + (formatTime(data.programlar[j][i]['saat']) + '<br>' + data.programlar[j][i]['etkinlik']) 
                        + '</td>';
                    }
                    else {
                        row += '<td class="prog-empty"></td>'; 
                    }
                } 
                row += '</tr>';
                $('#progTable > tbody:last-child').append(row);
            }
        },
        error: function() {
            //$('#header').html('hata');
        }
    });

    // $('#subeId').val($('#subeSec').val());
    $('.subeId').each(function(){
        $(this).val($('#subeSec').val());
    });
}

$(function() {
    $('#subeSec').change(function() {        
        progGoster();
        
        // $('#subeId').val($('#subeSec').val());
        $('.subeId').each(function(){
            $(this).val($('#subeSec').val());
        });
    }); 
});


// PRGORAM EKLE - AJAX

$(function() {
    $('#progEkle').click(function(e) {
        e.preventDefault();
        
        $.ajax({
            type: 'POST',
            url: 'index.php?section=program&action=ajax',
            //data: $("#form").serialize(),
            data: {
                // section: 'program', 
                // action: 'ajax',
                command: 'insert',
                sube_id: $('#sube_id').val(),
                etkinlik: $('#etkinlik').val(),
                saat: $('#saat').val(),
                gun: $('#gun').val(),
            },
            success: function(data) {   
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');

                $('#etkinlik').val('');
                $('#saat').val('');
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
            url:"index.php",
            method:"POST",
            data: formData,
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function() {
                $('#import').attr('disabled', 'disabled');
                $('#import').css('cursor', 'default');
                $('#import').text('Aktarılıyor...');
            },
            success:function(data) {
                console.log(data);
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');

                $('#importForm')[0].reset();
                $('#import').attr('disabled', false);
                $('#import').text('İçe Aktar');
                $('#import').css('cursor', 'pointer');
            }
        })
    });
});

// THUMBNAIL KAYDET 

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
thumbnail();

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
                $('#modalContent video source').attr('src', data.video.yol);
                $("#modalContent video")[0].load();  
                
                var modal = document.getElementById("modal");
                var captionText = document.getElementById("caption");
                var caption = data.video.yol.split('/');
            
                modal.style.display = "block";
                captionText.innerHTML = caption[caption.length - 1];
            
                var span = document.getElementsByClassName("close")[0];
                span.onclick = function() {
                    modal.style.display = "none";
                    $("#modalContent video")[0].pause();
                    $("#modalContent video")[0].currentTime = 0;
                }     
            }            
        });
    });            
}

// VIDEO YAYIINLA

function yayinla() {

    $(function() {    
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'video', 
                action: 'ajax',
                command: 'edit',
                video_id: $('input[name=video_id]:checked').val()
            },

            success: function(data) {  
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');
            }            
        });
    });
} 

// UPLOAD

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
                $('#yukle').hide();
                $('#videoCancel').show();
                $('#yukle').attr('disabled', 'disabled');
                $('#progressBar').fadeIn();            
            },            
            success: function() {  
                location.reload();
            }            
        });
    });

    $('#videoCancel').click(function() {
        location.reload();
    });
});

// TEMA GOSTER

const defaultColor = ["#ff5f01", "#feac00", "#ffb933", "#800000", "#ffc933", "#ff9100"];


$(function() {
    cssGoster();

    $('.cssSubeSec').click(function() {
        cssGoster(); 
        console.log($('.css_id').serializeArray());       
    });

    // $('#form').submit(function(e) {
    //     e.preventDefault();
    //     cssKaydet();
    // });
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
            // console.log(data);
            var cssId = document.getElementsByClassName('css_id');
            var cssValue = document.getElementsByClassName('css_value');

            $('#form').attr('action', data.action);
            // act = data.action;
            // console.log($('#form').attr('action'));
            
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

// TEMA KAYDET

$('#form').submit(function(e) {
    e.preventDefault();
    
    // function cssKaydet() {
        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'css',
                action: $('#form').attr('action'),
                sube_id: $('#cssSubeSec').val(),
                css_id: $('.css_id').serializeArray(),
                css_name: $('.css_name').serializeArray(),
                css_value: $('.css_value').serializeArray(),
            },
            success: function(data) {
                console.log(data);
                $("#success").html(data);
                $("#success").show();
                $('#success').delay(5000).fadeOut('slow');
            }
        });
    // }
});



