<?php

namespace App\DataTables;

use App\Models\Resturant;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RestDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
        ->eloquent($query)
            ->addColumn('action', function ($data) {
            if (Auth()->user()->can('resturant-edit')) {
                return
                    '<a href="view-rest/' . $data->id . '" class="btn btn-outline-success"><i class="icon-fixed-width icon-eye"></i></a>
                    <a href="edit-rest/' . $data->id . '" class="btn btn-outline-info"><i class="icon-fixed-width icon-pencil"></i></a>
                    <button type="button" id="delete" data-id= "' . $data->id . '"class="btn btn-outline-danger btn-link"><i class="icon-fixed-width icon-trash"></i></button>';
            }
            })
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('storage/images/' . $data->image) . '"    class="img-thumbnail"  width="70px" height="70px"></img>';
            })
            ->editColumn('video', function ($data) {
                return '<video  src="' . asset('storage/Videos/' . $data->video) . '" width="100" height="100" controls></video>';
            })
            ->editColumn('thumbnail', function ($data) {
                return "<img src='" . asset('storage/Videos/' . $data->thumbnail) . "' data-video='" . asset('storage/Videos/' . $data->video) . "'  class='rounded showVideo' width=100px height=100px/>";
            })
            ->editColumn('category_id', function ($data) {
                return $data->category->category_name;
            })
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Active</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn-danger">Inactive</a>';
                }
            })
            ->filterColumn('category_id', function ($data, $keyword) {
                $sql = "categories.category_name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['action', 'image', 'category_id', 'status', 'video', 'thumbnail'])
            ->addIndexColumn();
    }

  
    public function query(Resturant $model)
    {
        $model = $model->leftjoin('categories', 'categories.id', '=', 'resturants.category_id')
            ->select('resturants.*', 'categories.category_name')
            ->newQuery();
        return $model->with('category')->newQuery();
    }

   
    public function html()
    {
        return $this->builder()
            ->setTableId('rest-table')
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
            Column::make('name'),
            Column::make('address'),
            Column::make('email'),
            Column::make('category_id')->title('Category'),
            Column::make('image'),
            Column::make('video'),
            Column::make('thumbnail')->title('Video Of Resturant'),
            Column::make('Contact'),
            Column::make('status'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    protected function filename()
    {
        return 'Rest_' . date('YmdHis');
    }
}
