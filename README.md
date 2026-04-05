# Matn tahlil mini

Bu loyiha `Open Server` va `Visual Studio` (yoki Visual Studio Code) uchun tayyorlangan `PHP` matn tahlil sayti.

## Qanday ishlatish

### 1. Open Server bilan ishlash

1. `Open Server` ni ishga tushiring va u yashil bo‘lishini kuting.
2. Agar siz `Open Server` sozlamalarida `Root domain directory` sifatida `domains` ishlatayotgan bo‘lsangiz, loyiha papkasi quyida bo‘lishi kerak:
   - `d:\OSPanel\domains\text-analyzer`
3. Agar `www` katalogi ishlatilsa, loyiha papkasini `OpenServer\domains\text-analyzer` yoki `OpenServer\www\text-analyzer` ichiga joylashtiring.

### 2. Brauzerda ochish

#### variant A — `domains` katalogi bo‘lsa
- `http://text-analyzer:8080/`

> Agar bu ishlamasa, `hosts` faylga quyidagini qo‘shing:
> `127.0.0.1 text-analyzer`

#### variant B — `localhost` orqali ishlash
- `http://localhost:8080/text-analyzer/`

## Fayllar

- `index.php` — matnni qabul qiladi va so‘z sanovi hamda chastota tahlilini bajaradi.
- `style.css` — sahifa dizayni va ko‘rinishini ta’minlaydi.

## Sayt qanday ishlaydi

- Matn maydoniga o‘zbekcha yoki inglizcha matn yozing.
- `Tahlil qilish` tugmasini bosing.
- Sayt natija sifatida:
  - umumiy so‘zlar sonini
  - yagona so‘zlar sonini
  - so‘zlar chastotasini ko‘rsatadi.

## Visual Studio / Visual Studio Code

1. `d:\OSPanel\domains\text-analyzer` papkasini Visual Studio Code yoki Visual Studio orqali oching.
2. `index.php` va `style.css` fayllarini tahrir qilishingiz mumkin.
3. Saytni ko‘rish uchun brauzerni oching va yuqoridagi URLlardan birini ishlating.

## Muhim eslatma

- `index.php` faylni brauzerda ko‘rish uchun Open Server ishlashi kerak.
- `hosts` faylga yozilgan `text-analyzer` domeni saytni `domains` katalogida oson ishlatadi.
