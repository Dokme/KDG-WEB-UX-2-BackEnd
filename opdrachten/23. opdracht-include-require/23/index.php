<?php
    $artikels =	array(
        array(	'title'	=> 'Titel  1',
                'text' 	=> 'Body  1',
                'tags' 	=> 'label  1',
        ),
        array(	'title'	=> 'Titel  2',
                'text' 	=> 'Body  2',
                'tags' 	=> 'label  2',
        ),
        array(	'title'	=> 'Titel  3',
                'text' 	=> 'Body  3',
                'tags' 	=> 'label  3',
        )
    );

    if (isset($_GET['artikel']))
	{
		$artikel = $artikels[$_GET['artikel']];
	}

    include 'view/header-partial.html';
	if (!isset($_GET['artikel']))
	{
		include 'view/body-partial.html';
	} else {
		include 'view/artikel-partial.html';
	}
	include 'view/footer-partial.html';
?>