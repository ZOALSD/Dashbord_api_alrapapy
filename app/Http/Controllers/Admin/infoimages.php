<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\DataTables\infoimagesDataTable;
use Carbon\Carbon;
use App\Models\infoimage;

use App\Http\Controllers\Validations\infoimagesRequest;
// Auto Controller Maker By Baboon Script
// Baboon Maker has been Created And Developed By  [it v 1.6.40]
// Copyright Reserved  [it v 1.6.40]
class infoimages extends Controller
{

	public function __construct() {

		$this->middleware('AdminRole:infoimages_show', [
			'only' => ['index', 'show'],
		]);
		$this->middleware('AdminRole:infoimages_add', [
			'only' => ['create', 'store'],
		]);
		$this->middleware('AdminRole:infoimages_edit', [
			'only' => ['edit', 'update'],
		]);
		$this->middleware('AdminRole:infoimages_delete', [
			'only' => ['destroy', 'multi_delete'],
		]);
	}

	

            /**
             * Baboon Script By [it v 1.6.40]
             * Display a listing of the resource.
             * @return \Illuminate\Http\Response
             */
            public function index(infoimagesDataTable $infoimages)
            {
               return $infoimages->render('admin.infoimages.index',['title'=>trans('admin.infoimages')]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * Show the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function create()
            {
            	
               return view('admin.infoimages.create',['title'=>trans('admin.create')]);
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * Store a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response Or Redirect
             */
            public function store(infoimagesRequest $request)
            {
                $data = $request->except("_token", "_method");
            	$data['image'] = "";
		  		$infoimages = infoimage::create($data); 
               if(request()->hasFile('image')){
              $infoimages->image = it()->upload('image','infoimages/'.$infoimages->id);
              $infoimages->save();
              }
                $redirect = isset($request["add_back"])?"/create":"";
                return redirectWithSuccess(aurl('infoimages'.$redirect), trans('admin.added')); }

            /**
             * Display the specified resource.
             * Baboon Script By [it v 1.6.40]
             * @param  int  $id
             * @return \Illuminate\Http\Response
             */
            public function show($id)
            {
        		$infoimages =  infoimage::find($id);
        		return is_null($infoimages) || empty($infoimages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("infoimages")) :
        		view('admin.infoimages.show',[
				    'title'=>trans('admin.show'),
					'infoimages'=>$infoimages
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * edit the form for creating a new resource.
             * @return \Illuminate\Http\Response
             */
            public function edit($id)
            {
        		$infoimages =  infoimage::find($id);
        		return is_null($infoimages) || empty($infoimages)?
        		backWithError(trans("admin.undefinedRecord"),aurl("infoimages")) :
        		view('admin.infoimages.edit',[
				  'title'=>trans('admin.edit'),
				  'infoimages'=>$infoimages
        		]);
            }


            /**
             * Baboon Script By [it v 1.6.40]
             * update a newly created resource in storage.
             * @param  \Illuminate\Http\Request  $request
             * @return \Illuminate\Http\Response
             */
            public function updateFillableColumns() {
				$fillableCols = [];
				foreach (array_keys((new infoimagesRequest)->attributes()) as $fillableUpdate) {
					if (!is_null(request($fillableUpdate))) {
						$fillableCols[$fillableUpdate] = request($fillableUpdate);
					}
				}
				return $fillableCols;
			}

            public function update(infoimagesRequest $request,$id)
            {
              // Check Record Exists
              $infoimages =  infoimage::find($id);
              if(is_null($infoimages) || empty($infoimages)){
              	return backWithError(trans("admin.undefinedRecord"),aurl("infoimages"));
              }
              $data = $this->updateFillableColumns(); 
               if(request()->hasFile('image')){
              it()->delete($infoimages->image);
              $data['image'] = it()->upload('image','infoimages');
               } 
              infoimage::where('id',$id)->update($data);
              $redirect = isset($request["save_back"])?"/".$id."/edit":"";
              return redirectWithSuccess(aurl('infoimages'.$redirect), trans('admin.updated'));
            }

            /**
             * Baboon Script By [it v 1.6.40]
             * destroy a newly created resource in storage.
             * @param  $id
             * @return \Illuminate\Http\Response
             */
	public function destroy($id){
		$infoimages = infoimage::find($id);
		if(is_null($infoimages) || empty($infoimages)){
			return backWithSuccess(trans('admin.undefinedRecord'),aurl("infoimages"));
		}
               		if(!empty($infoimages->image)){
			it()->delete($infoimages->image);		}

		it()->delete('infoimage',$id);
		$infoimages->delete();
		return redirectWithSuccess(aurl("infoimages"),trans('admin.deleted'));
	}


	public function multi_delete(){
		$data = request('selected_data');
		if(is_array($data)){
			foreach($data as $id){
				$infoimages = infoimage::find($id);
				if(is_null($infoimages) || empty($infoimages)){
					return backWithError(trans('admin.undefinedRecord'),aurl("infoimages"));
				}
                    					if(!empty($infoimages->image)){
				  it()->delete($infoimages->image);
				}
				it()->delete('infoimage',$id);
				$infoimages->delete();
			}
			return redirectWithSuccess(aurl("infoimages"),trans('admin.deleted'));
		}else {
			$infoimages = infoimage::find($data);
			if(is_null($infoimages) || empty($infoimages)){
				return backWithError(trans('admin.undefinedRecord'),aurl("infoimages"));
			}
                    
			if(!empty($infoimages->image)){
			 it()->delete($infoimages->image);
			}			it()->delete('infoimage',$data);
			$infoimages->delete();
			return redirectWithSuccess(aurl("infoimages"),trans('admin.deleted'));
		}
	}
            

}