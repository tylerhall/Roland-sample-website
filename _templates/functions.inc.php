<?PHP
	date_default_timezone_set('UTC');

	function render($text)
	{
		$text = render_vars($text);
		$text = render_custom_tags($text);
		return $text;
	}
	
	function render_vars($text)
	{
		$text = str_replace('%7B%7B', '{{', $text);
		$text = str_replace('%7D%7D', '}}', $text);
		$out = preg_replace_callback("/{{([a-zA-Z0-9_-]+)}}/", function ($matches) {
			$varvar = $matches[1];
			if(isset($GLOBALS[$varvar])) {
				return $GLOBALS[$varvar];
			} else {
				return $varvar;
			}
		}, $text);

		return $out;
	}
	
	function render_custom_tags($text)
	{
		// <tylervideo  url="amazon-photos-upload.MP4" img="amazon-photos-upload.jpg">		
		$out = preg_replace_callback('/<tylervideo .*?url="(.*?)".*?img="(.*?)".*?>/', function ($matches) {
			if(strpos($matches[1], 'https://') === false) {
				$src = 'https://video.tyler.io/1080p/' . $matches[1];
			} else {
				$src = $matches[1];
			}

			if(strpos($matches[2], 'https://') === false) {
				$poster = 'https://video.tyler.io/jpg/' . $matches[2];
			} else {
				$poster = $matches[2];
			}

			$div = "<video class=\"video-js vjs-fluid vjs-default-skin\" controls preload=\"none\" poster=\"$poster\" data-setup=\"{}\">
			<source src=\"$src\" type=\"video/mp4\" />
			<p class=\"vjs-no-js\">If you don't have JavaScript enabled, you can <a href=\"$src\">view this video directly</a>.</p>
			</video>";

			return $div;
		}, $text);

		return $out;
	}

	function compute_pages($total, $current)
	{
		$numbers = range(max(1, $current - 2), min($total, $current + 2));

		if(count($numbers) > 0) {
			if($numbers[0] == 2) {
				array_unshift($numbers, 1);
			} elseif($numbers[0] > 2) {
				array_unshift($numbers, false);
				array_unshift($numbers, 1);
			}

			if($numbers[count($numbers) - 1] == ($total - 1)) {
				array_push($numbers, $total);
			} elseif($numbers[count($numbers) - 1] < ($total -1)) {
				array_push($numbers, false);
				array_push($numbers, $total);
			}
		}

		return $numbers;
	}

	// https://stackoverflow.com/questions/3126324/question-about-strpos-how-to-get-2nd-occurrence-of-a-string
	function strposx($haystack, $needle, $number)
	{
	    if($number === 1) {
	        return strpos($haystack, $needle);
	    } elseif($number > 1) {
	        return strpos($haystack, $needle, strposx($haystack, $needle, $number - 1) + strlen($needle));
	    } else {
	        return error_log('Error: Value for parameter $number is out of range');
	    }
	}
	
    // Converts a date/timestamp into the specified format
    function dater($date = null, $format = null)
    {
        if(is_null($format)) {
            $format = 'Y-m-d H:i:s';
		}

        if(is_null($date)) {
            $date = time();
		}

        // if $date contains only numbers, treat it as a timestamp
        if(ctype_digit($date) === true)
            return date($format, $date);
        else
            return date($format, strtotime($date));
    }
