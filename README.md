<p align="center">
  <img src="https://via.placeholder.com/400x100.png?text=Medvion+Platform+Logo" width="400" alt="Medvion Logo">
</p>

<h1 align="center">منصة Medvion للتدريب والتأهيل والتثقيف الصحي الرقمي</h1>

## 📖 عن المنصة (About Medvion)

منصة **Medvion** هي منصة إلكترونية تعليمية متكاملة مخصصة للتدريب والتأهيل والتثقيف الصحي الرقمي. تم بناء المنصة باستخدام برمجة مخصصة (Custom Development) على إطار عمل **Laravel**، لتوفير بيئة تعليمية موثوقة، سريعة، وآمنة تلبي المعايير الطبية والتقنية الحديثة.

## ✨ المميزات الرئيسية (Key Features)

- **واجهة مستخدم متجاوبة (Responsive UI/UX):** تصميم متجاوب بنسبة 100% بنهج (Mobile First)، مع استخدام ألوان رسمية تعكس المصداقية الطبية، وأيقونات خطية (Line Icons) بسيطة واحترافية.
- **إدارة ديناميكية للدورات:** إمكانية إضافة عدد غير محدود من الدورات عبر قوالب ديناميكية (Dynamic Templates)، تدعم إدراج روابط فيديو تعريفية (YouTube / Vimeo).
- **الأداء العالي (High Performance):** زمن تحميل للصفحات الأساسية لا يتجاوز 3 ثوانٍ، مع دعم خاصية الضغط التلقائي للصور (Image Optimization).
- **الإشعارات الفورية (Notifications):** نظام إشعارات فوري عبر البريد الإلكتروني للإدارة عند تعبئة نماذج التواصل أو طلبات التسجيل في الدورات.

## 🛡️ الأمان والحماية (Security)

تم تصميم البنية التحتية للمنصة بمعايير أمان صارمة تشمل:

- حماية متقدمة ضد هجمات **Brute Force**، **Spam**، و **Bot Attacks**.
- تحديد وتقييد عدد محاولات تسجيل الدخول (Login Rate Limiting).
- بنية تحتية جاهزة لتفعيل المصادقة الثنائية (2FA) مستقبلاً.

## 👥 نظام الصلاحيات (Roles & Permissions)

يعتمد النظام على هيكلية صلاحيات دقيقة تشمل:

1. **المدير (Admin):** يمتلك تحكماً شاملاً بكل مكونات المنصة.
2. **المحرر (Editor):** يقتصر دوره على إضافة أو تعديل محتوى الدورات التعليمية.
3. **المشرف (Moderator):** مسؤول عن مراجعة التعليقات، الرد على الرسائل، ومتابعة الطلبات.

## 🛠️ التثبيت وإعداد بيئة التطوير (Installation & Setup)

لإعداد المشروع في بيئة التطوير المحلية (Local Environment)، يرجى اتباع الخطوات التالية:

```bash
# 1. Clone the repository
git clone [https://github.com/HakimAlqubati/Medvion.git](https://github.com/HakimAlqubati/Medvion.git)

# 2. Install dependencies
composer install
npm install

# 3. Environment configuration
cp .env.example .env
php artisan key:generate

# 4. Database setup
php artisan migrate --seed

# 5. Storage link (للصور والملفات المرفوعة)
php artisan storage:link

# 6. Run the application
php artisan serve
npm run dev
```
