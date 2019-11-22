<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminated\Console\Loggable;

class InsertDatabase extends Command
{
    use Loggable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:insertdb';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert new feed';

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
        $this->output->text("Please fillout the data:\n");
        $title=readline("Title/Name: ");
        $category=readline("Category: ");
        $link=readline("Link: ");
        $description=readline("Description: ");
        DB::table('sample_feeds')->insertGetId
        (
            [
                'title'=>$title,
                'category'=>$category,
                'link'=>$link,
                'description'=>$description,
                'created_at'=>\Carbon\Carbon::now(),
                'updated_at'=>\Carbon\Carbon::now(),
            ]
        );
        $this->logInfo("\nInserted feed item: \n\tItem title: {$title} \n\tItem category: {$category} \n\tItem link: {$link} \n\tItem description: {$description}");
        $this->output->text("\nInserted feed item: \n\tItem title: {$title} \n\tItem category: {$category} \n\tItem link: {$link} \n\tItem description: {$description}");
    }




}
