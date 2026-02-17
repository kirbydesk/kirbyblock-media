<?php return [ 'blocks/pwmedia' => function () {

    /* -------------- Config --------------*/
    $config   = pwConfig::load('pwmedia');
    $settings = $config['settings'];
    $defaults = $config['defaults'];

    /* -------------- Allowed Fields --------------*/
    $defaultHeading = !empty($settings['heading']);
    $defaultTagline = !empty($settings['tagline']);

		/* -------------- Tabs --------------*/
    $tabs = [];

		/* -------------- Content Tab --------------*/
		$contentFields = [
			'headlineContent' => ['extends' => 'pagewizard/headlines/content']
		];

		/* -------------- Tagline --------------*/
		if ($defaultTagline) {
			$contentFields['tagline'] = [
				'extends' => 'pagewizard/fields/tagline'
			];
		}
		/* -------------- Heading --------------*/
		if ($defaultHeading) {
			$contentFields['heading'] = [
				'extends' => 'pagewizard/fields/heading'
			];
		}
		/* -------------- Media Type --------------*/
		$contentFields['mediaType'] = [
			'extends' => 'pagewizard/fields/media-type'
		];
		/* -------------- Media Size --------------*/
		$contentFields['mediaSize'] = [
			'extends' => 'pagewizard/fields/media-size'
		];
		/* -------------- Media Alignment --------------*/
		$contentFields['mediaAlignment'] = [
			'extends' => 'pagewizard/fields/media-alignment'
		];
		/* -------------- Image --------------*/
		$contentFields['image'] = [
			'extends' => 'pagewizard/fields/image',
			'uploads' => 'pwImage',
			'query' => 'page.images.template("pwImage")',
			'when'    => [
				'mediaType' => 'image'
			]
		];
		/* -------------- Slideshow --------------*/
		$contentFields['slideshow'] = [
			'extends' => 'pagewizard/fields/images',
			'uploads' => 'pwImage',
			'query' => 'page.images.template("pwImage")',
			'when'    => [
				'mediaType' => 'slideshow'
			]
		];
		/* -------------- Video Source --------------*/
		$contentFields['videoSource'] = [
			'extends' => 'pagewizard/fields/video-source',
			'when'    => [
				'mediaType' => 'video'
			]
		];
		/* -------------- Video Url --------------*/
		$contentFields['videoUrl'] = [
			'extends' => 'pagewizard/fields/video-url',
			'when'    => [
				'mediaType' => 'video',
				'videoSource' => 'external'
			]
		];
		/* -------------- Video --------------*/
		$contentFields['video'] = [
			'extends' => 'pagewizard/fields/video',
			'uploads' => 'pwVideo',
			'query' => 'page.files.template("pwVideo")',
			'when'    => [
				'mediaType' => 'video',
				'videoSource' => 'internal',
			]
		];

		$tabs['content'] = [
			'label'  => 'pw.tab.content',
			'fields' => $contentFields,
		];

		/* -------------- Layout Tab --------------*/
		$tabs['layout'] = pwLayout::options('pwmedia', $defaults);

		/* -------------- Common Tabs (grid, spacing, theme) --------------*/
		pwConfig::buildTabs('pwmedia', $defaults, $settings, $tabs);

		/* -------------- Settings Tab --------------*/
		$tabs['settings'] = pwSettings::options('pwmedia', $defaults);

		/* -------------- Blueprint --------------*/
		return [
			'name'	=> 'kirbyblock-media.name',
			'icon'  => 'image',
			'tabs'	=> $tabs
		];
	}
];
