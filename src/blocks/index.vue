<template>
	<div class="pwPreview" data-kirbyblock="media" @dblclick="open">

		<pwBlockinfo
			:value="$t('kirbyblock-media.name')"
			icon="image"
			:layout="$t('pw.option.' + content.mediatype)"
		/>

		<div class="pwGrid">
			<div class="pwGridItem" :style="gridVars">

				<!-- Tagline -->
				<pwTagline v-if="content.toggletagline" :value="content.tagline" />

				<!-- Heading -->
				<pwHeading v-if="content.toggleheading" :value="content.heading" :data-level="content.level" />

				<!-- Image -->
				<pwImage v-if="content.mediatype === 'image'"
					:src="content?.image?.[0]?.url || ''"
					:srcset="content?.image?.[0]?.image?.srcset || ''"
					:crop="content.imagecrop"
					:ratio="content.imageratio"
					:size="content.mediasize"
					:zoom="content.imagezoom"
				/>
				<!-- Slideshow (First image) -->
				<pwImage v-if="content.mediatype === 'slideshow'"
					:src="content?.slideshow?.[0]?.url || ''"
					:srcset="content?.slideshow?.[0]?.slideshow?.srcset || ''"
					:count="Array.isArray(content.slideshow) ? content.slideshow.length : 0"
					:crop="content.slideshowcrop"
					:ratio="content.slideshowratio"
					:size="content.mediasize"
					:zoom="content.slideshowzoom"
				/>

			</div>
		</div>
	</div>
</template>

<script>
import pwBlockinfo from '@/../../kirby-pagewizard/src/components/blockinfo.vue'
import pwTagline from '@/../../kirby-pagewizard/src/components/tagline.vue'
import pwHeading from '@/../../kirby-pagewizard/src/components/heading.vue'
import pwImage from '@/../../kirby-pagewizard/src/components/image.vue'
import pwVideo from '@/../../kirby-pagewizard/src/components/video.vue'
import pwToggleLayoutTab from '@/../../kirby-pagewizard/src/mixins/toggleLayoutTab.js';
import pwGridStyle from '@/../../kirby-pagewizard/src/mixins/gridStyle.js';

export default {
	components: {
		pwBlockinfo,
		pwTagline,
		pwHeading,
		pwImage,
		pwVideo
	},
	mixins: [pwToggleLayoutTab, pwGridStyle],
}
</script>