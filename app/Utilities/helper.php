<?php

function jsonResult($data ,$message = '', $status = 200){
    return response()->json([
        'data' => $data,
        'message' => $message
    ],$status);
}

function modelMaker($class){
    return 'App\\Models\\'.$class;
}