
// LİSTELE

function deleteControl(text) {
    return confirm(text);
}

function edit(section, id) {
    location="index.php?section=" + section + "&action=edit&id=" + id;        
}  

// MODAL

function goster(id) {

    var modal = document.getElementById("modal");
    var img = document.getElementById(id);
    var modalImg = document.getElementById("modalContent");
    var captionText = document.getElementById("caption");

    modal.style.display = "block";
    modalImg.src = img.src;
    captionText.innerHTML = img.src;

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

// PRGORAM GOSTER

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
            var haftalar = [1, 2, 3, 4, 5, 6, 0];
            $('#progTable').find("tr:gt(0)").remove();      
            $.each(data.programlar, function(i, item) {
                var tr = '<tr>'; 
                for (let i = 0; i < haftalar.length; i++) {
                    if(item.gun == haftalar[i])
                        tr += '<td onclick="edit(\'program\', ' + item.id + ');" class="prog-edit">' + (item.saat + ' <br> ' + item.etkinlik) + '</td>';     
                    else
                        tr += '<td class="prog-empty">' + '' + '</td>';                      
                }
                tr += '</tr>';

                $('#progTable > tbody:last-child').append(tr);
            });
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

// PRGORAM EKLE

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
            },
            error: function() {
                $("#error").html('Kayıt ekleme başarısız.');
                $("#error").show();
                $('#error').delay(5000).fadeOut('slow');
            }
        });
    }); 
});

