<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class CategoryDataProcessorCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data:category {--action=process_products_number}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to process categories data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $action = $this->option('action');
        if ($action === 'process_products_number') {
            foreach (Category::all() as $category) {
                DB::table('categories')->where('id', $category->id)
                    ->update(['num_products' => $category->products->count()]);
            }
            $this->info('Update number of products successfully!');
        } else {
            $this->error('Action is not existed!');
        }
    }
}
