<template>
	<!-- the block in the panel: its info bar (with the media type) and the
	     shared preview of the Project Wizard (the project's look, the real
	     content); a double click opens the block -->
	<div class="pwPreview" data-kirbyblock="media" @dblclick="open">

		<pwBlockinfo
			:value="$t('kirbyblock-media.name')"
			:design="'pwmedia'"
			icon="images"
			:layout="content.mediatype ? $t('pw.option.' + content.mediatype) : null"
		/>

		<pw-block-panel-preview type="pwmedia" :content="content" />

	</div>
</template>

<script>
import pwBlockinfo from '@/../../kirby-pagewizard/src/components/blockinfo.vue';

export default {
	components: {
		pwBlockinfo
	}
}
</script>
