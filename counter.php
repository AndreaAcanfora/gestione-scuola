<?php
echo increment(get_object_vars(json_decode(file_get_contents('access.json')))['Accessi']);
function increment($count){
	file_put_contents('access.json', json_encode(array('Accessi' => ++$count)));
	return $count;
}