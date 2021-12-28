<?php

namespace App\Http\Livewire\Code\Project;

use App\Models\Project;
use Livewire\Component;

class Create extends Component
{
    public $all = array();
    public $index = 0;
    public $name = '';
    public $db_name = '';
    public $db_type = 'mysql';
    public $path = 'laravel/';
    public $url = '';
    public $env = '';
    public $is_new = true;
    public $hiddenId = 0;
    public function render()
    {
        $this->all = Project::all();

        return view('livewire.code.project.create')
            ->extends('layouts.app', ['title' => 'Create Project']);
    }
    public function store()
    {
        Project::create([
            "name" => $this->name,
            "db_name" => $this->db_name,
            "model_name" => $this->db_type,
            "db_type" => $this->db_type,
            "path" => $this->path,
            "url" => $this->url,
            "env" => $this->env,
        ]);
        $this->clear();
    }
    public function update($id)
    {

        $this->hiddenId = $id;
        $p = Project::find($this->hiddenId);

        $p->name = $this->name;
        $p->db_type = $this->db_type;
        $p->db_name = $this->db_name;
        $p->path = $this->path;
        $p->url = $this->url;
        $p->env = $this->env;

        $p->save();
        $this->clear();
    }
    public function destroy($id)
    {
        $this->hiddenId = $id;
        Project::find($this->hiddenId)->delete();
        $this->clear();
    }
    public function clear()
    {
        $this->hiddenId = 0;
        $this->is_new = true;

        $this->name = '';
        $this->db_name = '';
        $this->db_type = 'mysql';
        $this->path = 'laravel/';
        $this->url = '';
        $this->env = '';

    }
    public function prev()
    {
        if ($this->index > 0) {
            $this->index = $this->index - 1;

        }
        $this->hiddenId = $this->all[$this->index]->id;
        $this->name = $this->all[$this->index]->name;
        $this->db_name = $this->all[$this->index]->name;
        $this->db_type = $this->all[$this->index]->name;
        $this->url = $this->all[$this->index]->url;
        $this->path = $this->all[$this->index]->path;
        $this->env = $this->all[$this->index]->env;

        $this->is_new = false;

    }
    public function next()
    {
        if ($this->index < count($this->all) - 1) {
            $this->index = $this->index + 1;

        }
        $this->hiddenId = $this->all[$this->index]->id;
        $this->name = $this->all[$this->index]->name;
        $this->db_name = $this->all[$this->index]->name;
        $this->db_type = $this->all[$this->index]->name;
        $this->url = $this->all[$this->index]->url;
        $this->path = $this->all[$this->index]->path;
        $this->env = $this->all[$this->index]->env;

        $this->is_new = false;
    }
    public function set_env()
    {

        if ($this->db_name == '') {
            $this->db_name = str_replace('-', '_', $this->name);
        }
        if ($this->url == '') {

        }

        $this->url = 'http://localhost/laravel/' . $this->name . '/public';
        $this->env = $str = <<<EOT
         APP_NAME=$this->name
         APP_ENV=local
         APP_KEY=base64:MRZw94Y39VTlv7E1swob653U7pGY9KajxQuuBSGrsvA=
         APP_DEBUG=true
         APP_URL=$this->url


         LOG_CHANNEL=stack
         LOG_DEPRECATIONS_CHANNEL=null
         LOG_LEVEL=debug

         DB_CONNECTION=$this->db_type
         DB_HOST=127.0.0.1
         DB_PORT=3306
         DB_DATABASE=$this->db_name
         DB_USERNAME=root
         DB_PASSWORD=

         BROADCAST_DRIVER=log
         CACHE_DRIVER=file
         FILESYSTEM_DRIVER=local
         QUEUE_CONNECTION=sync
         SESSION_DRIVER=file
         SESSION_LIFETIME=120

         MEMCACHED_HOST=127.0.0.1

         REDIS_HOST=127.0.0.1
         REDIS_PASSWORD=null
         REDIS_PORT=6379

         MAIL_MAILER=smtp
         MAIL_HOST=mailhog
         MAIL_PORT=1025
         MAIL_USERNAME=null
         MAIL_PASSWORD=null
         MAIL_ENCRYPTION=null
         MAIL_FROM_ADDRESS=null
         MAIL_FROM_NAME="\${APP_NAME}"

         AWS_ACCESS_KEY_ID=
         AWS_SECRET_ACCESS_KEY=
         AWS_DEFAULT_REGION=us-east-1
         AWS_BUCKET=
         AWS_USE_PATH_STYLE_ENDPOINT=false

         PUSHER_APP_ID=
         PUSHER_APP_KEY=
         PUSHER_APP_SECRET=
         PUSHER_APP_CLUSTER=mt1

         MIX_PUSHER_APP_KEY="\${PUSHER_APP_KEY}"
         MIX_PUSHER_APP_CLUSTER="\${PUSHER_APP_CLUSTER}"


        EOT;
    }
    public function updated()
    {

    }

}
