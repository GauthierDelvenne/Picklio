<?php

namespace App\Traits;

use App\Helpers\UserConnected;
//use App\Models\Lang;
use ReflectionClass;

trait SortingTrait
{
    public $sortBy = 'name';

    public $sortDirection = 'asc';

    public function sort(string $field): void
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }
}
