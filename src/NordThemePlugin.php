<?php

namespace Boy132\NordTheme;

use Filament\Contracts\Plugin;
use Filament\Panel;
use Filament\Support\Colors\Color;

class NordThemePlugin implements Plugin
{
    public function getId(): string
    {
        return 'ruxora-theme';
    }

    public function register(Panel $panel): void
    {
        $panel->viteTheme('plugins/ruxora-theme/resources/css/theme.css');

        $panel->colors([
            'gray' => [
                50 => '#fdf7fa',
                100 => '#f8eef3',
                200 => '#ecdfe6',
                300 => '#d7c6cf',
                400 => '#c8bcc2',
                500 => '#8f7f87',
                600 => '#4f5564',
                700 => '#33282e',
                800 => '#231a20',
                900 => '#181115',
                950 => '#14171f',
            ],
            'primary' => [
                50 => '#fff1f6',
                100 => '#ffe4ed',
                200 => '#ffc9dc',
                300 => '#ff9fc0',
                400 => '#ff6b9e',
                500 => '#f44e82',
                600 => '#df2763',
                700 => '#bd174c',
                800 => '#9d1742',
                900 => '#86183d',
                950 => '#4b061d',
            ],
            'secondary' => Color::hex('#f99fc0'),
            'info' => Color::hex('#f44e82'),
            'success' => Color::hex('#22c55e'),
            'warning' => Color::hex('#f59e0b'),
            'danger' => Color::hex('#ef4444'),
        ]);
    }

    public function boot(Panel $panel): void {}
}
