<?php
/**
 * Created by PhpStorm.
 * User: josiah
 * Date: 02/11/2016
 * Time: 18:41
 */

namespace app\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use DateTime;

use Config;
use Validator;
use Session;
use Input;
use View;
use Mail;
use Datatables;
use DB;
use File;
use Log;

use App\People;

class FrontController  extends Controller
{
    public function create_people (Request $request){
        if ($request->isMethod('post')) {
            $validate = Validator::make($request->except('_token'), [
                'name'    => 'required|max:255',
                'age'   => 'required|numeric',
                'phone'   => 'numeric|required'
            ]);
            if ($validate->fails()) {
                return redirect()->back()->withInput()->withErrors($validate);
            } else {

                $person_exists = People::where('name','=',$request->name)->get();
                if ($person_exists->count() > 0 ){
                    return redirect()->back()->withError('Persons already Exists. Please re-try');
                }
                $person = new People();
                $person->name = $request->name;
                $person->age = $request->age;
                $person->phone = $request->phone;
                $person ->save();
                if ($person) {
                    return redirect()->back()->withSuccess('Persons Details Added.');
                } else {
                    return redirect()->back()->withError('Failed to add Persons. Please re-try');
                }
            }
        }
        else{
            return redirect()->back()->withErrors('Invalid Request');
        }
    }

    public function view_people (Request $request){
        $list = People::orderBy('id', 'desc');
        return Datatables::of($list)
            ->removeColumn('deleted_at')
            ->make(true);
    }
}