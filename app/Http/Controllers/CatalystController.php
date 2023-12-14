<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Catalyst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatalystController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() 
    {
        return view('upload_file');
    }

    public function process(Request $request) {
        $request->validate([
            'upload_file'=>'required|mimes:csv,txt|max:20048'
        ]);

        if ($request->hasFile('upload_file')) {
            if ($request->file('upload_file')) {
            
                $filePath = $request->file('upload_file')->getRealPath();
                $csvData = file_get_contents($filePath);
                $data = array_map('str_getcsv', explode("\n", $csvData));
                $chunk_data = array_chunk($data, 100);

                foreach ($chunk_data as $rows) {
                    foreach ($rows as $row) {
                        if (Catalyst::where(['cId'=> $row[0]])->count() > 0) {
                            $update = Catalyst::where('cId', $row[0])->update(['name' => $row[1], 'domain' => $row[2], 'year_founded' => $row[3], 'industry' => $row[4],'size_range' => $row[5],'locality' => $row[6],'country' => $row[7],'linkedin_url' => $row[8],'current_employee_estimate' => $row[9],'total_employee_estimate' => $row[10]]); 
        
                        }else{
                            Catalyst::create([
                                'cId'=>$row[0],
                                'name' => $row[1],
                                'domain' => $row[2],
                                'year_founded' => $row[3],
                                'industry' => $row[4],
                                'size_range' => $row[5],
                                'locality' => $row[6],
                                'country' => $row[7],
                                'linkedin_url' => $row[8],
                                'current_employee_estimate' => $row[9],
                                'total_employee_estimate' => $row[10],
                            ]);
                        }
                    }

                    
                }                

                return redirect()->back()->with('message', 'Data inserted successfully!');  
            }else{

                return redirect()->back()->with('message', 'Please select csv file');   
            }
        }

    }

    public function filter_form() 
    {
        return view('filter_form');
    }

    public function filter_data() 
    {
        return view('filter_data');
    }


    public function filter(Request $request)
    {
        $request->validate([
            'filter'=>'required'
        ]);

        if (!empty($request->filter)) {
            $filter = $request->filter;
            // DB::enableQueryLog();
            $count = Catalyst::where('name', '=', $filter)->orWhere('domain', '=', $filter)->orWhere('year_founded', '=', $filter)->orWhere('industry', '=', $filter)->orWhere('size_range', '=', $filter)->orWhere('locality', '=', $filter)->orWhere('country', '=', $filter)->count();
            // dd(DB::getQueryLog());
        }

        return view('filter_data', ['count' => $count]);
    }

    public function users() 
    {
        $users = User::orderBy('id', 'DESC')->get();

        return view('users', compact('users'));
    }
    
}
