<?php

namespace App\Http\Livewire\Columns;

use Illuminate\Database\Eloquent\Model;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Traits\Configuration\ButtonGroupColumnConfiguration;
use Rappasoft\LaravelLivewireTables\Views\Traits\Helpers\ButtonGroupColumnHelpers;

class NklsButtonGroupColumn extends Column
{
    use ButtonGroupColumnConfiguration,
        ButtonGroupColumnHelpers;

    protected array $buttons = [];
    protected string $view = 'livewire-tables::includes.columns.nkls-button-group';
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
            ->withButtons($this->getButtons())
            ->withAttributes($this->hasAttributesCallback() ? app()->call($this->getAttributesCallback(), ['row' => $row]) : []);
    }

    public function getButtons(): array
    {
        return collect($this->buttons)
        //     ->reject(fn ($button) => !$button instanceof LinkColumn)
            ->toArray();
    }
}
