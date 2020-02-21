<?php 



	if (!function_exists('ApiResponse')) {
		function ApiResponse($status = 200,$errors = [],$data = []) 
		{
			$response['status']  = $status;
			$response['data']    = $data == Null ? []:$data;
			$response['errors']  = $errors == Null ? []:$errors;
			return response()->json($response,$status);
		}
	}

	function ApiValidation($request = [],$rules = []) 
	{
		$errors    = [];
		$validator = Validator::make($request, $rules);
		if($validator->fails()){
			$x = 0;
			foreach ($validator->errors()->toArray() as $key => $value) {
				$errors[$x]['key'] = $key;
				$errors[$x]['value'] = $value[0];
				$x++;
			}
		}
		if(count($errors) < 1) {
			return false;
		} 
		return ApiResponse(400,$errors,Null);
	}