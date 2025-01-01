```filecache

  ____  _   _ ____            _____ _ _       ____           _          
 |  _ \| | | |  _ \          |  ___(_) | ___ / ___|__ _  ___| |__   ___ 
 | |_) | |_| | |_) |  _____  | |_  | | |/ _ \ |   / _` |/ __| '_ \ / _ \
 |  __/|  _  |  __/  |_____| |  _| | | |  __/ |__| (_| | (__| | | |  __/
 |_|   |_| |_|_|             |_|   |_|_|\___|\____\__,_|\___|_| |_|\___|
                                                                                                                        

```


## 📜 Genel Bilgiler

**Proje Adı:** `filecache`

`filecache` ile basit bir json veri cachleme yapısı kurabilirsiniz. Bu proje olabildiğince basit tutulmuştur.

## 🚀 Kurulum

**PHP FileCache** kurulumunu, proje ana dizininde aşağıdaki komutu yazarak kolayca gerçekleştirebilirsiniz:

```bash
composer require emirustaoglu/filecache
```

veya `composer.json` dosyanıza aşağıdaki satırları ekleyerek manuel kurulum yapabilirsiniz

```bash
{
    "require": {
        "emirustaoglu/filecache": "^1.0.0"
    }
}
```

Daha sonrasında aşağıdaki komutu çalıştırın

```bash
composer install
```

## ⚙️ Gereksinimler

- PHP Sürümü:
    - Minimum: PHP 7.4
    - Tavsiye Edilen: PHP 8.1 veya üzeri

## 💻 Kullanım Örneği

```php
use emirustaoglu\filecache;

/**
 * @string $cacheDir Cache dizinini belirtiniz.
 * @int $cacheMinutes Cache dosyalarınız için dakika bazında süre belirtiniz. Bu süre default olarak 1 gündür
 * @bool $base64 Cache yapısında dosya isminin base64 olarak şifrelenip şifrelenmeyeceğini belirtiniz.
 */
$cache = new FileCache(__DIR__ . "/cache/", 1440, false);

//Cache Dosyası Oluşturma

/**
 * @array $data Ddatanız. Bu değer Cache dosyasına yazılacaktır.
 * @string $cacheName Cache Dosya adını belirtiniz.
 * @return bool
 */
if ($cache->createCache($data, "currencyCache")) {
    //... cache dosyası yazıldı
} else {
    //... cache dosyası yazılamadı
}

//Cache verisini çekme
/**
 * @string $cacheName Okunacak Cache dosya adını veriniz.
 * @return false|mixed
 */
$getCache = $cache->getCache("currencyCache");

print_r($getCache);

```

## 🤝 Katkıda Bulunma
Bu proje açık kaynaklıdır. İsteyen herkes katkıda bulunabilir.

1. Projeyi forklayın ( https://github.com/emirustaoglu/numbertoword/fork )
2. Özellik dalınızı (branch) oluşturun (git checkout -b yeni-ozellik)
3. Değişikliklerinizi commitleyin (git commit -am 'Yeni özellik eklendi')
4. Dalınıza push yapın (git push origin yeni-ozellik)
5. Yeni bir Pull Request oluşturun

## 📜 Lisans
Bu proje [MIT](http://opensource.org/licenses/MIT) Lisansı altında lisanslanmıştır. Dilediğiniz gibi kullanabilir ve dağıtabilirsiniz.

### 🎉 Kullandığınız için Teşekkürler!
