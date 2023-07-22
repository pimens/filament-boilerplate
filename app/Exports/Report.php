<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class Report implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $view;
    public $data;

    public function __construct($view, $data = "")
    {
        $this->view = $view;
        $this->data = $data;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $export = $this->data;

        return view($this->view, $export);
    }
}
