<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class GenerateAdminControllers extends Command
{
    protected $signature = 'admin:generate-controllers';
    protected $description = 'Generate admin controllers with standard structure';

    public function handle()
    {
        // -------------------
        // Base Path
        // -------------------
        $basePath = app_path('Http/Controllers/Admin');

        // -------------------
        // Controllers Structure
        // -------------------
        $controllers = [

            // -------------------
            // Core
            // -------------------
            'DashboardController.php',
            'SettingsController.php',

            // -------------------
            // Users
            // -------------------
            'UsersController.php',
            'ClientsController.php',
            'StaffController.php',

            // -------------------
            // Operations
            // -------------------
            'BookingsController.php',
            'QuotationsController.php',
            'MovesController.php',
            'RoutesController.php',
            'TrackingController.php',

            // -------------------
            // Logistics
            // -------------------
            'VehiclesController.php',
            'SchedulingController.php',

            // -------------------
            // Documents
            // -------------------
            'InvoicesController.php',
            'ReceiptsController.php',
            'BookingOrdersController.php',
            'ConditionReportsController.php',
            'MoveReportsController.php',
            'DebriefsController.php',
            'FeedbackController.php',
            'ContractsController.php',
            'DeliveryNotesController.php',
            'PaymentsController.php',
            'AttachmentsController.php',

            // -------------------
            // CMS
            // -------------------
            'BlogsController.php',
            'BlogCategoriesController.php',
            'PagesController.php',
            'ServicesController.php',

            // -------------------
            // System
            // -------------------
            'ReportsController.php',
            'ContactMessagesController.php',
            'ChatController.php',
        ];

        // -------------------
        // Create Controllers
        // -------------------
        foreach ($controllers as $controller) {

            $className = str_replace('.php', '', $controller);

            $fullPath = $basePath . '/' . $controller;

            if (!File::exists($basePath)) {
                File::makeDirectory($basePath, 0755, true);
            }

            if (!File::exists($fullPath)) {

                File::put($fullPath, $this->stub($className));

                $this->info("Created: {$controller}");

            } else {
                $this->warn("Exists: {$controller}");
            }
        }

        $this->info('Admin controllers generated successfully.');
    }

    // -------------------
    // Controller Stub
    // -------------------
    private function stub($className)
    {
        return <<<PHP
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// -------------------
// {$className}
// -------------------

class {$className} extends Controller
{
    // -------------------
    // INDEX
    // -------------------
    public function index()
    {
        return view('admin.' . strtolower(str_replace('Controller', '', '{$className}')) . '.index');
    }

    // -------------------
    // CREATE
    // -------------------
    public function create()
    {
        return view('admin.' . strtolower(str_replace('Controller', '', '{$className}')) . '.create');
    }

    // -------------------
    // STORE
    // -------------------
    public function store(Request \$request)
    {
        //
    }

    // -------------------
    // SHOW
    // -------------------
    public function show(\$id)
    {
        return view('admin.' . strtolower(str_replace('Controller', '', '{$className}')) . '.show', compact('id'));
    }

    // -------------------
    // EDIT
    // -------------------
    public function edit(\$id)
    {
        return view('admin.' . strtolower(str_replace('Controller', '', '{$className}')) . '.edit', compact('id'));
    }

    // -------------------
    // UPDATE
    // -------------------
    public function update(Request \$request, \$id)
    {
        //
    }

    // -------------------
    // DELETE
    // -------------------
    public function destroy(\$id)
    {
        //
    }
}
PHP;
    }
}