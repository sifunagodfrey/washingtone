<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class GenerateAdminModels extends Command
{
    protected $signature = 'admin:generate-models';
    protected $description = 'Generate all admin-related models';

    public function handle()
    {
        // -------------------
        // Models List
        // -------------------
        $models = [

            // -------------------
            // Core Users
            // -------------------
            'User',
            'Client',
            'Staff',

            // -------------------
            // Operations
            // -------------------
            'Booking',
            'Quotation',
            'Move',
            'RouteModel',
            'Tracking',

            // -------------------
            // Logistics
            // -------------------
            'Vehicle',
            'Schedule',

            // -------------------
            // Documents
            // -------------------
            'Invoice',
            'Receipt',
            'BookingOrder',
            'ConditionReport',
            'MoveReport',
            'Debrief',
            'Feedback',
            'Contract',
            'DeliveryNote',
            'Payment',
            'Attachment',

            // -------------------
            // CMS / Content
            // -------------------
            'Blog',
            'BlogCategory',
            'Page',
            'Service',

            // -------------------
            // System
            // -------------------
            'Report',
            'ContactMessage',
            'Chat',
            'Setting',
        ];

        // -------------------
        // Generate Models
        // -------------------
        foreach ($models as $model) {

            $this->info("Creating model: {$model}");

            Artisan::call('make:model', [
                'name' => $model,
                '--no-interaction' => true,
            ]);

            $this->line(Artisan::output());
        }

        $this->info('All models generated successfully.');
    }
}