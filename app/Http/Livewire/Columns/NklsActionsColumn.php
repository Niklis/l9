<?php

namespace App\Http\Livewire\Columns;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Exceptions\DataTableConfigurationException;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\LinkColumnConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\LinkColumnHelpers;

class NklsActionsColumn extends Column
{
    use LinkColumnHelpers,
        LinkColumnConfiguration;

    protected string $view = 'livewire-tables::includes.columns.nkls-actions';
    protected $titleCallback;
    protected $locationCallback;
    protected $attributesCallback;

    public function __construct(string $title, string $from = null)
    {
        parent::__construct($title, $from);

        $this->label(fn () => null);
    }

    public function getContents(Model $row)
    {
        return view($this->getView())
            ->withColumn($this)
            ->withRow($row)
            ->withAttributes($this->hasAttributesCallback() ? app()->call($this->getAttributesCallback(), ['row' => $row]) : []);
    }
}
