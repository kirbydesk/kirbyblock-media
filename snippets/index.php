<?php

// Config
$config   = pwConfig::load('pwmedia');
$settings = $config['content'];

// Custom Background
pwSnippet::customCss($block);

// Section + Grid open
echo pwSnippet::sectionOpen('media', $block, $settings);
echo pwSnippet::gridOpen($block);

// Tagline
if (!empty($settings['tagline'])):
	snippet('tagline', ['content' => $block]);
endif;

// Heading
if (!empty($settings['heading'])):
	snippet('heading', ['content' => $block]);
endif;

// Editor
if (!empty($settings['editor'])):
	snippet('editor', ['content' => $block]);
endif;

// Media
snippet('media', ['content' => $block]);

// Close
echo pwSnippet::gridClose();
echo pwSnippet::sectionClose();
