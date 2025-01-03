<?php

namespace emirustaoglu;

class filecache
{

    private $base64;
    private $cacheDir;
    private $cacheMinutes;

    /**
     * @string $cacheDir Cache dizinini belirtiniz.
     * @int $cacheMinutes Cache dosyalarınız için dakika bazında süre belirtiniz. Bu süre default olarak 1 gündür
     * @bool $base64 Cache yapısında dosya isminin base64 olarak şifrelenip şifrelenmeyeceğini belirtiniz.
     */
    public function __construct($cacheDir, $cacheMinutes = 1440, $base64 = false)
    {
        $this->cacheDir = $cacheDir;
        $this->base64 = $base64;
        $this->cacheMinutes = $cacheMinutes;
    }

    private function getCacheName($cacheName)
    {
        if ($this->base64) {
            return base64_encode($cacheName);
        }
        return $cacheName;
    }

    private function cacheDirExists($cacheDir)
    {
        if (!file_exists($cacheDir)) {
            mkdir($cacheDir, 0777, true);
        }
        return true;
    }

    /**
     * @array $data Ddatanız. Bu değer Cache dosyasına yazılacaktır.
     * @string $cacheName Cache Dosya adını belirtiniz.
     * @return bool
     */
    public function createCache($data, $cacheName)
    {
        if (!$this->cacheDirExists($this->cacheDir)) {
            return false;
        }
        file_put_contents($this->cacheDir . $this->getCacheName($cacheName) . ".json", json_encode($data, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
        return true;
    }

    /**
     * @string $cacheName Okunacak Cache dosya adını veriniz.
     * @return false|mixed
     */
    public function getCache($cacheName, $associative = false)
    {
        if (!file_exists($this->cacheDir . $this->getCacheName($cacheName) . ".json")) {
            return false;
        }
        $filePath = $this->cacheDir . $this->getCacheName($cacheName) . ".json";
        if ($this->cacheMinutes != 0) {
            $fileCreationTime = filectime($filePath);
            $currentTime = time();
            $timeDifference = $currentTime - $fileCreationTime;
            if ($timeDifference > $this->cacheMinutes) {
                unlink($this->cacheDir . $this->getCacheName($cacheName) . ".json");
                return false;

            }
        }
        return json_decode($this->cacheDir . $this->getCacheName($cacheName) . ".json", $associative);
    }

    /**
     * @return string
     */
    public function dumpAllCache()
    {
        $directory = $this->cacheDir;
        $files = glob($directory . '/*.json');
        $i = 0;
        foreach ($files as $file) {
            if (is_file($file)) {
                unlink($file);
                $i++;
            }
        }
        return $i . " adet cache dosyası silindi";
    }
}