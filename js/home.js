
// TARİH

var zaman = new Date();
const aylar = ["OCAK", "ŞUBAT", "MART", "NİSAN", "MAYIS", "HAZİRAN", "TEMMUZ", "AĞUSTOS", "EYLÜL", "EKİM", "KASIM", "ARALIK"];
const gunler = ["PAZAR", "PAZARTESİ", "SALI", "ÇARŞAMBA", "PERŞEMBE", "CUMA", "CUMARTESİ"];
// var hava = document.getElementById('hava');

tarihGoster();
function tarihGoster() {

    let date = new Date();
    let dt = date.getDate();
    let month = aylar[date.getMonth()];
    let gun = gunler[date.getDay()];

    document.getElementById('tarih').innerHTML = dt + ' ' + month;
    document.getElementById('gun').innerHTML = gun;
}

// HAVA

function havaDurumu(lat, long) {
    console.log(lat);
    console.log(long);
    $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + long + "&units=metric&lang=tr&exclude=minutely,hourly,alerts&appid=fa13191aaafdf33d06c157515cbd09f8", function(data){
     
        var havaDurum = document.getElementsByClassName('hava-durum');
        var gun = document.getElementsByClassName('gun');
        
        for(let i = 0; i < data.daily.length - 1 ; i++) {
            
            var unix_timestamp = data.daily[i+1].dt;
            var date = new Date(unix_timestamp * 1000);
            var icon = data.daily[i].weather[0].icon;
            var temp = data.daily[i].temp.day;         

            if(gun[i]) gun[i].innerHTML = gunler[date.getDay()];                
            havaDurum[i].innerHTML = "<img src='http://openweathermap.org/img/wn/" + icon + "@2x.png' alt=''></img>"
            havaDurum[i].innerHTML += "<br>";
            havaDurum[i].innerHTML += Math.round(temp);

        }
    });
}

function koordinat() {
    navigator.geolocation.getCurrentPosition(getPosition);     
}

function getPosition(position) {
    var lat = position.coords.latitude;
    var long = position.coords.longitude;
    
    havaDurumu(lat, long);
}

koordinat();

// !function(d, s, id) {
//     var js, fjs = d.getElementsByTagName(s)[0];
//     if(!d.getElementById(id)) {
//         js = d.createElement(s);
//         js.id = id;
//         js.src = 'https://weatherwidget.io/js/widget.min.js';
//         fjs.parentNode.insertBefore(js, fjs);
//     }
// }(document, 'script', 'weatherwidget-io-js');


// hava.setAttribute('data-label_1', zaman.getDate() + ' ' + aylar[zaman.getMonth()]);
// hava.setAttribute('data-label_2', gunler[zaman.getDay()]);

// GUNLER

function gunuGoster() {

    let gunler = [];
    gunler[1] = 0;
    gunler[2] = 1;
    gunler[3] = 2;
    gunler[4] = 3;
    gunler[5] = 4;
    gunler[6] = 5;
    gunler[0] = 6;
    return gunler
}

// SAAT

// SAAT GÖLGESİ

function saatGolge() {
    let saat = document.getElementById('saat');
    let shadow = '';
    for(let i = 0; i < 500; i++) {
        shadow += (shadow ? ',' : '') + i * 1 + 'px ' + i * 1 + 'px 0 #9d2c00';        
    }
    saat.style.textShadow = shadow;
}
saatGolge();

// TİK TAK

function simdi() {
    let dt = new Date();
    let saat = dt.getHours();
    let dk = (dt.getMinutes() < 10 ? '0' : '') + dt.getMinutes();
    return saat + ':' + dk;
}

function saatGoster() {
    document.getElementById('saat').innerHTML = simdi();
    setTimeout('saatGoster()', 6000);
}   
saatGoster();

// ZAMAN FARKI

function zamanFarki(simdi, sonra) {
    let fark;                    
    let simdiArr = saatFormat(simdi).split(':');
    let sonraArr = saatFormat(sonra).split(':');

    let simdiDk = parseInt(simdiArr[1], 10) + parseInt(simdiArr[0], 10) * 60;
    let sonraDk = parseInt(sonraArr[1], 10) + parseInt(sonraArr[0], 10) * 60;

    fark = sonraDk - simdiDk;

    if(fark > 0) {
        if(fark >= 60) {
            let saat = Math.floor(fark / 60);
            let dk = fark % 60;
            fark = (dk > 0) ? (saat + ' SAAT ' + dk + ' DAKİKA SONRA') : (saat + ' SAAT SONRA');
        }
        else {
            fark = (sonraDk - simdiDk) + ' DAKİKA SONRA';
        }
        return fark;
    }
    return '';
}

// SAAT FORMAT

function saatFormat(saat) {
    return saat.substr(0, 5);
}

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

// GOSTER - AJAX

function progGoster() {

    let gunler = gunuGoster();

    if((typeof prog !== 'undefined') && (typeof prog[gunler[zaman.getDay()]] !== 'undefined')) {      
        
        for (let i = 0; i < prog[gunler[zaman.getDay()]].length; i++) {
            if(prog[gunler[zaman.getDay()]][i]['saat'] <= simdi()) {
                var simdiki = prog[gunler[zaman.getDay()]][i];
                var sonraki = prog[gunler[zaman.getDay()]][i + 1];   
                var fark = ((typeof sonraki !== 'undefined') && (typeof simdiki !== 'undefined')) ? zamanFarki(simdi(), sonraki['saat']) : '';                                  
            }
        }
    }
    
    if(typeof simdiki === 'undefined') {
        $('.simdi').hide();
    } else {                
        $('.simdi').show();
        $('#simdi-saat').text(saatFormat(simdiki['saat']));                  
        $('#simdi').text(simdiki['etkinlik']);  
    }

    if(typeof sonraki === 'undefined') {
        $('.sonra').hide();
        $('#zaman-fark').hide();
    } else {
        $('.sonra').show();
        $('#sonra-saat').text(saatFormat(sonraki['saat'])); 
        $('#sonra').text(sonraki['etkinlik']);
    }

    if(typeof fark !== 'undefined') {
        $('#zaman-fark').text(fark);
        $('#zaman-fark').show();
    }   

    setTimeout(progGoster, 60000);
}

function goster() {
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

            // DUYURU GOSTER  

            $('#duyuru').empty();

            for (let i in data.duyurular) {
                var item = data.duyurular[i]['metin'];
                $('#duyuru').append($('<p>', {
                    text: item
                }));                    
            }
            marquee();

            // PROGRAM GOSTER

            prog = data.programlar;            
            progGoster();      
            
            // BAŞLIK GOSTER

            $('.header-baslik').text(data.sube['isim']);
            $('title').text(data.sube['isim']);
            
        },
        error: function() {
            //$('#header').html('hata');
        }
    });
}

$(function() {
    $('#subeSec').change(function(){ 
        goster();
    });
    goster();
});

