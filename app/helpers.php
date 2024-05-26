
<?php

 /**
  * MAKE AVATAR FUNCTION
  */

use App\Models\posRegister;

  if(!function_exists('makeAvatar')){

       function makeAvatar($fontPath, $dest, $char){
           $path = $dest;
           $image = imagecreate(200,200);
           $red = rand(0,255);
           $green = rand(0,255);
           $blue = rand(0,255);
           imagecolorallocate($image,$red,$green,$blue);
           $textcolor = imagecolorallocate($image,255,255,255);
           imagettftext($image,100,0,50,150,$textcolor,$fontPath,$char);
           imagepng($image,$path);
           imagedestroy($image);
           return $path;
       }
  }


function get_pose_regester(){
    $user = auth()->id();
    $pos_register = posRegister::query()->where('user_id',$user)->where('statues',0)->get();
    $posId = 0;
    foreach ($pos_register as $value) {
        $posId = $value->id;
    }
    return $posId;
}



?>
