<?php

namespace App\Helpers;

class SiteStripeHelper
{
    /**
     * Recebe um snippet HTML do SiteStripe e retorna:
     * [
     *   'url' => link afiliado,
     *   'image' => url da imagem,
     *   'title' => alt/title se existir
     * ]
     */
    public static function parseEmbed(string $html): array
    {
        $data = ['url' => null, 'image' => null, 'title' => null];

        // href do <a>
        if (preg_match('#<a[^>]+href=["\']([^"\']+)#i', $html, $m)) {
            $data['url'] = html_entity_decode($m[1]);
        }

        // src e alt do <img>
        if (preg_match('#<img[^>]+src=["\']([^"\']+)#i', $html, $m)) {
            $data['image'] = html_entity_decode($m[1]);
        }
        if (preg_match('#<img[^>]+alt=["\']([^"\']*)#i', $html, $m)) {
            $data['title'] = html_entity_decode($m[1]);
        } elseif (preg_match('#<a[^>]+title=["\']([^"\']*)#i', $html, $m)) {
            $data['title'] = html_entity_decode($m[1]);
        }

        return $data;
    }
}
