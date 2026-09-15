<?php return [
	'blocks/pwmedia' => pwBlueprint::main('pwmedia', fn($cfg) => [
		'name' => 'kirbyblock-media.name',
		'icon' => 'images',
		'contentFields' => array_merge(
			pwBlueprint::stdContent($cfg, ['tagline', 'heading', 'editor']),
			[
				'mediaAlignment' => [
					'type'          => 'pwalign',
					'align'         => $cfg['fields']['align-media'],
					'default'       => $cfg['fields']['align-media'],
					'alignOptions'  => $cfg['field-options']['media']['align'] ?? null,
					'alwaysVisible' => true,
				],
				'mediaType' => [
					'extends' => 'pagewizard/fields/media-type'
				],
				'mediaSize' => [
					'extends' => 'pagewizard/fields/media-size'
				],
				'mediaRadius' => [
					'extends' => 'pagewizard/fields/media-radius'
				],
				'radiusTopLeft' => [
					'extends' => 'pagewizard/fields/toggle',
					'label'   => 'pw.field.radius-top-left',
					'when'    => ['mediaRadius' => 'custom']
				],
				'radiusTopRight' => [
					'extends' => 'pagewizard/fields/toggle',
					'label'   => 'pw.field.radius-top-right',
					'when'    => ['mediaRadius' => 'custom']
				],
				'radiusBottomLeft' => [
					'extends' => 'pagewizard/fields/toggle',
					'label'   => 'pw.field.radius-bottom-left',
					'when'    => ['mediaRadius' => 'custom']
				],
				'radiusBottomRight' => [
					'extends' => 'pagewizard/fields/toggle',
					'label'   => 'pw.field.radius-bottom-right',
					'when'    => ['mediaRadius' => 'custom']
				],
				'image' => [
					'extends' => 'pagewizard/fields/image',
					'uploads' => 'pwImage',
					'query'   => 'page.images.template("pwImage")',
					'when'    => ['mediaType' => 'image']
				],
				'slideshow' => [
					'extends' => 'pagewizard/fields/images',
					'uploads' => 'pwImage',
					'query'   => 'page.images.template("pwImage")',
					'when'    => ['mediaType' => 'slideshow']
				],
				'videoSource' => [
					'extends' => 'pagewizard/fields/video-source',
					'when'    => ['mediaType' => 'video']
				],
				'videoUrl' => [
					'extends' => 'pagewizard/fields/video-url',
					'when'    => ['mediaType' => 'video', 'videoSource' => 'external']
				],
				'video' => [
					'extends' => 'pagewizard/fields/video',
					'uploads' => 'pwVideo',
					'query'   => 'page.files.template("pwVideo")',
					'when'    => ['mediaType' => 'video', 'videoSource' => 'internal']
				],
			]
		),
	]),
];
