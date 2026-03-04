<?php return [ 'blocks/pwmedia' => function () {

    /* -------------- Config --------------*/
    $config       = pwConfig::load('pwmedia');
    $settings     = $config['content'];
    $tabSettings  = $config['tabs'];
    $defaults     = $config['defaults'];
    $fields       = $config['fields'];
		$editor       = $config['editor'];
		$fieldOptions = $config['field-options'];


		/* -------------- Tabs --------------*/
    $tabs = [];

		/* -------------- Content Tab --------------*/
		$contentFields = [
			'headlineContent' => ['extends' => 'pagewizard/headlines/content']
		];

		/* -------------- Tagline --------------*/
		if (!empty($settings['tagline'])) {
			$contentFields['tagline'] = [
				'extends'      => 'pagewizard/fields/tagline',
				'align'        => $fields['align-tagline'],
				'alignOptions' => $fieldOptions['tagline']['align'] ?? null,
			];
		}
		/* -------------- Heading --------------*/
		if (!empty($settings['heading'])) {
			$contentFields['heading'] = [
				'extends'      => 'pagewizard/fields/heading',
				'align'        => $fields['align-heading'],
				'level'        => $fields['level-heading'] ?? null,
				'size'         => $fields['size-heading'] ?? null,
				'sizeOptions'  => $fieldOptions['heading']['sizes'] ?? null,
				'alignOptions' => $fieldOptions['heading']['align'] ?? null,
				'levelOptions' => $fieldOptions['heading']['level'] ?? null,
			];
		}
		/* -------------- Editor --------------*/
		if (!empty($settings['editor'])) {
			$contentFields['editor'] = pwEditor::contentField($editor, $settings);
			$contentFields['editor']['align']        = $fields['align-editor'] ?? null;
			$contentFields['editor']['size']         = $fields['size-editor'] ?? null;
			$contentFields['editor']['alignOptions'] = $fieldOptions['editor']['align'] ?? null;
			$contentFields['editor']['sizeOptions']  = $fieldOptions['editor']['sizes'] ?? null;
			$contentFields['editor']['defaultMode'] = $fields['mode-editor'] ?? null;
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
			'alignOptions'  => $fieldOptions['media']['align'] ?? null,
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
		pwConfig::addTab($tabs, 'layout', $tabSettings['layout'] ?? true, pwLayout::options('pwmedia', $defaults, [], $config['layout'] ?? []));

		/* -------------- Style Tab --------------*/
		pwConfig::addTab($tabs, 'style', $tabSettings['style'] ?? true, pwStyle::options('pwmedia', $defaults, [], $config['style'] ?? []));

		/* -------------- Grid Tab --------------*/
		pwConfig::addTab($tabs, 'grid', $tabSettings['grid'] ?? false, pwGrid::layout('pwmedia', $defaults));

		/* -------------- Settings Tab --------------*/
		pwConfig::addTab($tabs, 'settings', $tabSettings['settings'] ?? true, pwSettings::options('pwmedia', $defaults, [], $config['settings'] ?? []));

		/* -------------- Blueprint --------------*/
		return [
			'name'	=> 'kirbyblock-media.name',
			'icon'  => 'images',
			'tabs'	=> $tabs
		];
	}
];
