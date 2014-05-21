<?php

	Class Converter {

		public static function singleToDouble($value) {
			if (strlen($value) == 1) {
				return "0" . $value;
			}

			return $value;
		}

		public static function eventUriToDb($event) {
			return strtolower(str_replace('-',' ',$event));
		}

		public static function eventDbToUri($event) {
			return strtolower(str_replace(' ','-',$event));
		}

		public static function getMonthDays($month, $year) {

		}

		public static function month($month) {


		}

	}

?>