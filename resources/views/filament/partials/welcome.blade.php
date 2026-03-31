<style>
    /* 1. حركة إقلاع الصاروخ (كما هي) */
    @keyframes blastOff {
        0% { transform: translateY(0) rotate(0deg); }
        20% { transform: translateY(2px) rotate(-5deg); }
        50% { transform: translateY(-20px) rotate(45deg) scale(1.2); opacity: 0; }
        51% { transform: translateY(20px) rotate(45deg); opacity: 0; }
        100% { transform: translateY(0) rotate(0deg); opacity: 1; }
    }

    .rocket-icon:hover {
        animation: blastOff 1s ease-in-out forwards;
        display: inline-block;
        cursor: pointer;
    }

    /* 2. حركة النبض الهادئ لأيقونة الوقت (تعديل جديد) */
    @keyframes gentlePulse {
        0%, 100% {
            transform: scale(1); /* الحجم الطبيعي */
            filter: brightness(100%);
        }
        50% {
            transform: scale(1.2); /* تكبير بنسبة بسيطة */
            filter: brightness(120%); /* إضاءة خفيفة مع النبضة */
        }
    }

    .time-icon {
        display: inline-block;
        /* مدة 3 ثواني تجعل النبض بطيئاً وهادئاً */
        animation: gentlePulse 3s ease-in-out infinite; 
    }
</style>

@php
    $hour = date('H');

    // تحديد التحية والأيقونة بناءً على الساعة
    if ($hour >= 5 && $hour < 12) {
        $greeting = __('lang.good_morning');
        $timeIcon = '☀️';
        $iconColor = 'text-yellow-500';
    } elseif ($hour >= 12 && $hour < 17) {
        $greeting = __('lang.good_afternoon');
        $timeIcon = '⛅';
        $iconColor = 'text-orange-400';
    } else {
        $greeting = __('lang.good_evening');
        $timeIcon = '🌙';
        $iconColor = 'text-blue-400';
    }
@endphp

<div class="flex items-center gap-3 mb-6" dir="rtl">
    <h1 class="font-cairo text-2xl md:text-3xl font-bold tracking-tight text-gray-800 dark:text-gray-100 flex items-center gap-2">
        
        <span class="time-icon text-3xl {{ $iconColor }}" title="Time Icon">
            {{ $timeIcon }}
        </span>

        <span>
            {{ $greeting }}،
        </span>

        <span class="text-transparent bg-clip-text bg-gradient-to-l from-primary-600 to-indigo-600">
            {{ auth()->user()->name }}
        </span>

        <span class="rocket-icon text-2xl transition-transform transform" title="Blast Off!">
            🚀
        </span>
        
    </h1>
</div>
