
// escapeHtml

function escapeHtml(text) {
    var map = {
      '&': '&amp;',
      '<': '&lt;',
      '>': '&gt;',
      '"': '&quot;',
      "'": '&#039;'
    };
    
    return text.replace(/[&<>"']/g, function(m) { return map[m]; });
}

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

    // göstermelik
    // var divGun = document.getElementsByClassName('gun');    
    // for(let i = 1; i < divGun.length; i++) {
    //     divGun[i].innerHTML = gunler[date.getDay() + i];
    //     if(date.getDay() + i == 7)  divGun[i].innerHTML = gunler[0];
    // }
}

// HAVA
havaDurumu();
function havaDurumu() {
    // $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=" + lat + "&lon=" + long + "&units=metric&lang=tr&exclude=minutely,hourly,alerts&appid=<ID>", function(data){
        $.getJSON("https://api.openweathermap.org/data/2.5/onecall?lat=40.976&lon=27.503&units=metric&lang=tr&exclude=minutely,hourly,alerts&appid=<ID>", function(data){    
        
        var gun = document.getElementsByClassName('gun');
        var havaIcon = document.getElementsByClassName('hava-icon');
        var havaDerece = document.getElementsByClassName('hava-derece');

        var unix_timestamp, date, icon, temp;

            // unix_timestamp = data.current.dt;
            // date = new Date(unix_timestamp * 1000);            

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
             
                // havaDerece[i].innerHTML +=  date.getDate();
        }
    });
    setTimeout('havaDurumu()', 14400000);
}

function koordinat() {
    navigator.geolocation.getCurrentPosition(getPosition);     
}

function getPosition(position) {
    lat = position.coords.latitude;
    long = position.coords.longitude;
    
    havaDurumu();
}

// koordinat();

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

    if(saat)
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
    if (simdiArr[0] == '00') simdiArr[0] = '24';
    if (sonraArr[0] == '00') sonraArr[0] = '24';

    let simdiDk = parseInt(simdiArr[1], 10) + parseInt(simdiArr[0], 10) * 60;
    let sonraDk = parseInt(sonraArr[1], 10) + parseInt(sonraArr[0], 10) * 60;

    fark = sonraDk - simdiDk;
    
    if(fark < 0) fark += 24*60;
    

    if(fark > 60) {
        let saat = Math.floor(fark / 60);
        let dk = fark % 60;
        fark = (dk > 0) ? (saat + ' saat ' + dk + ' dakika sonra') : (saat + ' saat sonra');
    }
    else {
        if(fark == 0) fark = 'Şimdi';
        else fark = (sonraDk - simdiDk) + ' dakika sonra';            
    }

    return fark;
}


function unixTimestampFarki(simdi, sonra) {

    let fark = Date.parse(sonra) - simdi;

    var gunFarki = Math.floor(fark/1000/60/60/24);
    fark -= gunFarki*1000*60*60*24

    var saatFarki = Math.floor(fark/1000/60/60);
    fark -= saatFarki*1000*60*60

    var dkFarki = Math.floor(fark/1000/60);
    fark -= dkFarki*1000*60

    // var snFarki = Math.floor(fark/1000);

    if(gunFarki >= 0) {
        
        // console.log((gunFarki > 0 ? (gunFarki + ' gün ') : '') + 
        // (saatFarki > 0 ? (saatFarki + ' saat ') : '') + 
        // (dkFarki > 0 ? (dkFarki + ' dakika ') : ''));
        
        return (gunFarki > 0 ? (gunFarki + ' gün ') : '') + 
            (saatFarki > 0 ? (saatFarki + ' saat ') : '') + 
            (dkFarki > 0 ? (dkFarki + ' dakika ') : '');
    }
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

/*
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
*/


// LOGIN
/*
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
*/

// PROGRAM GOSTER 

var progTimeout;
/*
function progGoster() {
    console.log('progGoster');
    console.log(prog);
    let gunler = gunuGoster();

    if((typeof prog !== 'undefined') && (typeof prog[gunler[zaman.getDay()]] !== 'undefined')) {      
        // var progSira = 0;
        for (let i = 0; i < prog[gunler[zaman.getDay()]].length; i++) {
            if(prog[gunler[zaman.getDay()]][i]['saat'] <= simdi()) {
                // progSira = i;
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
        $('#simdi').text(simdiki['etkinlik']);  
    }

    if(typeof sonraki === 'undefined') {
        $('.sonra').hide();
        $('#zaman-fark').hide();
        $('.dikey-cizgi').hide();
    } else {
        $('.sonra').show();
        $('#sonra').text(sonraki['etkinlik']);
    }

    if(typeof fark !== 'undefined') {
        $('#zaman-fark').text(fark);
        $('#zaman-fark').show();
    } else {
        $('#zaman-fark').hide();
        $('.dikey-cizgi').hide();
    }

    if(fark == '') {
        $('#zaman-fark').hide();
        $('.dikey-cizgi').hide();
    } else {
        $('#zaman-fark').text(fark);
        $('#zaman-fark').show();
        $('.dikey-cizgi').show();
    }

    // progTimeout = setTimeout(progGoster, 60000);
}
*/
// yeni prog

function progGoster() {

    console.log('progGoster ' + simdi());
    console.log(prog);

    let gunler = gunuGoster();
    let progBugun;
    let simdiki;
    let sonraki;
    let zamanFark;

    if(prog.length > 0 && typeof prog[gunler[zaman.getDay()]] !== 'undefined') {
        progBugun = prog[gunler[zaman.getDay()]];
        console.log(progBugun);
        for(let i = 0; i < progBugun.length; i++) {
            if(simdi() >= progBugun[i].saat/* && simdi() <= progBugun[i].bitis_saat*/) {
                simdiki = progBugun[i];
                sonraki =  (i < progBugun.length - 1) ? progBugun[i + 1] : progBugun[0];
                zamanFark = zamanFarki(simdi(), sonraki.saat);                
            }
        }

        $('.simdi').show();                 
        $('.sonra').show();
        $('#zaman-fark').show();
        $('.dikey-cizgi').show();
        $('#simdi').text(simdiki.etkinlik);  
        $('#sonra').text(sonraki.etkinlik);
        $('#zaman-fark').text(zamanFark);  

        progTimeout = setTimeout(progGoster, 60000);

    } else {
        console.log('else');

        $('.simdi').hide();                 
        $('.sonra').hide();
        $('#zaman-fark').hide();
        $('.dikey-cizgi').hide();
        clearTimeout(progTimeout);
    }
}

// GERİ SAYIM GOSTER 

var sayacTimeout;
var sayacIndis = 0;

function sayacGoster() {
    
    if(unixTimestampFarki(Date.now(), sayac[sayacIndis].tarih + ' ' + sayac[sayacIndis].saat)) {
        $('.geri-sayim-wrapper').show();
        $('.geri-sayim-etkinlik').text(sayac[sayacIndis].etkinlik + ' İçin Kalan Süre: ');
        $('.geri-sayim-sayac').text(unixTimestampFarki(Date.now(), sayac[sayacIndis].tarih + ' ' + sayac[sayacIndis].saat));
        
    } else {
        $('.geri-sayim-wrapper').hide();
        sayacIndis++;
        if(sayacIndis >= sayac.length) sayacIndis = 0;
    }
    
    sayacTimeout = setTimeout(sayacGoster, 60000);
}

// GOSTER

// ŞUBEYE GÖRE GÖSTER

const cssVarName = ['--renk-1', '--renk-2', '--renk-3', '--renk-4', '--renk-5', '--renk-6'];
const cssVarVal = ['#ff5f01', '#feac00', '#ffb933', '#800000', '#ffc933', '#ff9100'];

function gosterSubeyeGore() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'home', 
            action: 'showBySube',
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
                clearTimeout(progTimeout);
            }

            // GERİ SAYIM
            
            if(data.sayaclar.length > 0) {
                $('.geri-sayim-wrapper').show();
                sayac = data.sayaclar;
                console.log(sayac);
                sayacGoster();              
            } else {
                $('.geri-sayim-wrapper').hide();                
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

// SABİT VERİLERİ GÖSTER

var yenile_hiz;
var slide_hiz;

function gosterSabit() {
    $.ajax({
        type: 'POST',
        url: 'index.php',
        data: {
            section: 'home', 
            action: 'showStatic'
        },
        dataType: 'json',
        success: function(data) { 

            // TERCİHLER

            if(data.tercihler) {
                const marquee_hiz = data.tercihler.marquee_hiz.deger;
                slide_hiz = data.tercihler.slide_hiz.deger; 
                yenile_hiz = data.tercihler.yenile_hiz.deger;

                document.documentElement.style.setProperty('--marquee-hiz', marquee_hiz + 's');
            }            

            // SLIDE GOSTER

            $('.slideshow-container').empty();

            if(data.slidelar.length > 0) {

                var slideDot = $('<div/>').addClass('.dot-container');

                for (let i in data.slidelar) {

                    var slideDiv = $('<div/>').addClass('alan3-sag overflow slide rotate');                        

                    if(data.slidelar[i].resim_id) {
                        var resimId = data.slidelar[i].resim_id;
                        var slideImg = $('<img/>')
                            .attr('src', data.resimler[resimId].yol)
                            .addClass('alan3-sag-resim');

                        slideDiv.append(slideImg);
                    }

                    var slideMarquee = $('<div/>')
                        .attr('name', 'marquee');

                    slideMarquee.append(
                        $('<h2/>').text(data.slidelar[i].baslik)                            
                    );
                    slideMarquee.append(
                        $('<p/>').text(data.slidelar[i].metin)                            
                    );

                    slideDiv.append(slideMarquee);
                    $('.slideshow-container').append(slideDiv);   
                    
                    $(slideDot).append(
                        $('<span>').addClass('dot')                            
                    );
                }

                $('.slideshow-container').append(slideDot); 
                slideDot.css('text-align', 'right');

                showSlides();
            }

            /*
            // VIDEO GOSTER

            if(data.video) {
                $('#player').attr('src', data.video.yol);
            }
            */
        }
    });
}

function gosterZamanlayici() {
    clearTimeout(slideTimeout);
    clearTimeout(progTimeout);
    clearTimeout(sayacTimeout);
    // clearInterval(sayacTimeout);

    gosterSubeyeGore();
    gosterSabit();
    
    // setTimeout('gosterZamanlayici()', yenile_hiz);
}

$(function() {
    gosterZamanlayici();

    $('#subeSec').change(function(){ 
        gosterSubeyeGore();
    });    
});


// SLIDE

var slideIndex = 0;
var slideTimeout;
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
    slideTimeout = setTimeout(showSlides, slide_hiz); 
}

// VIDEO PLAYLIST

// var playlist = [
//     "https://r3---sn-nv47lnl7.c.drive.google.com/videoplayback?expire=1605532400&ei=sEKyX5XeAouThgaqr5SwBw&ip=31.145.58.186&cp=QVRFV0ZfUVROQVhPOmt3Uk44bW9MNnZNTzltd2o1RU5rUEFKbXlNeGFxS1pzTTZta29vbUVZSFA&id=a7866fb04127a7bb&itag=18&source=webdrive&requiressl=yes&mh=eY&mm=32&mn=sn-nv47lnl7&ms=su&mv=m&mvi=3&pl=21&sc=yes&ttl=transient&susc=dr&driveid=1LnhBRcrC7nsw5hb8FSxm7SxuwshcB4Ow&app=explorer&mime=video/mp4&vprv=1&prv=1&dur=179.838&lmt=1605275599326930&mt=1605517876&sparams=expire,ei,ip,cp,id,itag,source,requiressl,ttl,susc,driveid,app,mime,vprv,prv,dur,lmt&sig=AOq0QJ8wRgIhAKFnVRv60zQJrnkB_WfP4qB9Jtil7RCGkzXVZVjMEDcvAiEA5XbxpgKybMTOMsyJnzTff7gJqvI41OjbJhtrjUIi9Ac=&lsparams=mh,mm,mn,ms,mv,mvi,pl,sc&lsig=AG3C_xAwRQIhALBH_Dh7pp1kjzq7p6JGs0kDTbymK0BRI49CfURGw8rOAiAV07AuRKFCmEXf8xh9WDwt-WL8Opl5oJfqk7JHlS_3tg==&cpn=J0NXsPi6UX58hux0&c=WEB_EMBEDDED_PLAYER&cver=20201112",
//     "https://r5---sn-nv47lns7.c.drive.google.com/videoplayback?expire=1605532148&ei=tEGyX9L6K5jLhgbF-LvgDw&ip=31.145.58.186&cp=QVRFV0ZfUVFSSVhPOmt3Uk41cXdMNnZNTzltdG4zRU5rUEFKbXZRZmFxS1pzTTZqb3dvbUVZSFA&id=60283c05c7823af1&itag=22&source=webdrive&requiressl=yes&mh=OC&mm=32&mn=sn-nv47lns7&ms=su&mv=m&mvi=5&pl=21&ttl=transient&susc=dr&driveid=1y5efhVA_2NgOtXZ6gNGl7l8nQ3B1HkYf&app=explorer&mime=video/mp4&vprv=1&prv=1&dur=2966.325&lmt=1604876636715524&mt=1605517635&sparams=expire,ei,ip,cp,id,itag,source,requiressl,ttl,susc,driveid,app,mime,vprv,prv,dur,lmt&sig=AOq0QJ8wRAIgQwAWBI66317orkQh-7dDKDQG6Gmiq3kO5sXfdRPg0CUCICQHzN1s9uklspfPjSf030w7I53Vhjtk2PM0ap_Rq-Px&lsparams=mh,mm,mn,ms,mv,mvi,pl&lsig=AG3C_xAwRAIgQNIo4ZNQq13oTCjJe5kTTX-sP8rehDBSBrZ2F95ZSgsCIBLPDC1WkRRuSckiRM4qzJWJRn3yR8KCIR12a3IIculG&cpn=oGdDoHdR4GxyZ2j4&c=WEB_EMBEDDED_PLAYER&cver=20201112"
// ];
// var i = 0;
// var video = document.getElementById('video');
// video.addEventListener('ended',myHandler,false);

// function myHandler(e) {
//     video.src = playlist[i];
//     i++;
//     if(i >= playlist.length) i = 0;
// }

