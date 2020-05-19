<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ItemController extends Controller
{
    public function create()
    {
        return view('itemForm');
    }

    public function store(Request $request)
	{
        $this->validate($request, [
        'name' => 'required|max:10',
        'price' => 'required'
        ]);

		$data = array(
                array(
                    'name' 		=> $request->get('name'),
                    'price'     => $request->get('price')
                )
            );

            DB::table('item')->insert($data);

        return back()->with('success', 'You have just created one item');
	}
}
