<?php

namespace App\Traits;
use Illuminate\Support\Str;

trait ViewTrait
{
    public function list_all_folder($dir,&$new_json = [])
    {

        $ffs = scandir($dir);
        foreach ($ffs as $i => $ff) {
            if ($ff != '.' && $ff != '..')  {
                $new_dir = $dir.'/'.$ff;
                if(is_dir($new_dir))
                {
                    if(Str::after($new_dir, 'resources/views'))
                    {
                        $new_json[] = [
                                    Str::after($new_dir, 'resources/views/'),
                                    $dir.'/'.$new_dir,
                        ];
                    }
                    $this->list_all_folder($new_dir,$new_json);
                }
            }
        }
        return $new_json;
    }
    protected function getStub()
    {
        return  base_path() . '/stubs/view-template.stub';
    }
    protected function stub_to_php($data)
    {
        $content = file_get_contents($this->getStub());
        $content = str_replace('{{ name }}', $data['view'], $content);
        $file_path = base_path().'/resources/views/'.$data['folder'].'/'.$data['view'].'.blade.php';
        $folder_path = base_path().'/resources/views/'.$data['folder'];
        $this->cek_file($file_path);
        // create folder
        if (!is_dir($folder_path)) {
            // dir doesn't exist, make it
            mkdir($folder_path);
        }
        file_put_contents($file_path,$content);
        $res = '';
        if($data['folder'] != '/')
        {
            $res = preg_replace('/[^a-zA-Z0-9_ -]/s','.',$data['folder']).'.';
        }
        return "view('".$res.$data['view']."');";
    }
    protected function cek_file($path)
    {
        if(file_exists($path))
        {
            throw new \ErrorException("File sudah ada canot create {$path}.");
        }
    }
}
