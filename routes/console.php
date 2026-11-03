<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\URL;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Artisan::command('coursepath:access-link {--minutes=240}', function () {
    $minutes = (int) $this->option('minutes');
    if ($minutes < 1 || $minutes > 10080) {
        $this->error('Choose between 1 and 10080 minutes.');

        return 1;
    }
    $this->line(URL::temporarySignedRoute('coursepath.guided', now()->addMinutes($minutes)));

    return 0;
})->purpose('Issue a time-limited CoursePath supported-planning entry link');
