<?php
/**
* @paket Hasan_Atilan
* @version 1.0
*/
/*
Plugin Adı: HasanAtilan Wordpress DDoS Modülü
Plugin Linki: http://hasanatilan.com/
Aciklama: Bu eklenti taşşaklığına yapılmıştır.
Geliştirici: Hasan ATILAN
Version: 1.0
Geliştirici: http://hasanatilan.com/
We Are: https://stresser.me
*/

function ddos_yonetimi() {

echo '<div class="wrap">';
echo '<p>DDoS yönetim sayfası</p>';
echo '</div>';
}

function ddos_ayarlari() {
add_options_page( 'DDoS Yonetimi', 'Stresser.me', 'manage_options', 'ipport', 'ddos_yonetimi' );
}

add_action( 'admin_menu', 'ddos_ayarlari' );


function ddos_fonksiyonu()
{
global $yolla;
$veri = esc_attr( get_post_meta( $yolla->ID, 'ipport', true ) );
echo '<input type="text" name="ipport" value="'.$veri.'">';
}

function stresser_v1( $yolla ) {
add_meta_box( 
'meta_box_namesi',
__( 'Ornek Meta Box' ),
'ddos_fonksiyonu',
'post',
'normal',
'default'
);
}

add_action( 'meta_ekle', 'stresser_v1' );

function stresser_kaydet()
{
global $numara;
$anahtar = 'Stresser_me';
$veri = $_POST["Stresser_me"];


$verigirdisi = get_post_meta( $numara, 'Stresser_me', true );

if ( $veri && '' == $verigirdisi )
add_post_meta( $numara, $anahtar, $veri, true );

elseif ( $veri && $veri != $verigirdisi )
update_post_meta( $numara, $anahtar, $veri );

elseif ( '' == $veri && $verigirdisi )
delete_post_meta( $numara, $anahtar, $verigirdisi );

}

add_action( 'kaydet', 'stresser_kaydet', 10, 2 );

?>
