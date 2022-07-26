# PHP-RESTAPI-Case4PTTEM

Veritabanında 2 tablo;
- Clients (API'ye erisim saglayacaklar icin, bir auth code iceriyor)
- Products (Urunlere ait bilgilerin bulundugu tablo)


API'ye erisim, GET methoduyla gerceklesiyor.
Ornek URL;
http://localhost/index.php/products/list?limit=5&format=xml&yazdir=0&code=5678-8765

URI Parametreleri:
- limit (int) - Zorunlu Degil : cekilecek/olusturulacak veri sayisi belirlenebilir. Parametre girilmezse default deger:10000
- order (str) - Zorunlu Degil : Veriyi ID ASC ya da RAND() olarak ceker. Random veri icin parametre "rand". Default ID ASC
- format (str) - Zorunlu Degil : olusturulacak dosya formati. Secenekler xml/json. Default parametre json
- yazdir (bool) - Zorunlu Degil : Veriyi ekrana yazdirma secenegi. Default Deger 0
- code (str) - Zorunlu : Veriye Erisecek Clienti veritabanından Dosgrulama


TEST ORTAMI:
- Ubuntu Server 20.04 LTS
- Mysql : V8.0.29
- PHP : v8.1.7
- Web Server : nginx


OZET:
Client, kendisine verilen auth code ve link ile, ontanimli parametreler girerek ya da girmeden default degerler ile, veri dosyasini, generated_files altinda, client adi ve auth kodu kombinasyonu ile otomatik olarak olusturulan klasor altinda yaratir.

Bir diger secenek de, sunucu tarafinda, index dosyasini belli periyotlarda bir cronjob olarak calistirip, client'e sadece dosyayi indirme linki verilir. Bu yontem, sunucu uzerindeki yuku hafifletecektir.
