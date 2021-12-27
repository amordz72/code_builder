<?php
namespace App\Http\Livewire\Backup;

use Artisan;
use Livewire\Component;
use Storage;
use Auth;
class Index extends Component
{


    public function __construct()
    {
        // Auth::user() ->role('super-admin');
       // $this->middleware(['permission:super_admin']);

        // $this->middleware(['role:super-admin','permission:publish articles|edit articles']);
    }


    protected $listeners = ['bk_onlyDb' => '$refresh', 'create' => '$refresh'];

    public $files = array();
    public $index = 0;

    public function render()
    {

        return view('livewire.backup.index')->extends('layouts.app');
    }

    public function create()
    {

        Artisan::call('backup:run --disable-notifications');
        $output = Artisan::output();

        return redirect(Route('backups'));

    }
    public function bk_onlyDb()
    {
      
        try {

            Artisan::call('backup:run --only-db');
            $output = Artisan::output();

            return redirect(Route('backups'));
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect(Route('backups'));
        }
    }
    public function bk_onlyFiles()
    {

        try {

            Artisan::call('backup:run --only-files');
            $output = Artisan::output();

            return redirect(Route('backups'));
        } catch (Exception $e) {
            Flash::error($e->getMessage());
            return redirect()->back();
        }
    }

    public function loadDbFiles()
    {
        try {
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            $dir = $storagePath . '\\' . env('APP_NAME');

            if (is_dir($dir)) {
                if ($dh = opendir($dir)) {
                    while (($file = readdir($dh)) !== false) {
                        $info = pathinfo($file);

                        if ($info["extension"] == "zip") {
                            $file_link = $dir . "\\" . $file;

                            array_push(
                                $this->files,
                                array(
                                    'filename' => $file,
                                    'filemtime' => date("d F Y // H:i:s.", filemtime($file_link)),
                                    'filesize' => $this->formatBytes(filesize($file_link)),
                                    'url' => $dir . "\\" . $file,

                                )
                            );
                        }
                        $this->index++;
                    }
                }
            }
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
    public function mount()
    {

        $this->loadDbFiles();
    }
    public function formatBytes($bytes, $precision = 2)
    {
        if ($bytes > pow(1024, 3)) {
            return round($bytes / pow(1024, 3), $precision) . " / GB";
        } else if ($bytes > pow(1024, 2)) {
            return round($bytes / pow(1024, 2), $precision) . " / MB";
        } else if ($bytes > 1024) {
            return round($bytes / 1024, $precision) . " / KB";
        } else {
            return ($bytes) . "/B";
        }

    }
    public function clear_config_cache()
    {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        return redirect()->route('backups')->with('info', 'clear config cache successfully!');
    }
}
