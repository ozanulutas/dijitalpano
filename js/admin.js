
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

// AJAX - PRGORAM GOSTER

/*var ekle = document.getElementById('ekle');
$(function() {
    var formDataArray = new Array();
    $('#ekle').click(function(e) {
        e.preventDefault();
        formData = $('#form').serializeArray();
        formDataArray.push(formData);
        $('#detay').empty();
        $('#detay').append('<h3>Detaylar</h3>');
        for (let i = 0; i < formDataArray.length; i++) {
            var btnText = '';
            for (let j = 0; j < formData.length; j++) {
                btnText += formData[j]['name'] + ' - ' + formData[j]['value'];
                //$('#detay').append(formData[j]['name'] + ' - ' + formData[j]['value'] + '<br>');                
            }
            var btn = $('<button/>', {
                text: btnText,
                class: 'deneme',
            });
            $('#detay').append(btn);
        }
        //$('#detay').html(JSON.stringify(formData));        
        console.log(formDataArray);
    }); 
});*/


/**/progGoster();
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
            var haftalar = [1, 2, 3, 4, 5, 6, 0];
            var maxRow = 0;
            for (let i in data.programlar) {
                if (maxRow < data.programlar[i].length)
                    maxRow = data.programlar[i].length;                         
            }
            
            $('#progTable').find("tr:gt(0)").remove();  

            for (let i = 0; i < maxRow; i++) {
                var row = '<tr>';
                for (let j = 0; j < haftalar.length; j++) {
                    
                    if ((typeof data.programlar[haftalar[j]] !== 'undefined') && (typeof data.programlar[haftalar[j]][i] !== 'undefined')) {
                        row += '<td onclick="edit(\'program\', ' + data.programlar[haftalar[j]][i]['id'] + ');" class="prog-edit">' 
                        + (formatTime(data.programlar[haftalar[j]][i]['saat']) + '<br>' + data.programlar[haftalar[j]][i]['etkinlik']) 
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

    $('#subeId').val($('#subeSec').val());
}

$(function() {
    $('#subeSec').change(function() {        
        progGoster();
        
        $('#subeId').val($('#subeSec').val());
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

// THUMBNAIL KAYDET

var input = document.getElementById('upload');
var img = document.getElementById('thumbnail');

input.addEventListener('change', function(event) {
    var file = this.files[0];
    var url = URL.createObjectURL(file);
    var video = document.createElement('video');
    video.src = url;

    var snapshot = function(){
        var canvas = document.createElement('canvas');
        var ctx = canvas.getContext('2d');
        
        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);
        img.src = canvas.toDataURL('image/png');
        video.removeEventListener('canplay', snapshot);

        $('#uri').val(img.src);
    };
    video.addEventListener('canplay', snapshot);


    let tmpName = $('#upload').val().split(/[\\\/]/);
    //let fileName = tmpName[tmpName.length - 1];
    
    if(tmpName[tmpName.length - 1].includes('.')) {
        tmpName[tmpName.length - 1] = tmpName[tmpName.length - 1].substr(0, tmpName[tmpName.length - 1].lastIndexOf("."));
    }
 
    $('#fname').val(tmpName[tmpName.length - 1]);
});

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
                console.log(data.video.yol);
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

$('.radio').click(function() {
    console.log($('input[name=video_id]:checked').val());
});