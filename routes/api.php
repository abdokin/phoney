<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ftp;
use App\Models\Ssh;
use App\Models\Http;
use App\Models\Smtp;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get("/ftps", function () {
    $ftps = Ftp::all();
    return $ftps;
});

Route::post("/ftps", function (Request $request) {
    // Validation rules
    $rules = [
        'remoteAddr' => 'required|string',
        'username' => 'required|string',
        'password' => 'required|string',
        'client_version' => 'required|string',
        'pwned' => 'required|boolean'
    ];

    // Validate the request
    $validator = Validator::make($request->all(), $rules);

    // If validation fails, return error response
    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    // Extract data from the request body
    $data = $request->only(['remoteAddr', 'username', 'password', 'client_version', 'pwned']);

    // Create FTP entry
    $ftp = Ftp::create($data);

    return response()->json(['message' => 'entry created successfully'], 201);
});

Route::post("/sshs", function (Request $request) {
    $rules = [
        'remoteAddr' => 'required|string',
        'username' => 'required|string',
        'password' => 'required|string',
        'client_version' => 'required|string',
        'pwned' => 'required|boolean'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    $data = $request->only(['remoteAddr', 'username', 'password', 'client_version', 'pwned']);

    $ssh = Ssh::create($data);
    return response()->json(['message' => 'entry created successfully'], 201);
});


Route::post("/http", function (Request $request) {
    $rules = [
        'remoteAddr' => 'required|string',
        'username' => 'required|string',
        'password' => 'required|string',
        'client_version' => 'required|string',
        'pwned' => 'required|boolean'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    $data = $request->only(['remoteAddr', 'username', 'password', 'client_version', 'pwned']);

    $res = Http::create($data);
    return response()->json(['message' => 'entry created successfully'], 201);
});


Route::post("/smtps", function (Request $request) {
    $rules = [
        'remoteAddr' => 'required|string',
        'username' => 'required|string',
        'password' => 'required|string',
        'client_version' => 'required|string',
        'pwned' => 'required|boolean'
    ];

    $validator = Validator::make($request->all(), $rules);

    if ($validator->fails()) {
        return response()->json(['errors' => $validator->errors()], 400);
    }

    $data = $request->only(['remoteAddr', 'username', 'password', 'client_version', 'pwned']);

    $res = Smtp::create($data);
    return response()->json(['message' => 'entry created successfully'], 201);
});