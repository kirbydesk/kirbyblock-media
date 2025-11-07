<?php return [ 'blocks/pwMedia' => function () {

    /* -------------- Block Defaults when not set in config --------------*/
    $defaults = [
      'heading' 					=> true,
      'tagline' 					=> true,
			'layout'						=> true,
			'grid-size-sm'   		=> 12,
			'grid-size-md'   		=> 12,
			'grid-size-lg'   		=> 12,
			'grid-size-xl'   		=> 12,
      'grid-offset-sm' 		=> 1,
      'grid-offset-md' 		=> 1,
      'grid-offset-lg' 		=> 1,
      'grid-offset-xl' 		=> 1,
    ];
		// Merge config with defaults
    $raw = option('kirbydesk.pagewizard.kirbyblocks.pwMedia', []);
    $cfg = array_merge($defaults, is_array($raw) ? $raw : []);

    /* -------------- Grid settings --------------*/
		$defaultGridSizeSm    = $cfg['grid-size-sm'];
		$defaultGridOffsetSm  = $cfg['grid-offset-sm'];
		$defaultGridSizeMd		= $cfg['grid-size-md'];
		$defaultGridOffsetMd	= $cfg['grid-offset-md'];
		$defaultGridSizeLg		= $cfg['grid-size-lg'];
		$defaultGridOffsetLg	= $cfg['grid-offset-lg'];
		$defaultGridSizeXl		= $cfg['grid-size-xl'];
		$defaultGridOffsetXl	= $cfg['grid-offset-xl'];

    /* -------------- Allowed Fields --------------*/
    $defaultHeading = !empty($cfg['heading']);
    $defaultTagline = !empty($cfg['tagline']);
		$defaultLayout = filter_var($cfg['layout'], FILTER_VALIDATE_BOOLEAN);

		/* -------------- Tabs --------------*/
    $tabs = [];

		$tabs['content'] = [
      'label'  => 'pw.tab.content',
      'fields' => [
        'tagline' => [
          'extends' => 'pagewizard/fields/tagline',
          'when'    => ['toggleTagline' => true],
        ],
        'heading' => [
          'extends' => 'pagewizard/fields/heading',
          'when'    => ['toggleHeading' => true],
        ],
        'level' => [
          'extends' => 'pagewizard/fields/level',
          'when'    => ['toggleHeading' => true],
				],
				'mediaType' => [
					'extends' => 'pagewizard/fields/media-type',
				],
				'mediaSize' => [
					'extends' => 'pagewizard/fields/media-size',
				],
				'line' => ['type' => 'line'],
				'image' => [
					'extends' => 'pagewizard/fields/image',
					'uploads' => 'pwImage',
        	'query' => 'page.images.template("pwImage")',
					'when'    => ['mediaType' => 'image'],
				],
				'imageZoom' => [
					'extends' => 'pagewizard/fields/image-zoom',
					'when'    => ['mediaType' => 'image'],
				],
				'imageRatio' => [
					'extends' => 'pagewizard/fields/image-ratio',
					'when'    => ['mediaType' => 'image'],
				],
				'imageCrop' => [
					'extends' => 'pagewizard/fields/image-crop',
					'when'    => ['mediaType' => 'image'],
				],
				'slideshow' => [
					'extends' => 'pagewizard/fields/images',
					'uploads' => 'pwImage',
        	'query' => 'page.images.template("pwImage")',
					'when'    => ['mediaType' => 'slideshow'],
				],
				'slideshowZoom' => [
					'extends' => 'pagewizard/fields/image-zoom',
					'when'    => ['mediaType' => 'slideshow'],
				],
				'slideshowRatio' => [
					'extends' => 'pagewizard/fields/image-ratio',
					'when'    => ['mediaType' => 'slideshow'],
				],
				'slideshowCrop' => [
					'extends' => 'pagewizard/fields/image-crop',
					'when'    => ['mediaType' => 'slideshow'],
				],
				'videoSource' => [
					'extends' => 'pagewizard/fields/video-source',
					'when'    => ['mediaType' => 'video'],
				],
				'videoUrl' => [
					'extends' => 'pagewizard/fields/video-url',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'external'
					],
				],
				'videoRatio' => [
					'extends' => 'pagewizard/fields/video-ratio',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'videoAutoplay' => [
					'extends' => 'pagewizard/fields/video-autoplay',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'videoMuted' => [
					'extends' => 'pagewizard/fields/video-muted',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'videoLoop' => [
					'extends' => 'pagewizard/fields/video-loop',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'videoControls' => [
					'extends' => 'pagewizard/fields/video-controls',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'videoPreload' => [
					'extends' => 'pagewizard/fields/video-preload',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'video' => [
					'extends' => 'pagewizard/fields/video',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				],
				'videoPoster' => [
					'extends' => 'pagewizard/fields/video-poster',
					'when'    => [
						'mediaType' => 'video',
						'videoSource' => 'internal'
					],
				]
      ],
    ];

		$tabs['layout'] = [
			'label'  => 'pw.tab.layout',
			'fields' => [
				'headlineBlocksettings' => ['extends' => 'pagewizard/headlines/gridsettings'],
				'gridOffsetSm' => [
					'extends' => 'pagewizard/fields/grid-offset',
					'default' => $defaultGridOffsetSm
				],
				'gridSizeSm' => [
					'extends' => 'pagewizard/fields/grid-size',
					'default' => $defaultGridSizeSm
				],
				'gridOffsetMd' => [
					'extends' => 'pagewizard/fields/grid-offset',
					'default' => $defaultGridOffsetMd
				],
				'gridSizeMd' => [
					'extends' => 'pagewizard/fields/grid-size',
					'default' => $defaultGridSizeMd
				],
				'gridOffsetLg' => [
					'extends' => 'pagewizard/fields/grid-offset',
					'default' => $defaultGridOffsetLg
				],
				'gridSizeLg' => [
					'extends' => 'pagewizard/fields/grid-size',
					'default' => $defaultGridSizeLg
				],
				'gridOffsetXl' => [
					'extends' => 'pagewizard/fields/grid-offset',
					'default' => $defaultGridOffsetXl
				],
				'gridSizeXl' => [
					'extends' => 'pagewizard/fields/grid-size',
					'default' => $defaultGridSizeXl
				],
			]
		];

		$tabs['properties'] = [
      'label'  => 'pw.tab.properties',
      'fields' => [
        'fragment' => [
          'extends' => 'pagewizard/fields/fragment'
        ]
      ]
    ];

		$tabs['settings'] = [
      'label'  => 'pw.tab.settings',
      'fields' => [
        'headlineFieldsettings' => ['extends' => 'pagewizard/headlines/fieldsettings'],
        'toggleTagline' => [
          'extends' => 'pagewizard/fields/field-visibility',
          'label'   => 'pw.field.tagline',
          'default' => (bool)$defaultTagline,
          'help'    => 'The default setting for Tagline is: <code>' . ($defaultTagline ? t('pw.option.enabled') : t('pw.option.disabled')) . '</code>',
        ],
        'toggleHeading' => [
          'extends' => 'pagewizard/fields/field-visibility',
          'label'   => 'pw.field.heading',
          'default' => (bool)$defaultHeading,
          'help'    => 'The default setting for Heading is: <code>' . ($defaultHeading ? t('pw.option.enabled') : t('pw.option.disabled')) . '</code>'
        ],
				'toggleLayout' => [
          'extends' => 'pagewizard/fields/field-visibility',
          'label'   => 'pw.field.layout',
          'default' => (bool)$defaultLayout,
          'help'    => 'The default setting for Layout is: <code>' . ($defaultLayout ? t('pw.option.enabled') : t('pw.option.disabled')) . '</code>'
        ]
      ]
    ];

		/* -------------- Blueprint --------------*/
		return [
			'name'	=> 'kirbyblock-media.name',
			'icon'  => 'image',
			'tabs'	=> $tabs
		];
	}
];