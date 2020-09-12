<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function getAllCustomer(){
        //get all customer
        $customers = Customer::where('deleted',0)->get();
        $result = [
            "status" =>
            [
                "code" => 200,
                "status" => "success",
                "message" => "getAllCustomer suceed"
            ],
            "result" =>
            [
                "data" => $customers
            ]
        ];
        return response($result, 200);
    }

    public function getCustomer($id) {
        //get record customer
        if (Customer::where('id', $id)->where('deleted',0)->exists()){
            $customer = Customer::where('id',$id)->get();
            $result = [
              "status" =>
                [
                  "code" => 200,
                  "status" => "success",
                  "message" => "getCustomer suceed"
                ],
              "result" =>
                [
                  "data" => $customer
                ]
            ];
            return response()->json($result,201);
        } else {
            $result = [
              "status" =>
                [
                  "code" => 404,
                  "status" => "failed",
                  "message" => "getCustomer failed, customer not found"
                ],
              "result" =>
                [
                  "data" => ""
                ]
            ];
            return response()->json($result,404);
        }
    }

    public function createCustomer(Request $request){
        //insert customer
        $addCustomer = new Customer;
        $addCustomer->name = $request->name;
        $addCustomer->email = $request->email;
        $addCustomer->password = $request->password;
        $addCustomer->gender = $request->gender;
        $addCustomer->is_married = $request->is_married;
        $addCustomer->address = $request->address;
        $addCustomer->deleted = 0;
        $addCustomer->save();

        $result = [
          "status" =>
            [
              "code" => 201,
              "status" => "success",
              "message" => "createCustomer succeed, customer added"
            ],
          "result" =>
            [
              "data" => $addCustomer
            ]
        ];

        return response()->json($result, 201);
    }

    public function updateCustomer(Request $request, $id){
        //update customer record
        var_dump("testt");
        if (Customer::where('id',$id)->exist()){
            $customer = Customer::find($id);
            $customer->name = is_null($request->name) ? $customer->name : $request ->name;
            $customer->email = is_null($request->email) ? $customer->email : $request ->email;
            $customer->is_married = is_null($request->is_married) ? $customer->is_married : $request ->is_married;
            $customer->address = is_null($request->address) ? $customer->address : $request ->address;
            $customer->save();
            $result = [
                "status" =>
                  [
                    "code" => 201,
                    "status" => "success",
                    "message" => "updateCustomer succeed, customer modified"
                  ],
                "result" =>
                  [
                    "data" => $customer
                  ]
              ];
            return response()->json($result, 201);
        } else {
            $result = [
                "status" =>
                  [
                    "code" => 404,
                    "status" => "failed",
                    "message" => "getCustomer failed, customer not found"
                  ],
                "result" =>
                  [
                    "data" => ""
                  ]
              ];
              return response()->json($result,404);
        }
    }

    public function deleteCustomer(Request $request, $id){
        //delete by updating column deleted
        if (Customer::where('deleted',0)){

        }

    }
}
