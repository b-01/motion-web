<?php
	class Sanitizer {
		
		public static function sanitize($data) {
			return htmlspecialchars($data, ENT_QUOTES | ENT_HTML5, "UTF-8");
		}
	}