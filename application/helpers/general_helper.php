<?php

function checkAJax($ajax)
{
	if (!$ajax)
		redirect('login');                    
}

function successResponse($data = array())
{
	return json_encode(
		array(
			'status'=> TRUE,
			'data' => $data,
		)
	);
}

function errorResponse($errors = array())
{
	return json_encode(
		array(
			'status'=> FALSE,
			'errors' => $errors,
		)
	);
}

function datatableResponse($data = array())
{
	return json_encode(
		$data
	);
}

function formatError($errors)
{
	$text = str_replace("<p>", "", $errors);
	$text = str_replace("</p>", "", $text);

	return $text;
}

?>