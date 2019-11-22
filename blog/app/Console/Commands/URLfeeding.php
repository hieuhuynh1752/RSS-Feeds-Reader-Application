<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminated\Console\Loggable;

class URLfeeding extends Command
{
    use Loggable;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:feedurl {urls*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $urls=$this->argument('urls');
        $this->output->progressStart(50);
        for($i=0;$i<count($urls); $i++){
            $feedUrl=(string)$urls[$i];
            $feed=file_get_contents($feedUrl);
            $xmlContents=simplexml_load_string($feed);
            foreach($xmlContents->channel->item as $item)
            {
                DB::table('sample_feeds')->insertGetId
                (
                    [
                        'title'=>$item->title,
                        'category'=>$item->category,
                        'link'=>$item->link,
                        'description'=>$item->description,
                        'created_at'=>\Carbon\Carbon::now(),
                        'updated_at'=>\Carbon\Carbon::now(),
                    ]
                );
                $this->output->progressAdvance();
                $this->logInfo("\ninserted feed item: \n\tItem title:{$item->title}\n\tItem category {$item->category}\n\tItem link: {$item->link},\n\tItem description: {$item->description} \n\tFrom link: {$feedUrl}");
                $this->output->text("\nInserted feed item: \n\tItem title:{$item->title}\n\tItem category: {$item->category}\n\tItem link: {$item->link},\n\tItem description: {$item->description} \n\tFrom link: {$feedUrl}\n\n\n");
            }
        }
        $this->output->progressFinish();
        $this->output->text("URL's feeds are successfully added to database!");
    }
}
