<?php 

namespace Noman\Easycrud;
// use View;

use App\Models\EasycrudForm;
use Validator;
class Easycrud{
    public function __construct()
    {
        //  $this->initPage($data);
    }

    
    public static function initPage($data)
    {
        return view("easycrud::views.easycrud.crud_maker",compact('data'))->render();
    }
    public function index()
    {
        
    }
    public  function store($data)
    {
// return $data;
// $this->register[$data['_name']];
        $crud = $data;
        $form=EasycrudForm::where("name",$crud['_name'])->first();
        unset($crud['_name']);
        if($form->code!=null){
            eval($form->code);
        }
        // return $crud;
        $validator = Validator::make($crud, $form->validation);
        if ($validator->passes()) {
            $store = $form->model::create($crud);
            if(isset($form->after_code)){
                eval($form->after_code);
            }
            if ($store) {
                return response()->json(['status' => true, 'message' => $form->message]);
            }
            
        }
        return response()->json(['status' => false, 'errors' => $validator->getMessageBag()]);
    }
    public  function edit($data)
    {
        return $this->register[$data['_name']]::find($data['id']);
    }
    public  function update($data)
    {
        $crud = $data;
        unset($crud['_name']);
        unset($crud['form_data_id']);
        if(isset($this->setting[$data['_name']]['addFields'])){
          foreach($this->setting[$data['_name']]['addFields'] as $fields){
            eval($fields);
          }
        }
        $validator = Validator::make($crud, $this->validation[$data['_name']]);

        if ($validator->passes()) {
            $store=$this->register[$data['_name']]::find($data['form_data_id']);
            $get = $store->update($crud);
            if(isset($this->setting[$data['_name']]['after_added'])){
                eval($this->setting[$data['_name']]['after_added']);
            }
            if ($get) {
                return response()->json(['status' => true, 'message' => str_replace('_', ' ', $data['_name']) . ' Updated Succes']);
            }
        }
        return response()->json(['status' => false, 'errors' => $validator->getMessageBag()]);
    }
    public  function destroy($data)
    {
        $del = $this->register[$data['_name']]::find($data['id'])->delete();
        if ($del) {
            return response()->json(['status' => true, 'message' => str_replace('_', ' ', $data['_name']) . ' Deleted Succes']);
        }
        return response()->json(['status' => false, 'message' => str_replace('_', ' ', $data['_name']) . ' Failed to Destroy']);
    }
}