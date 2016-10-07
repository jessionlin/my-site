<?php
class AddWaterPress{
    function  add($imageUrl,$watherImageUrl){
        $img = @$this->getImageRes($this->getExtendsName($imageUrl),$imageUrl);
        $color = imagecolorallocate($img, 190, 1, 23);
        $font ="SIMLI.TTF";
        imagettftext($img, 15, 56, 20, 13, $color, $font, $watherImageUrl);
        $this->outputImage($img,$this->getExtendsName($imageUrl),$imageUrl);
        imagedestroy($img);
    }
}
?>
