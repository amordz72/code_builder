<?php

namespace App\Http\Livewire\Code;

use Illuminate\Http\Request;
use Livewire\Component;

class Make extends Component
{
    public function render(Request $request)
    {

        return view('livewire.code.make', ['title' => 'Make'])
            ->extends('layouts.app');

    }
    public $use_a = false;
    public $use_i = false;
    public $use_c = false;
    public $use_e = false;
    public $use_s = false;

    public $step = 0;
    public $name = '';
    public $dir = '';
    public $body = '';
    protected $rules = [

        'name' => 'required|min:2',
    ];
    protected $messages = [
        'name.required' => 'ادخل_الاسم_اولا',
    ];

    public function set_cookie($cookie_name, $cookie_value)
    {

        setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day

    }
    public function set_ch($ch_name)
    {
        if (isset($_COOKIE[$ch_name])) {

            if ($_COOKIE[$ch_name] == '1') {
                $this->ch_name = 1;

            } else {
                $this->ch_name = 0;
            }

        } else {
            $this->set_cookie($ch_name, "0");

        }
    }
    public function mount()
    {

        if (isset($_COOKIE['use_i'])) {

            if ($_COOKIE['use_i'] == '1') {
                $this->use_i = 1;

            } else {
                $this->use_i = 0;
            }

        } else {
            $this->set_cookie("use_i", "0");

        }

        if (isset($_COOKIE['use_c'])) {

            if ($_COOKIE['use_c'] == '1') {
                $this->use_c = 1;

            } else {
                $this->use_c = 0;
            }

        } else {
            $this->set_cookie("use_c", "0");

        }
        if (isset($_COOKIE['use_e'])) {

            if ($_COOKIE['use_e'] == '1') {
                $this->use_e = 1;

            } else {
                $this->use_e = 0;
            }

        } else {
            $this->set_cookie("use_e", "0");

        }
        if (isset($_COOKIE['use_s'])) {

            if ($_COOKIE['use_s'] == '1') {
                $this->use_s = 1;

            } else {
                $this->use_s = 0;
            }

        } else {
            $this->set_cookie("use_s", "0");

        }
        if (isset($_COOKIE['use_a'])) {

            if ($_COOKIE['use_a'] == '1') {
                $this->use_a = 1;

            } else {
                $this->use_a = 0;
            }

        } else {
            $this->set_cookie("use_a", "0");

        }

        if (isset($_COOKIE['name'])) {
            $this->name = $_COOKIE['name'];

        }
        if (isset($_COOKIE['dir'])) {
            $this->dir = $_COOKIE['dir'];

        }
    }
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {

    }
    public function make_livewire_component()
    {
        $dir = '';
        $route_name = '';
        if ($this->dir != '') {
            $dir = $this->dir . '/';
            $route_name = $this->dir . "." . $this->name . ".";
        } else {
            $route_name = $this->name . ".";

        }
        $this->validate();
        if ($this->step == 1) {

            $this->body = "php artisan make:livewire " . $dir . $this->name . "/index\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/create\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/edit\n";
            $this->body .= "php artisan make:livewire " . $dir . $this->name . "/show";

        } else if ($this->step == 2) {

            $this->body = "Route::get('/" . $dir . $this->name . "/index', App\Http\Livewire\\" . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Index::class)->name('" . $route_name . "index');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "/create', App\Http\Livewire\\"
            . ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Create::class)->name('" . $route_name . "create');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "/edit/{id?}', App\Http\Livewire\\" .
            ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Edit::class)->name('" . $route_name . "edit');\n";
            $this->body .= "Route::get('/" . $dir . $this->name . "/show/{id?}', App\Http\Livewire\\" .
            ucfirst(str_replace('/', '\\', $dir)) . ucfirst($this->name) . "\Show::class)->name('" . $route_name . "show');\n";

        } else if ($this->step == 3) {
/*
if ($this->use_i) {
$this->body ='';
} elseif ($this->use_c) {
$this->body ='';
}
} elseif ($this->use_e) {

$this->body ='';
} elseif ($this->use_s) {
$this->body ='';

} elseif ($this->use_a) {
$this->body ='';
}*/

            $this->body =
            '

          //Index Render method
            return view(\'livewire.' . $route_name . 'index' . '\', [\'title\' => \'All ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');



          //Create Render method
            return view(\'livewire.' . $route_name . 'create' . '\', [\'title\' => \'Create ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');



          //Edit Render method
            return view(\'livewire.' . $route_name . 'edit' . '\', [\'title\' => \'Edit ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');



          //Show Render method
            return view(\'livewire.' . $route_name . 'show' . '\', [\'title\' => \'Show ' . ucfirst($this->name) . '\'])
           ->extends(\'layouts.app\');




            ';

        } else if ($this->step == 4) {

            $this->body = '

            {{--   Index Link--}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'index' . '\') }}">{{ __(\'All ' . ucfirst($this->name) . '\') }}</a>
            </li>

            {{--  Create Link--}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'create' . '\') }}">{{ __(\'Create ' . ucfirst($this->name) . '\') }}</a>
            </li>

            {{--  Edit Link--}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'edit' . '\') }}">{{ __(\'Edit ' . ucfirst($this->name) . '\') }}</a>
            </li>


            {{--Show Link  --}}
            <li class="nav-item">
             <a class="nav-link" href="{{ route(\'' . $route_name . 'show' . '\') }}">{{ __(\'Show ' . ucfirst($this->name) . '\') }}</a>
            </li>


            {{--  All links--}}

            <!--start dropdown links ' . ucfirst($this->name) . ' -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                ' . ucfirst($this->name) . '
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'index\') }}">' . ucfirst($this->name) . ' All' . '</a></li>
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'create\') }}">' . ucfirst($this->name) . ' Create' . '</a></li>
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'edit\') }}">' . ucfirst($this->name) . ' Edit' . '</a></li>
                <li><a class="dropdown-item" href="{{ route(\'' . $route_name . 'show\') }}">' . ucfirst($this->name) . ' Show' . '</a></li>
                <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
                </li>
                <!--end dropdown links ' . ucfirst($this->name) . ' -->
            ';

        }

    }
}
