<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class UsersChart extends ChartWidget
{
    // عنوان التشارت في الداشبورد
    protected static ?int $sort = 1;

    // protected int | string | array $columnSpan = 'full';

    public function getHeading(): string
    {
        return __('lang.users_chart.heading');
    }
    public static function canView(): bool
    {
        return is_admin();
    }
    protected function getData(): array
    {
        $months = collect(range(1, 12))->map(fn($month) => \Carbon\Carbon::create(null, $month, 1)->translatedFormat('F'))->toArray();

        return [
            'datasets' => [
                [
                    'label' => __('lang.users_chart.new_users'),
                    'data' => [12, 19, 15, 25, 32, 45, 60, 75, 68, 85, 92, 110],
                    'borderColor' => '#1A52CE',
                    'backgroundColor' => 'rgba(26, 82, 206, 0.15)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
                [
                    'label' => __('lang.users_chart.course_subscriptions'),
                    'data' => [5, 10, 18, 22, 19, 35, 41, 55, 65, 78, 88, 105],
                    'borderColor' => '#0D9488',
                    'backgroundColor' => 'rgba(13, 148, 136, 0.15)',
                    'fill' => true,
                    'tension' => 0.4,
                ],
            ],
            'labels' => $months,
        ];
    }

    protected function getType(): string
    {
        // تغيير نوع التشارت إلى خطي، متوفر أنواع أخرى مثل 'bar', 'pie', 'doughnut'
        return 'line';
    }
}
