<?php

namespace App\Http\Livewire\Toponym;

use App\Models\Toponym;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class Table extends PowerGridComponent
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
            Exportable::make('export')
                ->striped()
                ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function header(): array
    {
        return [
            Button::add('create')
                ->caption(__('Create New'))
                ->class('block w-full bg-red-500 text-white border border-slate-200 rounded py-2 px-3 leading-tight hover:bg-red-600 focus:outline-none focus:bg-white focus:border-red-500 focus:text-red-500 dark:border-slate-500 dark:bg-slate-600 2xl:dark:placeholder-slate-300 dark:text-slate-200 dark:text-slate-300 sm:text-sm')
                ->route('toponym.create', [])
                ->target('_self'),
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
     * @return Builder<\App\Models\Toponym>
     */
    public function datasource(): Builder
    {
        return Toponym::query()
            ->select([
                'toponyms.*',
                DB::raw('CONCAT(primary_latitude, ", ", primary_longitude) primary_coordinate'),
                DB::raw('CONCAT(secondary_latitude, ", ", secondary_longitude) secondary_coordinate'),
            ]);
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
            ->addColumn('name')
            ->addColumn('name_lower', fn (Toponym $model) => strtolower(e($model->name)))
            ->addColumn('created_at')
            ->addColumn('created_at_formatted', fn (Toponym $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'));
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
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),

            Column::make(__('Map Number'), 'map_number')
                ->hidden(),

            Column::make(__('Gazetter Name'), 'name')
                ->searchable()
                ->sortable(),

            Column::make(__('Alias'), 'alias')
                ->searchable()
                ->sortable(),

            Column::make(__('Primary Coordinate'), 'primary_coordinate'),

            Column::make(__('Secondary Coordinate'), 'secondary_coordinate'),

            Column::make(__('Sub District'), 'subdistrict')
                ->searchable()
                ->sortable(),

            Column::make(__('City / Regency'), 'city')
                ->searchable()
                ->sortable(),

            Column::make(__('Province'), 'province')
                ->searchable()
                ->sortable(),

            Column::make(__('Submitted at'), 'created_at')
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
     * PowerGrid Toponym Action Buttons.
     *
     * @return array<int, Button>
     */

    /*
    public function actions(): array
    {
       return [
           Button::make('edit', 'Edit')
               ->class('bg-indigo-500 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm')
               ->route('toponym.edit', ['toponym' => 'id']),

           Button::make('destroy', 'Delete')
               ->class('bg-red-500 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm')
               ->route('toponym.destroy', ['toponym' => 'id'])
               ->method('delete')
        ];
    }
    */

    /*
    |--------------------------------------------------------------------------
    | Actions Rules
    |--------------------------------------------------------------------------
    | Enable the method below to configure Rules for your Table and Action Buttons.
    |
    */

    /**
     * PowerGrid Toponym Action Rules.
     *
     * @return array<int, RuleActions>
     */

    /*
    public function actionRules(): array
    {
       return [

           //Hide button edit for ID 1
            Rule::button('edit')
                ->when(fn($toponym) => $toponym->id === 1)
                ->hide(),
        ];
    }
    */
}
