<?php

namespace App\DataTables;

use App\Models\category;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;
// Auto DataTable By Baboon Script
// Baboon Maker has been Created And Developed By [it v 1.6.40]
// Copyright Reserved [it v 1.6.40]
class categoriesDataTable extends DataTable
{


    /**
     * dataTable to render Columns.
     * Auto Ajax Method By Baboon Script [it v 1.6.40]
     * @return \Illuminate\Http\JsonResponse
     */
    public function dataTable(DataTables $dataTables, $query)
    {
        return datatables($query)
            ->addColumn('actions', 'admin.categories.buttons.actions')

            ->addColumn('image', '{!! view("admin.show_image",["image"=>$image])->render() !!}')
            ->rawColumns(['checkbox', 'actions', "image",]);
    }


    /**
     * Get the query object to be processed by dataTables.
     * Auto Ajax Method By Baboon Script [it v 1.6.40]
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Query\Builder|\Illuminate\Support\Collection
     */
    public function query()
    {
        return category::query()->select("categories.*")->with('parent');
    }


    /**
     * Optional method if you want to use html builder.
     *[it v 1.6.40]
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        $html =  $this->builder()
            ->columns($this->getColumns())
            //->ajax('')
            ->parameters([
                'searching'   => true,
                'paging'   => true,
                'bLengthChange'   => true,
                'bInfo'   => true,
                'responsive'   => true,
                'dom' => 'Blfrtip',
                "lengthMenu" => [[10, 25, 50, 100, -1], [10, 25, 50, 100, trans('admin.all_records')]],
                'buttons' => [
                    [
                        'extend' => 'reload',
                        'className' => 'btn btn-outline',
                        'text' => '<i class="fa fa-sync-alt"></i> ' . trans('admin.reload')
                    ],[
                        'text' => '<i class="fa fa-plus"></i> ' . trans('admin.add'),
                        'className'    => 'btn btn-primary',
                        'action'    => 'function(){
                        	window.location.href =  "' . \URL::current() . '/create";
                        }',
                    ],
                ],
                'initComplete' => "function () {
                    " . filterElement('1,2', 'input') . "
	            }",
                'order' => [[1, 'desc']],

                'language' => [
                    'sProcessing' => trans('admin.sProcessing'),
                    'sLengthMenu'        => trans('admin.sLengthMenu'),
                    'sZeroRecords'       => trans('admin.sZeroRecords'),
                    'sEmptyTable'        => trans('admin.sEmptyTable'),
                    'sInfo'              => trans('admin.sInfo'),
                    'sInfoEmpty'         => trans('admin.sInfoEmpty'),
                    'sInfoFiltered'      => trans('admin.sInfoFiltered'),
                    'sInfoPostFix'       => trans('admin.sInfoPostFix'),
                    'sSearch'            => trans('admin.sSearch'),
                    'sUrl'               => trans('admin.sUrl'),
                    'sInfoThousands'     => trans('admin.sInfoThousands'),
                    'sLoadingRecords'    => trans('admin.sLoadingRecords'),
                    'oPaginate'          => [
                        'sFirst'            => trans('admin.sFirst'),
                        'sLast'             => trans('admin.sLast'),
                        'sNext'             => trans('admin.sNext'),
                        'sPrevious'         => trans('admin.sPrevious'),
                    ],
                    'oAria'            => [
                        'sSortAscending'  => trans('admin.sSortAscending'),
                        'sSortDescending' => trans('admin.sSortDescending'),
                    ],
                ]
            ]);

        return $html;
    }



    /**
     * Get columns.
     * Auto getColumns Method By Baboon Script [it v 1.6.40]
     * @return array
     */

    protected function getColumns()
    {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => trans('admin.record_id'),
                'width'          => '10px',
                'aaSorting'      => 'none'
            ],
            [
                'name' => 'name',
                'data' => 'name',
                'title' => trans('admin.name'),
            ],
            [
                'name' => 'parent_id',
                'data' => 'parent.name',
                'title' => trans('admin.parent_id'),
            ],
            [
                'name' => 'image',
                'data' => 'image',
                'title' => trans('admin.image'),
            ],
            [
                'name' => 'actions',
                'data' => 'actions',
                'title' => trans('admin.actions'),
                'exportable' => false,
                'printable'  => false,
                'searchable' => false,
                'orderable'  => false,
            ],
        ];
    }

    /**
     * Get filename for export.
     * Auto filename Method By Baboon Script
     * @return string
     */
    protected function filename()
    {
        return 'categories_' . time();
    }
}
