<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\RouterTrait;
use Illuminate\Support\Facades\Artisan;
class GenerateRoute extends Command
{
    use RouterTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:route {nama}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Bikin default route di laravel, lumayan lah buat latihan';

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
        $nama = $this->route_name($this->argument('nama'));
        $route_tipe = $this->choice(
            'Kamu mau buat routing nya dimana...?',
            ['back_route', 'front_route']
        );
        $controller = $this->ask('lokasi path controller nya dimana...?');
        $method = $this->ask('Nama method "'.$controller.'" apa...?');
        $this->stub_to_php([
            '{{ prefix }}'=>$nama,
            '{{ controller }}'=>$controller,
            '{{ method }}'=>$method,
        ],$route_tipe,$nama);
        Artisan::call('route:cache');
        return 0;
    }
}
