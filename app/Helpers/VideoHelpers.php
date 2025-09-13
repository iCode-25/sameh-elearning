<?php

namespace App\Helpers;

class VideoHelpers
{
    public static function toEmbedUrl($url)
    {
        // لو اللينك قصير youtu.be
        if (preg_match('/youtu\.be\/([^\?]+)/', $url, $matches)) {
            return "https://www.youtube.com/embed/" . $matches[1];
        }

        // لو اللينك watch?v=
        if (preg_match('/youtube\.com\/watch\?v=([^\&]+)/', $url, $matches)) {
            return "https://www.youtube.com/embed/" . $matches[1];
        }

        // لو هو اصلاً embed
        if (preg_match('/youtube\.com\/embed\/([^\?]+)/', $url, $matches)) {
            return $url;
        }

        // لو مش يوتيوب نرجعه زي ما هو (mp4 أو أي حاجة تانية)
        return $url;
    }
}
