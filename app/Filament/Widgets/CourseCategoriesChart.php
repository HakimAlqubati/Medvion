<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;

class CourseCategoriesChart extends ChartWidget
{
    protected static ?int $sort = 2;

    public function getHeading(): string
    {
        return __('lang.course_categories_chart.heading');
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
                    'label' => __('lang.course_categories_chart.courses_count'),
                    'data' => [35, 25, 20, 15, 5],
                    'backgroundColor' => [
                        '#1A52CE', // Primary
                        '#0D9488', // Secondary
                        '#4F46E5', // Indigo
                        '#14B8A6', // Secondary Light
                        '#DB2777', // Pink/Decorative
                    ],
                    'hoverOffset' => 10,
                    'borderWidth' => 2,
                    'borderColor' => 'transparent',
                ],
            ],
            'labels' => [
                __('lang.course_categories_chart.web_dev'),
                __('lang.course_categories_chart.marketing'),
                __('lang.course_categories_chart.design'),
                __('lang.course_categories_chart.apps'),
                __('lang.course_categories_chart.business'),
            ],
        ];
    }

    protected function getType(): string
    {
        // عرض على شكل دائرة (دونات) يعطي نظرة جمالية بجانب المخطط الخطي السابق
        return 'doughnut';
    }
}
