<p align="center">
  <img src="https://via.placeholder.com/400x100.png?text=Medvion+Platform+Logo" width="400" alt="Medvion Logo">
</p>

<h1 align="center">منصة Medvion للتدريب والتأهيل والتثقيف الصحي الرقمي</h1>

## 📖 عن المنصة (About Medvion)
[cite_start]منصة **Medvion** هي منصة إلكترونية تعليمية متكاملة مخصصة للتدريب والتأهيل والتثقيف الصحي الرقمي[cite: 2]. [cite_start]تم بناء المنصة باستخدام برمجة مخصصة (Custom Development) على إطار عمل **Laravel** [cite: 14]، لتوفير بيئة تعليمية موثوقة، سريعة، وآمنة تلبي المعايير الطبية والتقنية الحديثة.

## ✨ المميزات الرئيسية (Key Features)
* [cite_start]**واجهة مستخدم متجاوبة (Responsive UI/UX):** تصميم متجاوب بنسبة 100% بنهج (Mobile First) [cite: 96][cite_start]، مع استخدام ألوان رسمية تعكس المصداقية الطبية [cite: 98][cite_start]، وأيقونات خطية (Line Icons) بسيطة واحترافية[cite: 153].
* [cite_start]**إدارة ديناميكية للدورات:** إمكانية إضافة عدد غير محدود من الدورات [cite: 112] [cite_start]عبر قوالب ديناميكية (Dynamic Templates) [cite: 111][cite_start]، تدعم إدراج روابط فيديو تعريفية (YouTube / Vimeo)[cite: 113].
* [cite_start]**الأداء العالي (High Performance):** زمن تحميل للصفحات الأساسية لا يتجاوز 3 ثوانٍ [cite: 247][cite_start]، مع دعم خاصية الضغط التلقائي للصور (Image Optimization)[cite: 100].
* [cite_start]**الإشعارات الفورية (Notifications):** نظام إشعارات فوري عبر البريد الإلكتروني للإدارة عند تعبئة نماذج التواصل أو طلبات التسجيل في الدورات[cite: 121, 270, 271].

## 🛡️ الأمان والحماية (Security)
تم تصميم البنية التحتية للمنصة بمعايير أمان صارمة تشمل:
* [cite_start]حماية متقدمة ضد هجمات **Brute Force**، **Spam**، و **Bot Attacks**[cite: 92].
* [cite_start]تحديد وتقييد عدد محاولات تسجيل الدخول (Login Rate Limiting)[cite: 93].
* [cite_start]بنية تحتية جاهزة لتفعيل المصادقة الثنائية (2FA) مستقبلاً[cite: 94].

## 👥 نظام الصلاحيات (Roles & Permissions)
[cite_start]يعتمد النظام على هيكلية صلاحيات دقيقة تشمل[cite: 132]:
1. [cite_start]**المدير (Admin):** يمتلك تحكماً شاملاً بكل مكونات المنصة[cite: 147].
2. [cite_start]**المحرر (Editor):** يقتصر دوره على إضافة أو تعديل محتوى الدورات التعليمية[cite: 148].
3. [cite_start]**المشرف (Moderator):** مسؤول عن مراجعة التعليقات، الرد على الرسائل، ومتابعة الطلبات[cite: 149].

## 🛠️ التثبيت وإعداد بيئة التطوير (Installation & Setup)
لإعداد المشروع في بيئة التطوير المحلية (Local Environment)، يرجى اتباع الخطوات التالية:

```bash
# 1. Clone the repository
git clone [repository-url]

# 2. Install dependencies
composer install
npm install

# 3. Environment configuration
cp .env.example .env
php artisan key:generate

# 4. Database setup
# (تأكد من إعداد بيانات قاعدة البيانات في ملف .env)
php artisan migrate --seed

# 5. Storage link (للصور والملفات المرفوعة)
php artisan storage:link

# 6. Run the application
php artisan serve
npm run dev