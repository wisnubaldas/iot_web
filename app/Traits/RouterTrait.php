<?php

namespace App\Traits;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

trait RouterTrait
{
    protected function route_name($name)
    {
        return Str::kebab($name);
    }

    protected function getStub()
    {
        return  base_path() . '/stubs/router.stub';
    }
    protected function replace_stub($arr)
    {
        $content = file_get_contents($this->getStub());
        foreach ($arr as $key => $value) {
            $content = str_replace($key, $value, $content);
        }
        return $content;
    }
    protected function stub_to_php($router,$type,$nama)
    {
        $content = $this->replace_stub($router);
        $route_path = base_path().'/routes/'.$type.'/'.$nama.'.php';
        $this->cek_file($route_path);
            return file_put_contents($route_path,$content);
    }
    protected function cek_file($path)
    {
        if(file_exists($path))
        {
            throw new \ErrorException("Gagal buat Route file sudah ada....!!! ".PHP_EOL.$path);
        }
    }
}
