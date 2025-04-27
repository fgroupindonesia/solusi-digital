<?php

namespace App\Libraries;


class URLShortenerHelper {

	
	public function makeShort($url_link) {

			$api_url = 'https://tinyurl.com/api-create.php?url=' . $url_link;

    $curl = curl_init();
    $timeout = 15;

    curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, $timeout);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_URL, $api_url);

    $new_url = curl_exec($curl);
    curl_close($curl);

    return $new_url;
		

	}


private function getRandomText($length = 7) {
    // Generates a random number between 1000000 and 9999999
    return substr(str_shuffle('0123456789'), 0, $length);
}


	private function getRandomUserAgent(){


// Array of 7 different fake user agents
$user_agents = [
    "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36",
    "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36",
    "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:60.0) Gecko/20100101 Firefox/60.0",
    "Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:89.0) Gecko/20100101 Firefox/89.0",
    "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Edge/91.0.864.59 Safari/537.36",
    "Mozilla/5.0 (iPhone; CPU iPhone OS 14_4_2 like Mac OS X) AppleWebKit/537.36 (KHTML, like Gecko) Mobile/15E148 Safari/537.36",
    "Mozilla/5.0 (Linux; Android 10; SM-G973F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Mobile Safari/537.36"
];

// Pick a random user agent from the array
$random_user_agent = $user_agents[array_rand($user_agents)];

// Output the randomly selected user agent
//echo "Randomly selected user agent: " . $random_user_agent;

	return $random_user_agent;

	}

}

?>