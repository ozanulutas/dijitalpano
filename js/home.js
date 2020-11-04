

// HAVA

!function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if(!d.getElementById(id)) {
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://weatherwidget.io/js/widget.min.js';
        fjs.parentNode.insertBefore(js, fjs);
    }
}(document, 'script', 'weatherwidget-io-js');

// TARİH

var tarih = new Date();
var aylar = ["Ocak", "Şubat", "Mart", "Nisan", "Mayıs", "Haziran", "Temmuz", "Ağustos", "Eylül", "Ekim", "Kasım", "Aralık"];
var gunler = ["PAZAR", "PAZARTESİ", "SALI", "ÇARŞAMBA", "PERŞEMBE", "CUMA", "CUMARTESİ"];
var hava = document.getElementById('hava');
hava.setAttribute('data-label_1', tarih.getDate() + ' ' + aylar[tarih.getMonth()]);
hava.setAttribute('data-label_2', gunler[tarih.getDay()]);

// SAAT GÖLGESİ

var saat = document.getElementById('saat');
var shadow = '';
for(var i = 0; i < 500; i++) {
    shadow += (shadow ? ',' : '') + i * 1 + 'px ' + i * 1 + 'px 0 #9d2c00';        
}
saat.style.textShadow = shadow;

// TİK TAK

function saatGoster() {
    var saat = new Date();
    document.getElementById('saat').innerHTML = saat.getHours() + ':' + (saat.getMinutes() < 10 ? '0' : '') + saat.getMinutes();
    setTimeout('saatGoster()', 6000);
}   
saatGoster();

// MARQUEE

function isElementOverflowing(element) {
    var overflowX = element.offsetWidth < element.scrollWidth,
        overflowY = element.offsetHeight < element.scrollHeight;
    return (overflowX || overflowY);
}   

function marquee(){
    var metin = document.getElementsByName('marquee');
    var overflow = document.getElementsByClassName('overflow');
    
    for (var i = 0; i < metin.length; i++) {
        if(isElementOverflowing(overflow[i])) {
            metin[i].className = 'marquee';
        }             
    }
}
marquee();

// SIDENAV

function openNav() {
    var sidenav = document.getElementById("sidenav");
    sidenav.style.width = '250px';
    sidenav.style.padding = '1%';
}

function closeNav() {
    var sidenav = document.getElementById("sidenav");
    sidenav.style.width = '0';
    sidenav.style.padding = '0';
}

// DUYURULAR - AJAX

function duyuruGoster() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'home', 
            action: 'ajax',
            command: 'goster',
            sube_id: $('#subeSec').val()
        },
        dataType: 'json',
        success: function(data) {                
            $('#duyuru').empty();

            for (let i in data.duyurular) {
                var item = data.duyurular[i]['metin'];
                $('#duyuru').append($('<p>', {
                    text: item
                }));                    
            }
            marquee();

            $('#prog').empty();
            // for (var i in data.programlar) {
            //     var item = data.programlar[i]['etkinlik'];
            //     $('#prog').append($('<p>', {
            //         text: item
            //     }));                    
            // }

            for (let i = 0; i < data.programlar.length; i++) {
                var simdiki = data.programlar[i]['etkinlik'];
                var sonraki = '';

                if(i < data.programlar.length - 1) {
                    i++;
                    sonraki = data.programlar[i]['etkinlik'];
                }
                //simdiki += data.programlar[i]['etkinlik'];
                $('#prog').append($('<p>', {
                    text: simdiki + ' - ' + sonraki
                }));                  
            }

            console.log(data)
        },
        error: function() {
            //$('#header').html('hata');
        }
    });
}

$(function() {
    $('#subeSec').change(function(){ 
        duyuruGoster();
    });
    duyuruGoster();
});

// MODAL

var modal = document.getElementById("modal");
var btn = document.getElementById("open-modal");
var span = document.getElementById("close-modal");

if(btn !== null) {
    btn.onclick = function() {
        modal.style.display = "block";
        console.log(modal);
    }
}

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }    
} 

// SLIDE

var slideIndex = 0;
showSlides();

function showSlides() {
    
    var i;
    var slides = document.getElementsByClassName("slide");
    var dots = document.getElementsByClassName("dot");
    
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    
    slideIndex++;
    if (slideIndex > slides.length) slideIndex = 1;

    slides[slideIndex - 1].style.display = "flex";
    dots[slideIndex-1].className += " active";
    
    marquee();
    
    //setTimeout(showSlides, 4000);     
} 



