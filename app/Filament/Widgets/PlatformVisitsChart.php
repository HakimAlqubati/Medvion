<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Carbon\Carbon;

class PlatformVisitsChart extends ChartWidget
{
    protected static ?int $sort = 3;

    public function getHeading(): string
    {
        return __('lang.platform_visits_chart.heading');
    }
    public static function canView(): bool
    {
        return is_admin();
    }
    protected function getData(): array
    {
        // جلب أسماء آخر 6 أشهر بشكل ديناميكي ومترجم
        $months = collect(range(0, 5))->map(function ($i) {
            return Carbon::now()->subMonths($i)->translatedFormat('F');
        })->reverse()->values()->toArray();

        return [
            'datasets' => [
                [
                    'label' => __('lang.platform_visits_chart.visits'),
                    // عدد الزيارات التجريبية للإيحاء بالتفاعل الشهري
                    'data' => [420, 580, 890, 1200, 1450, 2100],
                    'backgroundColor' => '#14B8A6', // لون تيل مميز (Teal) يعكس النشاط
                    'borderRadius' => 6, // تقويس زوايا الأعمدة لمظهر عصري
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        // مخطط أعمدة (Bar) ممتاز لإبراز أعداد وتفاعل الزوار
        return 'bar';
    }
}
