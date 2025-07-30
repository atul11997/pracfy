<?php
namespace App\Helpers;
use Illuminate\Support\Facades\Http;

class URLToLatLong {
public static function extractLatLngFromShortUrl($shortUrl)
{
    // Step 1: Expand Short URL (follow redirects manually)
    $response = Http::withoutRedirecting()->get($shortUrl);

    // Step 2: Get Redirect URL
    $location = $response->header('Location');

    if (!$location) {
        return ['error' => 'Unable to resolve short URL.'];
    }

    // Step 3: Extract Latitude & Longitude from expanded URL
    preg_match('/@([-0-9.]+),([-0-9.]+)/', $location, $matches);

    // Step 4: Try to extract place name (if available)
    // Google Maps URL often looks like this: https://www.google.com/maps/place/Place+Name/@lat,lng,...
    $placeName = null;
    preg_match('/\/maps\/place\/([^\/@]+)/', $location, $placeMatches);
    if (isset($placeMatches[1])) {
        $placeName = urldecode(str_replace('+', ' ', $placeMatches[1]));
    }

    if (count($matches) >= 3) {
        return [
            'place' => $placeName,
            'lat' => $matches[1],
            'lng' => $matches[2],
        ];
    } else {
        return ['error' => 'Latitude and Longitude not found in URL.'];
    }
}

}

