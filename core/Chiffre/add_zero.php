<?php

	namespace Chiffre;

	class Text {

		public static function widthZero($chiffre){
			if($chiffre < 10){
				return '0' . $chiffre;
			}else{
				return $chiffre;
			}
		}
		
	}