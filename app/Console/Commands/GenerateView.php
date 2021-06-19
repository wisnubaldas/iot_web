<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\ViewTrait;
class GenerateView extends Command
{
    use ViewTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:view';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bikin template view sesuai dengan template yang sudah ada';

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
     * @return int
     */
    public function handle()
    {
        $folder = $this->list_all_folder('resources/views');
        $this->info('Haloo kamu mau buat view ya....!!!');
        $view_name = $this->ask('Mau kamu kasih nama apa view nya..?');
        if(!$view_name)
        {
            $this->error('nama view harus di buat.!!!');
            return 0;
        }
        $this->info('Default root folder view menggunakan "/"');
        $this->table(
            ['Folder', 'Path'],
            $folder
        );
        $view_folder = $this->ask('Folder view nya yang mana....?');
        if(!$view_folder)
        {
            $this->error('folder view harus di buat..!!!');
            return 0;
        }
        $view = $this->stub_to_php([
            'view'=>$view_name,
            'folder'=>(!$view_folder)?'/':$view_folder
        ]);

        $this->info('Load view pada controller, '.$view);
        return 0;
    }
}
