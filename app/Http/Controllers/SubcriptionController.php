<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class SubcriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        echo "Index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $urlPath = 'C:\xampp\htdocs\reto-api\public\subscriberstest1.xml';
        //Check file xml
        if (file_exists($urlPath)) {
            $subscriptor = simplexml_load_file($urlPath);
            if (!$subscriptor) {
                exit('Error, there is a problem with a xml file');
            }
            $result = [];
            $count = 0;
            //looking for all subscriptiones
            foreach ($subscriptor->children() as $children) {
                if ($children->user == $id) {
                    $start = new DateTime($children->start);
                    $stop = new DateTime($children->stop);
                    $diferent = $start->diff($stop);
                    $user['type'] = 'abbo-' . $diferent->format('%a');
                    $user['start'] = $start->format('Y-m-d');
                    $user['end'] = $stop->format('Y-m-d');
                    $result[$count] = $user;
                    $count++;
                }
            }
            if (count($result) == 0) {
                return response('There is no abbonamento for this user');
            }
            return response($result);
        } else {
            exit('Error opening a xml file');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
