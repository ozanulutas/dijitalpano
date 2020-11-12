
// TARİH

var zaman = new Date();
const aylar = ["OCAK", "ŞUBAT", "MART", "NİSAN", "MAYIS", "HAZİRAN", "TEMMUZ", "AĞUSTOS", "EYLÜL", "EKİM", "KASIM", "ARALIK"];
const gunler = ["PAZAR", "PAZARTESİ", "SALI", "ÇARŞAMBA", "PERŞEMBE", "CUMA", "CUMARTESİ"];

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

function havaDurumu() {

    $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + long + "&units=metric&lang=tr&exclude=minutely,hourly,alerts&appid=fa13191aaafdf33d06c157515cbd09f8", function(data){
        
        
        var gun = document.getElementsByClassName('gun');
        var havaIcon = document.getElementsByClassName('hava-icon');
        var havaDerece = document.getElementsByClassName('hava-derece');

        var unix_timestamp, date, icon, temp;

            unix_timestamp = data.current.dt;
            date = new Date(unix_timestamp * 1000);            

        temp = data.current.temp;
        icon = data.current.weather[0].icon;

        havaIcon[0].src = "http://openweathermap.org/img/wn/" + icon + "@2x.png";  
        havaDerece[0].innerHTML = Math.round(temp) + '&deg;'; 
            // havaDerece[0].innerHTML +=  date.getDate(); 
        
        for(let i = 1; i < data.daily.length - 1 ; i++) {
            
            unix_timestamp = data.daily[i].dt;
            date = new Date(unix_timestamp * 1000);
            icon = data.daily[i].weather[0].icon;
            temp = data.daily[i].temp.day;         

            if(gun[i]) gun[i].innerHTML = gunler[date.getDay()];    
            havaIcon[i].src = "http://openweathermap.org/img/wn/" + icon + "@2x.png";  
            havaDerece[i].innerHTML = Math.round(temp) + '&deg;'; 
             
                havaDerece[i].innerHTML +=  date.getDate();
        }
    });
    // setTimeout('havaDurumu()', 14400000);
}

function koordinat() {
    navigator.geolocation.getCurrentPosition(getPosition);     
}

function getPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    
    havaDurumu();
}

//koordinat();

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
    var style = getComputedStyle(document.body);
    golgeRenk = style.getPropertyValue('--renk-4');

    let saat = document.getElementById('saat');
    let shadow = '';
    for(let i = 0; i < 500; i++) {
        shadow += (shadow ? ',' : '') + i * 1 + 'px ' + i * 1 + 'px 0 ' + golgeRenk;        
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
    
    // setTimeout(showSlides, 4000);     
}

// LOGIN

$(function() {
    $('#loginForm').submit(function(e){ 
        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {
                section: 'home', 
                action: 'login',
                k_adi: $('#k_adi').val(),
                sifre: $('#sifre').val(),
            },
            dataType: 'json',
            success: function(data) {

                if(data.k_id) {
                    $('#k_adi').val('');
                    $('#sifre').val('');
                    location = "index.php?section=sube";
                }
                else {
                    $("#error").html(data);
                    $("#error").show();
                    $('#error').delay(5000).fadeOut('slow');
                }
            },
        });
    });
});

// PROGRAM GOSTER 

function progGoster() {

    let gunler = gunuGoster();

    if((typeof prog !== 'undefined') && (typeof prog[gunler[zaman.getDay()]] !== 'undefined')) {      
        var progSira = 0;
        for (let i = 0; i < prog[gunler[zaman.getDay()]].length; i++) {
            if(prog[gunler[zaman.getDay()]][i]['saat'] <= simdi()) {
                progSira = i;
                var simdiki = prog[gunler[zaman.getDay()]][i];
                var sonraki = prog[gunler[zaman.getDay()]][i + 1];  
                if(i == prog[gunler[zaman.getDay()]].length - 1) sonraki = prog[gunler[zaman.getDay()]][0];
                var fark = ((typeof sonraki !== 'undefined') && (typeof simdiki !== 'undefined')) ? zamanFarki(simdi(), sonraki['saat']) : '';                                  
            }
        }
        // if(progSira == prog[gunler[zaman.getDay()]].length - 1) sonraki = prog[gunler[zaman.getDay()]][0];
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

// GOSTER

const cssVarName = ['--renk-1', '--renk-2', '--renk-3', '--renk-4', '--renk-5', '--renk-6'];
const cssVarVal = ['#ff5f01', '#feac00', '#ffb933', '#800000', '#ffc933', '#ff9100'];

function goster() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'home', 
            action: 'show',
            sube_id: $('#subeSec').val()
        },
        dataType: 'json',
        success: function(data) {  

            // DUYURU GOSTER  

            $('#duyuru').empty();
            if(data.duyurular.length > 0) {

                for (let i in data.duyurular) {
                    var item = data.duyurular[i]['metin'];
                    $('#duyuru').append($('<p>', {
                        text: item
                    }));                    
                }
                marquee();
            }

            // PROGRAM GOSTER

            if(data.programlar) {
                $('#progIcerik').show();
                prog = data.programlar;            
                progGoster();      
            } else {
                $('#progIcerik').hide();
            }
            
            // BAŞLIK GOSTER

            $('.header-baslik').text(data.sube['isim']);
            $('title').text(data.sube['isim']);

            // CSS GOSTER

            if(data.css.length > 0) {
                for (let i in data.css) {
                    document.documentElement.style.setProperty(data.css[i].name, data.css[i].value);                    
                }
            } 
            else {
                for (let i = 0; i < cssVarName.length; i++) {
                    document.documentElement.style.setProperty(cssVarName[i], cssVarVal[i]);
                }
            }
            
        },
        error: function() {
            $('#duyuru').empty();
            $('#progIcerik').hide();

            for (let i = 0; i < cssVarName.length; i++) {
                document.documentElement.style.setProperty(cssVarName[i], cssVarVal[i]);
            }
        }
    });
}

$(function() {
    $('#subeSec').change(function(){ 
        goster();
    });
    goster();
});

