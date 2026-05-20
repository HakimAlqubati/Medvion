<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>إشعار تعليق الخدمات | Medvion</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700;800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Tajawal', sans-serif;
            background-color: #f1f5f9; /* slate-100 */
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">

    <div class="bg-white max-w-2xl w-full rounded-2xl shadow-2xl overflow-hidden relative">
        <!-- شريط علوي بلون تحذيري -->
        <div class="h-3 w-full bg-red-600"></div>
        
        <div class="p-8 md:p-12 text-center">
            
            <!-- أيقونة التحذير -->
            <div class="mx-auto flex items-center justify-center h-20 w-20 rounded-full bg-red-100 mb-6">
                <svg class="h-12 w-12 text-red-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
            </div>

            <h1 class="text-3xl font-bold text-gray-900 mb-4">إشعار بتعليق خدمات الموقع</h1>
            
            <div class="space-y-4 text-lg text-gray-600 leading-relaxed text-justify mt-8">
                <p>
                    أود الإفادة بأنه قد تم <span class="font-bold text-red-600">تعليق خدمات هذا الموقع الإلكتروني</span> من قِبلي (كمطور للموقع). يأتي هذا الإجراء نظراً لتهرب المدعو (مراد مفلح) من سداد باقي المستحقات المالية المتفق عليها.
                </p>
                <p>
                    ولذلك، سيبقى الموقع معلقاً بشكل مؤقت ريثما يتم الدفع. وفي حال استمرار التهرب وعدم الالتزام، <span class="font-bold text-gray-900">سيتم الإيقاف النهائي للموقع وحذف النطاق (الدومين) بشكل كلي</span> بحلول نهاية شهر مايو (الموافق <span class="font-bold text-red-600">31-05-2026</span>).
                </p>
            </div>

            <hr class="my-8 border-gray-200">

            <div class="bg-gray-50 rounded-xl p-6 border border-gray-100 text-right">
                <p class="text-sm text-gray-500 mb-1">للتواصل وتسوية المعاملات المالية:</p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center space-x-3 space-x-reverse">
                        <div class="h-10 w-10 rounded-full bg-primary flex items-center justify-center text-white font-bold text-xl">
                            ح
                        </div>
                        <div>
                            <p class="text-gray-900 font-bold text-lg">المطور: حكيم</p>
                            <p class="text-primary-dark font-semibold text-xl mt-1" dir="ltr">7730 300 69</p>
                        </div>
                    </div>
                    <a href="https://wa.me/967773030069" target="_blank" class="hidden sm:flex items-center justify-center px-4 py-2 bg-green-500 hover:bg-green-600 text-white rounded-lg font-medium transition-colors">
                        <svg class="w-5 h-5 ml-2" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.245 2.248 3.481 5.236 3.48 8.414-.003 6.557-5.338 11.892-11.893 11.892-1.99-.001-3.951-.5-5.688-1.448l-6.305 1.654zm6.597-3.807c1.676.995 3.276 1.591 5.392 1.592 5.448 0 9.886-4.434 9.889-9.885.002-5.462-4.415-9.89-9.881-9.892-5.452 0-9.887 4.434-9.889 9.884-.001 2.225.651 3.891 1.746 5.634l-.999 3.648 3.742-.981zm11.387-5.464c-.074-.124-.272-.198-.57-.347-.297-.149-1.758-.868-2.031-.967-.272-.099-.47-.149-.669.149-.198.297-.768.967-.941 1.165-.173.198-.347.223-.644.074-.297-.149-1.255-.462-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.297-.347.446-.521.151-.172.2-.296.3-.495.099-.198.05-.372-.025-.521-.075-.148-.669-1.611-.916-2.206-.242-.579-.487-.501-.669-.51l-.57-.01c-.198 0-.52.074-.792.347-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.876 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.263.489 1.694.626.712.226 1.36.194 1.872.118.571-.085 1.758-.719 2.006-1.413.248-.695.248-1.29.173-1.414z"/></svg>
                        واتساب
                    </a>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>