<?php

namespace App\Http\Livewire\Tables;

use App\Models\Province;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class AreaProvinceTable extends PowerGridComponent
{
    use ActionButton;

    /*
    |--------------------------------------------------------------------------
    |  Features Setup
    |--------------------------------------------------------------------------
    | Setup Table's general features
    |
    */
    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    |  Datasource
    |--------------------------------------------------------------------------
    | Provides data to your Table using a Model or Collection
    |
    */

    /**
     * PowerGrid datasource.
     *
     * @return Builder<\App\Models\Province>
     */
    public function datasource(): Builder
    {
        return Province::query();
    }

    /*
    |--------------------------------------------------------------------------
    |  Relationship Search
    |--------------------------------------------------------------------------
    | Configure here relationships to be used by the Search and Table Filters.
    |
    */

    /**
     * Relationship search.
     *
     * @return array<string, array<int, string>>
     */
    public function relationSearch(): array
    {
        return [];
    }

    /*
    |--------------------------------------------------------------------------
    |  Add Column
    |--------------------------------------------------------------------------
    | Make Datasource fields available to be used as columns.
    | You can pass a closure to transform/modify the data.
    |
    | ❗ IMPORTANT: When using closures, you must escape any value coming from
    |    the database using the `e()` Laravel Helper function.
    |
    */
    public function addColumns(): PowerGridEloquent
    {
        return PowerGrid::eloquent()
            ->addColumn('id')
            ->addColumn('code')
            ->addColumn('name')
            ->addColumn('name_lower', fn (Province $model) => strtolower(e($model->name)));
    }

    /*
    |--------------------------------------------------------------------------
    |  Include Columns
    |--------------------------------------------------------------------------
    | Include the columns added columns, making them visible on the Table.
    | Each column can be configured with properties, filters, actions...
    |
    */

    /**
     * PowerGrid Columns.
     *
     * @return array<int, Column>
     */
    public function columns(): array
    {
        return [
            Column::make('Kode Wilayah', 'code')
                ->searchable()
                ->sortable(),

            Column::make('Provinsi', 'name')
                ->searchable()
                ->sortable(),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Method
    |--------------------------------------------------------------------------
    | Enable the method below only if the Routes below are defined in your app.
    |
    */

    /**
     * PowerGrid Province Action Buttons.
     *
     * @return array<int, Button>
     */


    public function actions(): array
    {
        return [
            Button::make('detail', 'Lihat Kab. / Kota')
                ->class('bg-gray-200 hover:bg-gray-500 hover:text-white cursor-pointer text-dark px-3 py-2.5 m-1 rounded text-sm transition')
                ->route('area.regency', ['province' => 'id'])
                ->target('_self'),

            Button::make('view', 'Lihat')
                ->class('bg-gray-200 hover:bg-gray-500 hover:text-white cursor-pointer text-dark px-3 py-2.5 m-1 rounded text-sm transition')
                ->route('dashboard.area', ['provinceId' => 'id'])
                ->target('_self'),

            Button::make('edit', 'Edit')
                ->class('bg-green-500 hover:bg-green-700 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm transition')
                ->openModal('modals.edit-area-province-modal', []),

            Button::make('destroy', 'Hapus')
                ->class('bg-red-500 hover:bg-red-700 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm transition')
                ->openModal('modals.delete-area-province-modal', []),
        ];
    }

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Province Action Rules.
     *
     * @return array<int, RuleActions>
     */

    public function actionRules(): array
    {
        return [
            Rule::button('detail')
                ->when(fn () => !empty(auth()->user()))
                ->hide(),

            Rule::button('view')
                ->when(fn () => empty(auth()->user()))
                ->hide(),

            Rule::button('edit')
                ->when(fn () => empty(auth()->user()))
                ->hide(),

            Rule::button('destroy')
                ->when(fn () => empty(auth()->user()))
                ->hide(),
        ];
    }
}
