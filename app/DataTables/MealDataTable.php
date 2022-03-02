<?php

namespace App\DataTables;

use App\Models\RestaurantAddMeal;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class MealDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                if(Auth()->user()->can('meal-edit')) {
                return
                    '<a href="view-meal/' . $data->id . '" class="btn btn-outline-success"><i class="icon-fixed-width icon-eye"></i></a>
                        <a href="edit-meal/' . $data->id . '" class="btn btn-outline-info"><i class="icon-fixed-width icon-pencil"></i></a>    
                      <button type="button" id="delete" data-id= "' . $data->id . '"class="btn btn-outline-danger btn-link"><i class="icon-fixed-width icon-trash"></i></button>';
            }
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('storage/Food/' . $data->image) . '" class="img-thumbnail" width="50%"></img>';
            })
            ->editColumn('meal_id', function ($data) {
                return $data->meal->meal_cat_name;
            })
            ->editColumn('rest_id', function ($data) {
                return $data->rest->name;
            })
            ->editColumn('stock', function ($data) {
                if ($data->stock == '1') {
                    return '<a data-id="' . $data->id . '" id="stock" class="btn-sm btn btn-outline-success">Available in Stock</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="stock" class="btn-sm btn btn-outline-danger">Out Of Stock</a>';
                }
            })
            ->filterColumn('meal_id', function ($data, $keyword) {
                $sql = "meals.meal_cat_name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('rest_id', function ($data, $keyword) {
                $sql = "resturants.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'image', 'meal_id', 'stock', 'rest_id'])
            ->addIndexColumn();
    }

    public function query(RestaurantAddMeal $model)
    {
        $model = $model
            ->join('meals', 'meals.id', '=', 'restaurant_add_meals.meal_id')
            ->join('resturants', 'resturants.id', '=', 'restaurant_add_meals.rest_id')
            ->select('restaurant_add_meals.*', 'meals.meal_cat_name','resturants.name')
            ->newQuery();
        return $model->with(['rest', 'meal'])->newQuery();
    }

    public function html()
    {
        return $this->builder()
            ->setTableId('meal-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            );
    }

    protected function getColumns()
    {
        return [
            Column::make('id')->data('DT_RowIndex'),
            Column::make('rest_id')->title('Resturent Name'),
            Column::make('meal_id')->title('Meal Category'),
            Column::make('meal_name'),
            Column::make('sub_name'),
            Column::make('price'),
            Column::make('quantity'),
            Column::make('image'),
            Column::make('stock'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Meal_' . date('YmdHis');
    }
}
