<?php

require_once('db.php');

header('Content-Type: text/html; charset=UTF-8');

$memoria_inicio = memory_get_usage();

class imagediff{

    private $image;
    private $diference = array();
    private $different_pixels = array();
    private $debug;

    function __construct($url, $bit = 16, $debug = false){
        $this->image['path'] = realpath($url);
        $this->url = $url;
        $this->bit = $bit;
        $this->debug = $debug;


        if ($this->image['path'] === false) {
            throw new Exception('Image "' . htmlspecialchars($url) . '" not found!<br />');
        } else {
            $this->image['type'] = $this->imagetyte($this->image['path']);
        }
    }

    private function imagetyte($imgname)
    {
        $file_info = pathinfo($imgname);
        if (!empty($file_info['extension'])) {
            $filetype = strtolower($file_info['extension']);
            $filetype = $filetype == 'jpg' ? 'jpeg' : $filetype;
            $func = 'imagecreatefrom' . $filetype;
            if (function_exists($func)) {
                return $filetype;
            } else {
                throw new Exception('File type "' . htmlspecialchars($filetype) . '" not supported!<br />');
            }
        } else {
            throw new Exception('File type not supported! <br />');
        }
    }
    public function createDiffImage($i1, $i2){


        list($src_W, $src_H) = getimagesize($i1);
        $ratio_src = $src_W/$src_H;

        ($this->bit/$this->bit > $ratio_src) ? $this->bit = $this->bit*$ratio_src : $this->bit = $this->bit/$ratio_src;

        $i1 = @imagecreatefromjpeg($i1);
        $i2 = @imagecreatefromjpeg($i2);

        $zone1 = imagecreate($this->bit, $this->bit);
        imagecopyresampled($zone1, $i1, 0, 0, 0, 0, $this->bit, $this->bit, $src_W, $src_H);
        $zone2 = imagecreate($this->bit, $this->bit);
        imagecopyresampled($zone2, $i2, 0, 0, 0, 0, $this->bit, $this->bit, $src_W, $src_H);

        imagefilter($zone1,IMG_FILTER_GRAYSCALE);
        imagefilter($zone2,IMG_FILTER_GRAYSCALE);
        $sx1 = imagesx($zone1);
        $sy1 = imagesy($zone1);
        $diffi = imagecreatetruecolor($sx1, $sy1);
        $red = imagecolorallocate($diffi, 255, 0, 0);
        imagefill($diffi, 0, 0, imagecolorallocate($diffi, 0, 0, 0));
        $different_pixels = 0;

        $sumtotal = 0;

        for ($x = 0; $x < $sx1; $x++) {
            for ($y = 0; $y < $sy1; $y++) {

                $rgb1 = imagecolorat($zone1, $x, $y);
                $pix1 = imagecolorsforindex($zone1, $rgb1);

                $rgb2 = imagecolorat($zone2, $x, $y);
                $pix2 = imagecolorsforindex($zone2, $rgb2);

                $mediapixels = pow($pix1['red']-$pix2['red'],2) + pow($pix1['green']-$pix2['green'],2) + pow($pix1['blue']-$pix2['blue'],2);
                $sumtotal = $sumtotal + $mediapixels;
                if($mediapixels>1500){
                    $different_pixels++;
                    imagesetpixel($diffi, $x, $y, $red);
                }
            }
        }

        if($this->debug==true){
            ob_start();
            imagejpeg($diffi);
            $outputBuffer = ob_get_clean();
            $base64 = base64_encode($outputBuffer);
            $this->diferencePNG = $base64;  
            imagedestroy($diffi);
        }


        $total = $sx1 * $sy1;
        $percent = number_format(100 * $different_pixels / $total, 2);

        array_push($this->different_pixels, $different_pixels, $percent, ($this->bit*$this->bit));
        return $this->different_pixels;
    }

    private function imagehex($image)
    {
        error_reporting(0);
        ini_set("gd.jpeg_ignore_warning", true);
        $size = getimagesize($image['path']);
        $func = 'imagecreatefrom' . $image['type'];
        $imageres = $func($image['path']);
        $zone = imagecreate($this->bit, $this->bit);
        imagecopyresized($zone, $imageres, 0, 0, 0, 0, $this->bit, $this->bit, $size[0], $size[1]);
        $colormap = array();
        $average = 0;
        $result = array();

        for ($x = 0; $x < $this->bit; $x++) {
            for ($y = 0; $y < $this->bit; $y++) {
                $color = imagecolorat($zone, $x, $y);
                $color = imagecolorsforindex($zone, $color);
                $colormap[$x][$y] = 0.212671 * $color['red'] + 0.715160 * $color['green'] + 0.072169 * $color['blue'];
                $average += $colormap[$x][$y];
            }
        }

        $average /= ($this->bit * $this->bit);
        for ($x = 0; $x < $this->bit; $x++) {
            for ($y = 0; $y < $this->bit; $y++) {
                $result[] = ($x < 10 ? $x : chr($x + 97)) . ($y < 10 ? $y : chr($y + 97)) . round(2 * $colormap[$x][$y] / $average);
            }
        }

        if($this->debug==true){
            ob_start();
            imagejpeg($zone);
            $outputBuffer = ob_get_clean();
            $base64 = base64_encode($outputBuffer);
            array_push($this->diference, $base64);
            imagedestroy($zone);    
        }
        return $result;
    }


    private function getHex($image,$bit)
    {
        error_reporting(0);
        ini_set("gd.jpeg_ignore_warning", true);
        $size = getimagesize($image['path']);
        $func = 'imagecreatefrom' . $image['type'];
        $imageres = $func($image['path']);
        $zone = imagecreate($bit, $bit);
        imagecopyresized($zone, $imageres, 0, 0, 0, 0, $bit, $bit, $size[0], $size[1]);
        $colormap = array();
        $average = 0;
        $result = array();

        for ($x = 0; $x < $bit; $x++) {
            for ($y = 0; $y < $bit; $y++) {
                $color = imagecolorat($zone, $x, $y);
                $color = imagecolorsforindex($zone, $color);
                $colormap[$x][$y] = 0.212671 * $color['red'] + 0.715160 * $color['green'] + 0.072169 * $color['blue'];
                $average += $colormap[$x][$y];
            }
        }

        $average /= ($bit * $bit);
        for ($x = 0; $x < $bit; $x++) {
            for ($y = 0; $y < $bit; $y++) {
                $result[] = ($x < 10 ? $x : chr($x + 97)) . ($y < 10 ? $y : chr($y + 97)) . round(2 * $colormap[$x][$y] / $average);
            }
        }

        if($this->debug==true){
            ob_start();
            imagejpeg($zone);
            $outputBuffer = ob_get_clean();
            $base64 = base64_encode($outputBuffer);
            array_push($this->diference, $base64);
            imagedestroy($zone);    
        }
        return $result;
    }

    public function getEncode($bit){
        $hex1 = $this->getHex($this->image,$bit);
        return json_encode($hex1); 
    }
    public function diffa()
    {
        $hex1 = $this->imagehex($this->image);
        $result = mysql_query("select* from jokes where id<19000");
        $i=0;
        $j=0;
        while ($row = mysql_fetch_array($result)) {
            $hex2 = unserialize($row[$this->bit."_bit"]);
            $result1[$i] = (count($hex1) + count($hex2)) - count(array_diff($hex2, $hex1)) - ($this->bit * $this->bit);
            $val = $result1[$i] / ((count($hex1) + count($hex2)) / 2)*100;
            if($val > $this->similar){
                if($j<20){
                    $response[$i]['percent'] = $val; 
                    $response[$i]['url'] = $row['url'];
                    $response[$i]['real_path'] = $this->url; 
                }
                $j++;

            }
            $i++;
        }


        if(count($response)>0){
            print_r(json_encode($response));

        }else{
            $response = array(is_similar=>'0',real_path=>$this->url);
            print_r(json_encode($response));

        }
        $rb0 = $this->bit."_bit";
        $sql = 'INSERT INTO jokes(url,'.$rb0.') VALUES("'.$this->url.'",'. "'".serialize($hex1)."')";
        $a = mysql_query($sql);
    }
    public function getDiff($attrs)
    {
        $hex = $attrs['hex'];
        $result = $this->getFiles($attrs);
        $i=0;
        $j=0;
            var_dump(mysql_fetch_array($result));
        while ($row = mysql_fetch_array($result)) {
            $hex2 = json_decode($row["encoded_".$attrs['bit']]);
            $result1[$i] = (count($hex) + count($hex2)) - count(array_diff($hex2, $hex)) - ($attrs['bit'] * $attrs['bit']);
                // var_dump(json_decode($row["encoded_".$attrs['bit']]));
            // var_dump($hex[0],$hex2[0],count(array_diff($hex2, $hex)), count($hex2),$result1[$i],"-----------");
            $val = $result1[$i] / ((count($hex) + count($hex2)) / 2)*100;
            // var_dump($val);
            if($val >= $attrs['similar']){
                if($j<20){
                    $response[$i]['percent'] = $val; 
                    $response[$i]['url'] = $row['url'];
                    $response[$i]['real_path'] = $this->url; 
                }
                $j++;
            }
            $i++;
        }

        if(count($response)>0){
            print_r(json_encode($response));
        }
        else{
            $response = array(is_similar=>'0',real_path=>$this->url);
            print_r(json_encode($response));
        }
    }

    public function getDebug(){
        return $this->debug;
    }
    public function getFiles($attrs){
        $sql = "select * from images".$attrs['sql'];
        var_dump($sql);
        $result = mysql_query($sql) or trigger_error(mysql_error()." in ".$sql);
        return $result;
    }
}


