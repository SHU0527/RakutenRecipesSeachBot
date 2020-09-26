<?php
if (preg_match('/料理の豆知識/', $message['text'])) {
	require_once('dbConnect.php');
	$i = rand(1, 15);
	$data_get = $dbh->prepare('SELECT tips FROM cooking_tips WHERE id = :id');
	$data_get->execute(array('id' => $i));
	$cooking_tips = $data_get->fetch();

	$template = array('type' => 'confirm',
		'text' => $cooking_tips['tips'],
		'actions' => array(
			array('type'=>'message', 'label'=>'もう一声！', 'text'=>'料理の豆知識' ),
			array('type'=>'message', 'label'=>'レシピ検索', 'text'=>'レシピ検索' )
		)
	);

	$reply['messages'][0] = array('type' => 'template',
		'altText' => '今日も最高の一日にしましょう!',
		'template' => $template
	);
}

?>
