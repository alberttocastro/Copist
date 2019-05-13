<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Card;
use App\Assignment;
use Illuminate\Support\Facades\Gate;

class AssignmentController extends Controller
{
    //
    public function index()
    {
        if (Gate::allows('is_user_admin')){
            $working_cards = array();
            $cards = Card::all();
            foreach($cards as $id => $card){
                if($card->is_at_work()){
                    if(\array_key_exists($card->macro_region_id, $working_cards)){
                        $macro_region_array = $working_cards[$card->macro_region_id];
                    } else {
                        $macro_region_array = array();
                    }
                    $macro_region_array[$card->id] = $card;
                    $working_cards[$card->macro_region_id] = $macro_region_array;
                }
            }
            return view('main.assignments',['working_cards'=>$working_cards]);
        }

        return view('denied.permission_not_granted');
    }

    public function assign_to_territory(Request $request)
    {
        try {
            $assignment = new Assignment;
            $assignment->card_id = $request->card_id;
            $assignment->user_id = $request->publisher_1;

            $assignment_2 = new Assignment;
            $assignment_2->card_id = $request->card_id;
            $assignment_2->user_id = $request->publisher_2;
            
            $assignment->save();

            if($request->publisher_2 != 0){
                $assignment_2->save();
            }

            return redirect()->action('AssignmentController@index')->with('message', 'Territory assignmed successfully');
        } catch (\Exception $th) {
            return redirect()->action('AssignmentController@index')->with('message', '<br><br><br>Could not assign territory. Try again. <br>'.$th);
        }
    }

    public function remove_assignment(Request $request)
    {
        try {
            $assignment = Assignment::find($request->assignment_id);
            $assignment->completion_date = new DateTime();
    
            $assignment->save();

            return redirect()->action('AssignmentController@index')->with('message', 'Assignment removed successfully');
        } catch (\Exception $th) {
            return redirect()->action('AssignmentController@index')->with('message', 'Could not remove assignment. Try again.');
        }

    }
}
