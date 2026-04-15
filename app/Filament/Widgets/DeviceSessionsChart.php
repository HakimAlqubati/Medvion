<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class DeviceSessionsChart extends ChartWidget
{
    protected static ?int $sort = 4;

    public function getHeading(): string
    {
        return __('lang.device_sessions_chart.heading');
    }
 public static function canView(): bool
    {
        return is_admin();
    }
    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => __('lang.device_sessions_chart.sessions'),
                    // نسب استخدام الأجهزة (تجريبي)
                    'data' => [65, 25, 10], 
                    'backgroundColor' => [
                        '#F59E0B', // برتقالي حيوي للجوال
                        '#1A52CE', // أزرق المنصة للحاسب
                        '#10B981', // أخضر للوحي
                    ],
                    'hoverOffset' => 5, // لتأثير التحويم
                ],
            ],
            'labels' => [
                __('lang.device_sessions_chart.mobile'),
                __('lang.device_sessions_chart.desktop'),
                __('lang.device_sessions_chart.tablet'),
            ],
        ];
    }

    protected function getType(): string
    {
        // مخطط دائري (Pie) يعطي تنوع ممتاز جنب المخططات الأخرى
        return 'pie';
    }
}
