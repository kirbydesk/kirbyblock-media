<?php Kirby::plugin('kirbydesk/kirbyblock-media', [

	/* -------------- Extensions --------------*/
	'blueprints' => require_once 'src/extensions/blueprints.php',
	'snippets' => require_once 'src/extensions/snippets.php',
	'translations' => require_once 'src/extensions/translations.php'
]);