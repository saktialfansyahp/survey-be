<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\Result;
use Illuminate\Support\Facades\Validator;

class ResultController extends Controller
{
    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            'point' => 'required|integer',
            'survey_id' => 'required|integer',
            'question_id' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $result = Result::create(
                    $validator->validated(),
                );
        return response()->json([
            'message' => 'Result successfully',
            'data' => $result
        ], 201);
    }
    public function getResult(){
        $result = Question::with('result')->get();
        return response()->json([
            'message' => 'Success',
            'data' => $result
        ],201);
    }
    public function getbyId($id){
        $result = Question::with('result')->find($id);
        if($result != null){
            return response()->json([
                'message' => 'Success',
                'data' => $result
            ]);
        }else if($result == null){
            return response()->json([
                'message' => 'Data not found'
            ], 404);
        }
    }
    public function update($id, Request $request){
        $validator = Validator::make($request->all(), [
            'point' => 'required|integer',
            'question_id' => 'required|integer',
            'survey_id' => 'required|integer',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $result = Result::find($id)->update(
            $validator->validated(),
        );
        $result = Result::with('question')->find($id);
        return response()->json([
            'message' => 'Survey successfully registered',
            'result' => $result
        ], 201);
    }
    public function destroy($id){
        Result::where('id', $id)->delete();
        return response()->json([
            'message' => 'Result deleted',
        ], 202);
    }
}
