<?php return [ 'blocks/pwmedia' => function () {

    /* -------------- Config --------------*/
    $config      = pwConfig::load('pwmedia');
    $settings    = $config['settings'];
    $tabSettings = $config['tabs'];
    $defaults    = $config['defaults'];
    $fields      = $config['fields'];
		$editor      = $config['editor'];

    /* -------------- Allowed Fields --------------*/
    $defaultTagline = !empty($settings['tagline']);
    $defaultHeading = !empty($settings['heading']);
		$defaultEditor = !empty($settings['editor']);

		/* -------------- Tabs --------------*/
    $tabs = [];

		/* -------------- Content Tab --------------*/
		$contentFields = [
			'headlineContent' => ['extends' => 'pagewizard/headlines/content']
		];

		/* -------------- Tagline --------------*/
		if ($defaultTagline) {
			$contentFields['tagline'] = [
				'extends' => 'pagewizard/fields/tagline',
				'align'   => $fields['align-tagline'],
			];
		}
		/* -------------- Heading --------------*/
		if ($defaultHeading) {
			$contentFields['heading'] = [
				'extends' => 'pagewizard/fields/heading',
				'align'   => $fields['align-heading'],
			];
		}
		/* -------------- Editor --------------*/
		if ($defaultEditor) {
			$contentFields['editor'] = pwEditor::contentField($defaults, $editor, $settings, $fields);
		}
		/* -------------- Media Size --------------*/
		$contentFields['mediaSize'] = [
			'extends' => 'pagewizard/fields/media-size'
		];
		/* -------------- Media Alignment (injected into mediaType label) --------------*/
		$contentFields['mediaAlignment'] = [
			'type'          => 'pwalign',
			'align'         => $fields['align-media'],
			'default'       => $fields['align-media'],
			'alwaysVisible' => true,
		];
		/* -------------- Media Type --------------*/
		$contentFields['mediaType'] = [
			'extends' => 'pagewizard/fields/media-type'
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
		pwConfig::addTab($tabs, 'layout', $tabSettings['layout'] ?? true, pwLayout::options('pwmedia', $defaults));

		/* -------------- Style Tab --------------*/
		pwConfig::addTab($tabs, 'style', $tabSettings['style'] ?? true, pwStyle::options('pwmedia', $defaults));

		/* -------------- Grid Tab --------------*/
		pwConfig::addTab($tabs, 'grid', $tabSettings['grid'] ?? false, pwGrid::layout('pwmedia', $defaults));

		/* -------------- Settings Tab --------------*/
		pwConfig::addTab($tabs, 'settings', $tabSettings['settings'] ?? true, pwSettings::options('pwmedia', $defaults));

		/* -------------- Blueprint --------------*/
		return [
			'name'	=> 'kirbyblock-media.name',
			'icon'  => 'images',
			'tabs'	=> $tabs
		];
	}
];
