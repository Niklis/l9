<?php

namespace App\Http\Livewire;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
// use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use App\Http\Livewire\Columns\NklsActionsColumn;
use App\Http\Livewire\Columns\NklsButtonGroupColumn;
use App\Http\Livewire\Columns\NklsButtonColumn;

class UsersTable extends DataTableComponent
{

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function columns(): array
    {
        return [
            Column::make('id')->hideIf(true),
            Column::make('Name')
                ->sortable()
                ->searchable(),
            Column::make('E-mail', 'email')
                ->sortable()
                ->searchable(),
            Column::make('Created At', 'created_at')->collapseOnTablet()
                ->sortable()
                ->searchable(),
            Column::make('Updated At', 'updated_at')->collapseOnTablet()
                ->sortable()
                ->searchable(),
            NklsButtonGroupColumn::make('Actions')->collapseOnTablet()
                ->attributes(function ($row) {
                    return [
                        'class' => 'd-flex gap-1 align-items-center',
                    ];
                })
                ->buttons([
                    // LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                    //     ->title(fn ($row) => '')
                    //     ->location(fn ($row) => route('user.show', $row))
                    //     ->attributes(function ($row) {
                    //         return [
                    //             'class' => 'btn btn-info btn-sm bi bi-eye',
                    //             'role' => 'button',
                    //         ];
                    //     }),
                    NklsButtonColumn::make('Edit')
                        ->title(fn ($row) => '')
                        // ->location(fn ($row) => route('user.edit', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-warning btn-sm bi bi-pencil-square',
                                'role' => 'button',
                                'onclick' => 'livewire.emitTo(\'user-crud\', \'edit\',' . $row->id . ')',
                            ];
                        }),
                    NklsButtonColumn::make('Delete')
                        ->title(fn ($row) => '')
                        // ->location(fn ($row) => route('user.delete', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-danger btn-sm bi bi-trash3',
                                'role' => 'button',
                                'onclick' => 'confirm(\'Delete item?\') ? livewire.emitTo(\'user-crud\', \'delete\',' . $row->id . ') : false;',
                            ];
                        }),
                    NklsActionsColumn::make('Actions')
                        // ->title(fn ($row) => 'Actions')
                        // ->location(fn ($row) => route('user.show', $row))
                        ->attributes(function ($row) {
                            return [
                                'class' => 'btn btn-info btn-sm',
                                'role' => 'button',
                            ];
                        }),
                ]),
        ];
    }
}
