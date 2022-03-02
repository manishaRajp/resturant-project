<?php

namespace App\DataTables;

use App\Models\DiscountCoupon;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DiscountCouponDataTable extends DataTable
{
    
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return
                     '<a href="view-discount/' . $data->id . '" class="btn btn-outline-success"><i class="icon-fixed-width icon-eye"></i></a>
                        <a href="edit-discount/' . $data->id . '" class="btn btn-outline-info"><i class="icon-fixed-width icon-pencil"></i></a>    
                        <a href="delete-discount/' . $data->id . '" class="btn btn-outline-danger"><i class="icon-fixed-width icon-trash"></i></a>';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Active</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn-danger">Inactive</a>';
                }
            })
            ->rawColumns(['action','status'])
            ->addIndexColumn();
    }
    
  
    public function query(DiscountCoupon $model)
    {
        return $model->newQuery();
    }

   
    public function html()
    {
        return $this->builder()
                    ->setTableId('discountcoupon-table')
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
            Column::make('promo_code'),
            Column::make('discount'),
            Column::make('details'),
            Column::make('start_date'),
            Column::make('end_date'),
            Column::make('max_transaction'),
            Column::make('min_transaction'),
            Column::make('time_of_applicable'),
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
        return 'DiscountCoupon_' . date('YmdHis');
    }
}
