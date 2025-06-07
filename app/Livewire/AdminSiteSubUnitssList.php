<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sites;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;


class AdminSiteSubUnitssList extends Component
{

    use WithPagination;

    public $categoriesPerPage = 5;
    public $subcategoriesPerPage = 3;

    public function render()
    {
        return view(view: 'livewire.admin-site-sub-unitss-list',data: [
            'categories'=>Sites::orderBy(column: 'ordering',direction: 'asc')->paginate(perPage: $this->categoriesPerPage,columns: ['*'],pageName: 'categoriesPage'),
            'subcategories'=>Sites::orderBy(column: 'ordering',direction: 'asc')->paginate(perPage: $this->subcategoriesPerPage,columns: ['*'],pageName: 'subcategoriesPage')
        ]);
    }
}
