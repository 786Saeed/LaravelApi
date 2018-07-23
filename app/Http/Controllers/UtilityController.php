<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Survey;
class UtilityController extends Controller
{
    //

    public function getUsers(){


    $users = User::get();


    $subset = $users->map(function ($user) {
        return collect($user->toArray())
            ->only(['id', 'name'])
            ->all();
    });
    return $subset;

    }

    public function addSurvey(Request $request){
                      $surveyData=$request->all();
                     $survey=new Survey();
                     $survey->name=$surveyData['name'];
                     $survey->save();
                     $user=User::find($surveyData['userId']);
                     $user->survey_id=$survey->id;
                     $user->save();
                     return response()->json(['status' => '200']);
    }

        public function getSurveys(){

                         return Survey::all();
        }


         public function deleteSurvey(Request $request){

            $data = $request->all();
            $survey = Survey::find($data['id']);
            $survey->delete();
            return response()->json(['status' => '200']);
            }// deleteQuote Ends

public function editSurvey(Request $request){
     $data = $request->all();
     $survey = Survey::find($data['surveyId']);
     $survey->name = $data['name'];
     $survey->save();
     $user=User::find($data['userId']);
     $user->survey_id=$survey->id;
     $user->save();

    return response()->json(['status' => '200']);
}




}
