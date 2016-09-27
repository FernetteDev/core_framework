<?php
	/**
	 * Created by PhpStorm.
	 * User: Fernette Developpeme
	 * Date: 05/07/2016
	 * Time: 18:41
	 */


class Text {

	public static function widthZero($chiffre){
		if($chiffre < 10){
			return '0' . $chiffre;
		}else{
			return $chiffre;
		}
	}
}