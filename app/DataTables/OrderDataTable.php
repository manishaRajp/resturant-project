<?php

namespace App\DataTables;

use App\Models\Order;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class OrderDataTable extends DataTable
{
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($data) {
                return
                    '<a href="order-show/' . $data->id . '" class="btn btn-outline-success"><i class="icon-fixed-width icon-eye"></i></a>
                    <a href="delete-order/' . $data->id . '" class="btn btn-outline-danger"><i class="icon-fixed-width icon-trash"></i></a>';
            })
            ->editColumn('status', function ($data) {
                if ($data->status == '1') {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn-danger">Pendding</a>';
                } else {
                    return '<a data-id="' . $data->id . '" id="status" class="btn-sm btn btn-outline-success">Approve</a>';
                }
            })
            ->editColumn('rest_id', function ($data) {
                return $data->Rest->name;
            })
            ->editColumn('user_id', function ($data) {
                return $data->user->name;
            })
            
            ->filterColumn('rest_id', function ($data, $keyword) {
                $sql = "resturants.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->filterColumn('user_id', function ($data, $keyword) {
                $sql = "users.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            
            ->rawColumns(['action', 'rest_id', 'user_id',  'status'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Order $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Order $model)
    {
        $model = $model
        ->join('resturants', 'resturants.id', '=', 'orders.rest_id')
        ->join('users', 'users.id', '=', 'orders.user_id')

        ->select('orders.*', 'resturants.name','users.name')
        ->newQuery();
        return $model->with(['user','rest'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('order-table')
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
            Column::make('order_id')->title('Order no.'),
            Column::make('rest_id')->title('Resturant'),
            Column::make('user_id')->title('User_name'),
          
            Column::make('total')->title('Total Amount'),
            Column::make('status'),
            Column::make('discount'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Order_' . date('YmdHis');
    }
}
