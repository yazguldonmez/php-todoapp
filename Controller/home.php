<?php 
if(route(0) == 'home'){
    view('home/home',[
        'isim' => 'Yazgül',
        'soyisim' => 'Dönmez'
    ]);
}
