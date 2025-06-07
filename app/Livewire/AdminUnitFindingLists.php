<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\StartFinding;
use Livewire\WithPagination;

class AdminUnitFindingLists extends Component
{
    use WithPagination;
    
    public $startFindingPerPage = 5;
    public $unitId;
    public $siteId;

    public function mount($unit_id = null, $site_id = null)
    {
        $this->unitId = $unit_id ?? request('unit_id');
        $this->siteId = $site_id ?? request('site_id');
    }

    public function render()
    {
        $query = StartFinding::query();
        
        if ($this->unitId) {
            $query->where('find_unit_id', $this->unitId);
        }
        
        if ($this->siteId) {
            $query->where('find_site_id', $this->siteId);
        }
        
        $startfinding = $query->orderBy('ordering', 'asc')
            ->paginate($this->startFindingPerPage, ['*'], 'startFindingPage');
            
        return view('livewire.admin-unit-finding-lists', [
            'startfinding' => $startfinding
        ]);
    }
}