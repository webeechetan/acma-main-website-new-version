<?php

namespace App\DataTables;

use App\Models\Circuler;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Carbon\Carbon;

class CirculersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id')
            ->editColumn('circuler_date', function($circuler){
                return Carbon::parse($circuler->circuler_date)->format('d-m-Y');
            })->addColumn('action', 
                function($circuler){
                    $html = '<a href="'.route('circulers.edit', $circuler->id).'" class="btn btn-primary btn-sm">Edit</a>'; 
                    $delete_form = '<form class="confirm-delete" action="'.route('circulers.destroy', $circuler->id).'" method="post" style="display:inline-block;">';
                    $delete_form .= csrf_field();
                    $delete_form .= method_field('DELETE');
                    $delete_form .= '<button type="submit" class="btn btn-danger btn-sm" >Delete</button>';
                    $delete_form .= '</form>';
                    $html .= ' '.$delete_form;
                    return $html;
                }
            )->addColumn('category_id', function($circuler){
                return $circuler->category->name;
            })->addColumn('keywords', function($circuler){
                $html = '';
                foreach($circuler->keywords as $keyword){
                    $html .= '<span class="badge bg-label-primary">'.$keyword.'</span> ';
                }
                return $html;
            })->rawColumns(['action', 'keywords']);
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Circuler $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('circulers-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('id'),
            Column::make('circuler_no'),
            Column::make('title'),
            Column::make('circuler_date'),
            Column::make('category_id'),
            Column::make('keywords'),
            Column::make('action')
                  
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Circulers_' . date('YmdHis');
    }
}
