<?php

namespace App\DataTables;

use App\Models\Payment;
use App\Models\Resturant;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PaymentDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn-danger">Pendding</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Approve</a>';
                }
            })
            ->editColumn('rest_id', function ($data) {
                return $data->RestName->name;
            })
            ->editColumn('user_id', function ($data) {
                return $data->user->name;
            })
            ->rawColumns(['status', 'rest_id', 'user_id'])
            ->addIndexColumn();
    }
    public function query(Payment $model)
    {
        return $model->with('RestName')->newQuery();
    }
    public function html()
    {
        return $this->builder()
            ->setTableId('payment-table')
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
            Column::make('order_id')->title('Order No.'),
            Column::make('user_id')->title('User Name'),
            Column::make('rest_id')->title('Rasturant Name'),
            Column::make('total_amount')->title('Total Payment'),
            Column::make('status')->title('Total Payment'),
        ];
    }
    protected function filename()
    {
        return 'Payment_' . date('YmdHis');
    }
}
