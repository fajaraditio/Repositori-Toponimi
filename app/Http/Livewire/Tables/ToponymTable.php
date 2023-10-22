<?php

namespace App\Http\Livewire\Tables;

use App\Models\Toponym;
use Illuminate\Support\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use PowerComponents\LivewirePowerGrid\Rules\{Rule, RuleActions};
use PowerComponents\LivewirePowerGrid\Traits\ActionButton;
use PowerComponents\LivewirePowerGrid\{Button, Column, Exportable, Footer, Header, PowerGrid, PowerGridComponent, PowerGridEloquent};

final class ToponymTable extends PowerGridComponent
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
     * @return Builder<\App\Models\Toponym>
     */
    public function datasource(): Builder
    {
        return Toponym::query()
            ->join('area_villages', 'toponyms.village_id', '=', 'area_villages.id')
            ->join('area_districts', 'area_villages.district_id', '=', 'area_districts.id')
            ->join('area_regencies', 'area_districts.regency_id', '=', 'area_regencies.id')
            ->join('area_provinces', 'area_regencies.province_id', '=', 'area_provinces.id')
            ->select(
                'toponyms.*',
                DB::raw('area_villages.name AS village_name'),
                DB::raw('area_districts.name AS district_name'),
                DB::raw('area_regencies.name AS regency_name'),
                DB::raw('area_provinces.name AS province_name')
            );
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
            ->addColumn('meaning', fn (Toponym $model) => $model->meaning ? '<span class="text-green-700">V</span>' : '<span class="text-red-700">X</span>')
            ->addColumn('history', fn (Toponym $model) => $model->history ? '<span class="text-green-700">V</span>' : '<span class="text-red-700">X</span>')
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

            Column::make('Nama Tempat', 'name')
                ->searchable()
                ->sortable(),

            Column::make('Bentuk Kata', 'word_form')
                ->searchable()
                ->sortable(),

            Column::make('Makna Kata', 'meaning')
                ->bodyAttribute('text-center font-bold')
                ->searchable()
                ->sortable(),

            Column::make('Sejarah Kata', 'history')
                ->bodyAttribute('text-center font-bold')
                ->searchable()
                ->sortable(),

            Column::make('Kelurahan / Desa', 'village_name')
                ->searchable()
                ->sortable(),

            Column::make('Kecamatan', 'district_name')
                ->searchable()
                ->sortable(),

            Column::make('Kab. / Kota', 'regency_name')
                ->searchable()
                ->sortable(),

            Column::make('Provinsi', 'province_name')
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
     * PowerGrid Toponym Action Buttons.
     *
     * @return array<int, Button>
     */

    public function actions(): array
    {
        return [
            Button::make('detail', 'Detail Toponimi')
                ->class('bg-indigo-200 hover:bg-indigo-500 hover:text-white cursor-pointer text-dark px-3 py-2.5 m-1 rounded text-sm transition')
                ->route('toponym.view', ['toponym' => 'id'])
                ->target('_self'),

            Button::make('view', 'Lihat')
                ->class('bg-gray-200 hover:bg-gray-500 hover:text-white cursor-pointer text-dark px-3 py-2.5 m-1 rounded text-sm transition')
                ->route('dashboard.toponym.view', ['toponym' => 'id'])
                ->target('_self'),

            Button::make('edit', 'Edit')
                ->class('bg-green-500 hover:bg-green-700 cursor-pointer text-white px-3 py-2.5 m-1 rounded text-sm transition')
                ->openModal('modals.edit-area-regency-modal', []),

            Button::make('destroy', 'Hapus')
                ->class('bg-red-500 hover:bg-red-700 cursor-pointer text-white px-3 py-2 m-1 rounded text-sm transition')
                ->openModal('modals.delete-area-regency-modal', []),
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
     * PowerGrid Toponym Action Rules.
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
