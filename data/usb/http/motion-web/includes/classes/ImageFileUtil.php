<?php
	require_once(INCLUDE_PATH ."/classes/Sanitizer.php");

	
	class ImageFileUtil {
		const OVERVIEW_LIST_GROUP_TEMPLATE = 
			"<a href=\"?year=%%YEAR%%&month=%%MONTH%%&day=%%DAY%%\" class=\"list-group-item\">
				<span class=\"badge\">%%COUNT%%</span>
				<span class=\"glyphicon glyphicon-star\"></span>
				%%YEAR%% / %%MONTH%% / %%DAY%%
			</a>";
		const DAY_LIST_GROUP_TEMPLATE =
			"<a href=\"images.php?year=%%YEAR%%&month=%%MONTH%%&day=%%DAY%%&hour=%%HOUR%%\" class=\"list-group-item\">
				<span class=\"badge\">%%COUNT%%</span>
				<span class=\"glyphicon glyphicon-star\"></span>
				Hour: %%HOUR%%:00
			</a>";
		const EVENT_LIST_GROUP_TEMPLATE =
			"<a href=\"images.php?year=%%YEAR%%&month=%%MONTH%%&day=%%DAY%%&hour=%%HOUR%%&evt=%%EVENT%%\" class=\"list-group-item\">
					<span class=\"badge\">%%COUNT%%</span>
					<span class=\"glyphicon glyphicon-star\"></span>
					Event: %%EVENT%%
			</a>";
		const IMG_THUMBNAIL_TEMPLATE = 
			"<div class=\"col-xs-12 col-md-3\">
				<a href=\"view.php?year=%%YEAR%%&month=%%MONTH%%&day=%%DAY%%&hour=%%HOUR%%&evt=%%EVENT%%&img=%%IMG%%\" class=\"thumbnail\">
					<div class=\"thumbnail\">
						<img alt=\"%%PATH%%\" src=\"%%PATH%%\">
						<div class=\"caption\">
							<p>%%IMG%%</p>
						</div>
					</div>
				</a>
			</div>
			";
		
		private function endsWith($haystack, $needle) {
			return substr($haystack, -strlen($needle)) === $needle;
		}
		
		private function my_is_dir($base, $path) {
			if ($path === '.' or $path === '..') {
				return false;
			}
			return is_dir($base . DIRECTORY_SEPARATOR . $path);
		}
		
		private function get_image_count($path) {
			$count = 0;
			$results = scandir($path);
			foreach($results as $result) {
				if($result === "." or $result === "..") {
					continue;
				}
				if(is_dir($path .DIRECTORY_SEPARATOR .$result)) {
					$count += $this->get_image_count($path .DIRECTORY_SEPARATOR .$result);
					continue;
				}
				if($this->endsWith($result, "jpg")) {
					$count++;
				}
			}
			return $count;
		}
		
		public function get_days_list($base_path) {
			$items = array();
			$BASE = $base_path;
			
			// -------------- YEARS
			$paths_year = scandir($BASE, SCANDIR_SORT_DESCENDING);
			foreach ($paths_year as $path_year) {
				if($this->my_is_dir($BASE, $path_year)) {
					// -------------- MONTHS
					$paths_month = scandir($BASE .DIRECTORY_SEPARATOR .$path_year, SCANDIR_SORT_DESCENDING);
					foreach ($paths_month as $path_month) {
						if($this->my_is_dir($BASE .DIRECTORY_SEPARATOR .$path_year, $path_month)) {
							// -------------- DAYS
							$paths_day = scandir($BASE .DIRECTORY_SEPARATOR .$path_year .DIRECTORY_SEPARATOR .$path_month, SCANDIR_SORT_DESCENDING);
							foreach ($paths_day as $path_day) {
								if($this->my_is_dir($BASE .DIRECTORY_SEPARATOR .$path_year .DIRECTORY_SEPARATOR .$path_month, $path_day)) {
									// calculate the amount of images in this folder
									$count = $this->get_image_count($BASE .DIRECTORY_SEPARATOR .$path_year .DIRECTORY_SEPARATOR .$path_month .DIRECTORY_SEPARATOR .$path_day);
									
									// escape everything
									$path_year = Sanitizer::sanitize($path_year);
									$path_month = Sanitizer::sanitize($path_month);
									$path_day = Sanitizer::sanitize($path_day);
									$count = Sanitizer::sanitize($count);
									
									// create the row
									$cur_item = ImageFileUtil::OVERVIEW_LIST_GROUP_TEMPLATE;
									$cur_item = str_replace("%%YEAR%%", $path_year , $cur_item);
									$cur_item = str_replace("%%MONTH%%", $path_month , $cur_item);
									$cur_item = str_replace("%%DAY%%", $path_day , $cur_item);
									$cur_item = str_replace("%%COUNT%%", "$count Images" , $cur_item);
									array_push($items, $cur_item);
								}
							}
						}
					}
				}
			}
			return $items;
		}
	
		public function get_hours_list($base_path, $year, $month, $day) {
			$items = array();
			$path = $base_path .DIRECTORY_SEPARATOR .$year .DIRECTORY_SEPARATOR .$month .DIRECTORY_SEPARATOR .$day;
				
			$paths_hours = scandir($path);
			foreach ($paths_hours as $path_hour) {
				if($this->my_is_dir($path, $path_hour)) {
					// calculate the amount of images in this folder
					$count = $this->get_image_count($path .DIRECTORY_SEPARATOR .$path_hour);
					// escape everything
					$path_hour = Sanitizer::sanitize($path_hour);
					$year = Sanitizer::sanitize($year);
					$month = Sanitizer::sanitize($month);
					$day = Sanitizer::sanitize($day);
					$count = Sanitizer::sanitize($count);
						
					// create the row
					$cur_item = ImageFileUtil::DAY_LIST_GROUP_TEMPLATE;
					$cur_item = str_replace("%%HOUR%%", $path_hour , $cur_item);
					$cur_item = str_replace("%%YEAR%%", $year , $cur_item);
					$cur_item = str_replace("%%MONTH%%", $month , $cur_item);
					$cur_item = str_replace("%%DAY%%", $day , $cur_item);
					$cur_item = str_replace("%%COUNT%%", "$count Images" , $cur_item);
					array_push($items, $cur_item);
				}
			}
			return $items;
		}
		
		public function get_events_list($base_path, $year, $month, $day, $hour) {
			$items = array();
			$path = $base_path .DIRECTORY_SEPARATOR .$year .DIRECTORY_SEPARATOR .$month .DIRECTORY_SEPARATOR .$day .DIRECTORY_SEPARATOR .$hour;
				
			$paths_events = scandir($path);
			foreach ($paths_events as $path_event) {
				if($this->my_is_dir($path, $path_event)) {
					// calculate the amount of images in this folder
					$count = $this->get_image_count($path .DIRECTORY_SEPARATOR .$path_event);
					// escape everything
					$path_event = Sanitizer::sanitize($path_event);
					$year = Sanitizer::sanitize($year);
					$month = Sanitizer::sanitize($month);
					$day = Sanitizer::sanitize($day);
					$hour = Sanitizer::sanitize($hour);
					$count = Sanitizer::sanitize($count);
						
					// create the row
					$cur_item = ImageFileUtil::EVENT_LIST_GROUP_TEMPLATE;
					$cur_item = str_replace("%%YEAR%%", $year , $cur_item);
					$cur_item = str_replace("%%MONTH%%", $month , $cur_item);
					$cur_item = str_replace("%%DAY%%", $day , $cur_item);
					$cur_item = str_replace("%%HOUR%%", $hour , $cur_item);
					$cur_item = str_replace("%%EVENT%%", $path_event , $cur_item);
					$cur_item = str_replace("%%COUNT%%", "$count Images" , $cur_item);
					array_push($items, $cur_item);
				}
			}
			return $items;
		}
		
		public function get_thumbnails($base_path, $year, $month, $day, $hour, $event, $motion_base) {
			$items = array();
			$path = $base_path .DIRECTORY_SEPARATOR .$year .DIRECTORY_SEPARATOR .$month .DIRECTORY_SEPARATOR .$day .DIRECTORY_SEPARATOR .$hour .DIRECTORY_SEPARATOR .$event;
			$paths_files = scandir($path);
			foreach($paths_files as $file) {
				if(is_file($path .DIRECTORY_SEPARATOR .$file) && $this->endsWith($file, "jpg")) {
					$cur_item = ImageFileUtil::IMG_THUMBNAIL_TEMPLATE;
					$cur_item = str_replace("%%PATH%%", $motion_base .DIRECTORY_SEPARATOR .$year .DIRECTORY_SEPARATOR .$month .DIRECTORY_SEPARATOR .$day .DIRECTORY_SEPARATOR .$hour .DIRECTORY_SEPARATOR .$event .DIRECTORY_SEPARATOR .$file , $cur_item);
					$cur_item = str_replace("%%YEAR%%", Sanitizer::sanitize($year) , $cur_item);
					$cur_item = str_replace("%%MONTH%%", Sanitizer::sanitize($month) , $cur_item);
					$cur_item = str_replace("%%DAY%%", Sanitizer::sanitize($day) , $cur_item);
					$cur_item = str_replace("%%HOUR%%", Sanitizer::sanitize($hour) , $cur_item);
					$cur_item = str_replace("%%EVENT%%", Sanitizer::sanitize($event) , $cur_item);
					$cur_item = str_replace("%%IMG%%", Sanitizer::sanitize($file) , $cur_item);
					array_push($items, $cur_item);
				}
			}
			return $items;
		}
	}
	