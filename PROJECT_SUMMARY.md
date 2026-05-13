# សេចក្តីសង្ខេបអំពីគម្រោង (Project Summary) - Telegram Alert

គម្រោង `telegram_alert` គឺជាប្រព័ន្ធលក់ទំនិញអនឡាញ (E-commerce Clothing Shop) ពេញលេញមួយដែលត្រូវបានអភិវឌ្ឍឡើងដោយប្រើប្រាស់ **Laravel Framework**។ គម្រោងនេះមានមុខងារសំខាន់ៗទាំងផ្នែកអតិថិជន (Client-side) និងផ្នែកគ្រប់គ្រង (Admin Panel) ព្រមទាំងការភ្ជាប់ជាមួយ Telegram Bot សម្រាប់ផ្ញើដំណឹងការបញ្ជាទិញ។

---

## 🚀 មុខងារសំខាន់ៗ (Key Features)

### ១. ផ្នែកអតិថិជន (Client Side)
* **ទំព័រដើម និងការស្វែងរក (Home & Search)**: 
  * ទំព័រដើមស្វាគមន៍ និងបង្ហាញផលិតផល។
  * មុខងារស្វែងរកផលិតផលតាមឈ្មោះ (Product Search)។
  * ការបែងចែកប្រភេទផលិតផល (Categories)។
* **ប្រព័ន្ធគណនី (Authentication)**:
  * ចុះឈ្មោះ (Register) និងចូលប្រើប្រាស់ (Login)។
  * គ្រប់គ្រងព័ត៌មានផ្ទាល់ខ្លួន (Profile) និងការប្តូររូបភាពតំណាង (Avatar)។
* **កន្ត្រកទំនិញ (Shopping Cart)**:
  * បន្ថែមទំនិញទៅក្នុងកន្ត្រក (Add to Cart) ដោយប្រើ Session។
  * បង្ហាញបញ្ជីទំនិញ និងគណនាតម្លៃសរុប។
* **ការបញ្ជាទិញ និងការទូទាត់ (Checkout & Payment)**:
  * បំពេញព័ត៌មានអ្នកទិញ (ឈ្មោះ លេខទូរស័ព្ទ ទំហំ និងអាសយដ្ឋាន)។
  * តម្រូវឱ្យបង្ហោះរូបភាពវិក្កយបត្រទូទាត់ប្រាក់ (Payment Receipt Upload - ឧ. ស្កេន KHQR)។
  * ទំព័រជោគជ័យ (Success Page) បង្ហាញបន្ទាប់ពីកម្ម៉ង់រួច ជាមួយផលប៉ះពាល់ (Confetti effects)។

### ២. ការជូនដំណឹងតាម Telegram (Telegram Notification)
* នេះជាមុខងារស្នូលនៃគម្រោង៖
  * រាល់ពេលមានការបញ្ជាទិញថ្មី ប្រព័ន្ធនឹងចងក្រងព័ត៌មានកម្ម៉ង់ (Order ID, ឈ្មោះ, លេខទូរស័ព្ទ, ទំនិញដែលបានទិញ និងតម្លៃសរុប)។
  * ប្រព័ន្ធនឹងផ្ញើសារដំណឹងនេះ **ព្រមទាំងរូបភាពវិក្កយបត្រ (Receipt)** ទៅកាន់ Telegram Group ឬ Account របស់ម្ចាស់ហាងភ្លាមៗតាមរយៈ **Telegram Bot API**។

### ៣. ផ្នែកគ្រប់គ្រង (Admin Panel)
* **ផ្ទាំងគ្រប់គ្រង (Dashboard)**: បង្ហាញស្ថិតិសង្ខេប។
* **គ្រប់គ្រងផលិតផល (Product Management)**: បន្ថែម កែប្រែ លុប និងមើលបញ្ជីផលិតផល (CRUD)។
* **គ្រប់គ្រងប្រភេទផលិតផល (Category Management)**: គ្រប់គ្រងប្រភេទសម្លៀកបំពាក់។
* **របាយការណ៍ (Reports)**: មើលរបាយការណ៍លក់ និងអាចទាញយកជាទម្រង់សម្រាប់បោះពុម្ព (Print Report)។
* **ការកំណត់ (Settings)**: អាចធ្វើការផ្លាស់ប្តូររូបភាព KHQR សម្រាប់ឱ្យអតិថិជនស្កេនទូទាត់ប្រាក់។

---

## 🛠️ បច្ចេកវិទ្យាដែលប្រើប្រាស់ (Tech Stack)

* **Backend**: PHP 8.x, Laravel Framework
* **Frontend**: Blade Templating, TailwindCSS (សម្រាប់ Styling), JavaScript (សម្រាប់ Interactive UI & Effects)
* **Database**: MySQL (រក្សាទុកទិន្នន័យ Users, Products, Categories, Orders, OrderItems)
* **API Integration**: Telegram Bot API (សម្រាប់ផ្ញើសារ និងរូបភាព)

---

## 📂 រចនាសម្ព័ន្ធឯកសារសំខាន់ៗ (Project Structure Overview)

* `app/Http/Controllers/`: ផ្ទុក Logic របស់កម្មវិធី (Shop, Auth, Admin Controllers)។
* `app/Models/`: ផ្ទុក Database Models (`User`, `Product`, `Category`, `Order`, `OrderItem`)។
* `resources/views/`: ផ្ទុកទំព័របង្ហាញ (Blade Views) ទាំងផ្នែក User និង Admin។
* `routes/web.php`: ផ្ទុកផ្លូវ (Routes) ទាំងអស់របស់កម្មវិធី។
* `.env`: ផ្ទុកការកំណត់សំខាន់ៗដូចជា `TELEGRAM_BOT_TOKEN` និង `TELEGRAM_CHAT_ID`។

---
**សរុបមក** គម្រោងនេះគឺជាប្រព័ន្ធ E-commerce ខ្នាតតូចទៅមធ្យម ដែលមានភាពងាយស្រួលក្នុងការគ្រប់គ្រងការលក់ និងទទួលបានការជូនដំណឹងភ្លាមៗតាមរយៈ Telegram ដែលជួយសម្រួលដល់ម្ចាស់ហាងក្នុងការបំពេញការកម្ម៉ង់បានលឿន។
