<template>
	<div
		class="pwPreview"
		data-kirbyblock="media"
		@dblclick="open"
		:style="colorVars"
		:data-margintop="content.margintop === true ? 'true' : null"
		:data-marginbottom="content.marginbottom === true ? 'true' : null"
		>

		<pwBlockinfo
			:value="$t('kirbyblock-media.name')"
			icon="image"
			:layout="$t('pw.option.' + content.mediatype)"
		/>

		<div class="pwGrid">
			<div
				class="pwGridItem"
				:style="gridVars"
				:data-paddingtop="content.paddingtop === true ? 'true' : null"
				:data-paddingright="content.paddingright === true ? 'true' : null"
				:data-paddingbottom="content.paddingbottom === true ? 'true' : null"
				:data-paddingleft="content.paddingleft === true ? 'true' : null"
				>

				<!-- Tagline -->
				<pwTagline v-if="settings.tagline" :value="content.tagline" />

				<!-- Heading -->
				<pwHeading v-if="settings.heading" :value="content.heading" :data-level="content.level" />

				<!-- Image -->
				<pwImage v-if="content.mediatype === 'image'"
					:src="content?.image?.[0]?.url || ''"
					:srcset="content?.image?.[0]?.image?.srcset || ''"
					:size="content.mediasize"
					:alignment="content.mediaalignment"
					:image="content?.image?.[0] || null"
				/>
				<!-- Slideshow (First image) -->
				<pwImage v-if="content.mediatype === 'slideshow'"
					:src="content?.slideshow?.[0]?.url || ''"
					:srcset="content?.slideshow?.[0]?.slideshow?.srcset || ''"
					:count="Array.isArray(content.slideshow) ? content.slideshow.length : 0"
					:size="content.mediasize"
					:alignment="content.mediaalignment"
					:image="content?.slideshow?.[0] || null"
				/>
				<!-- Video -->
				<pwVideo v-if="content.mediatype === 'video'"
					:url="content.videourl"
					:source="content.videosource"
					:size="content.mediasize"
					:alignment="content.mediaalignment"
					:video="content?.video?.[0] || null"
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
import pwGridStyle from '@/../../kirby-pagewizard/src/mixins/gridStyle.js';
import pwColorStyle from '@/../../kirby-pagewizard/src/mixins/colorStyle.js';

export default {
	components: {
		pwBlockinfo,
		pwTagline,
		pwHeading,
		pwImage,
		pwVideo
	},
	mixins: [pwGridStyle, pwColorStyle],
	data() {
		return {
			settings: {}
		}
	},
	async created() {
		try {
			const response = await this.$api.get('pagewizard/settings/pwmedia');
			this.settings = response.settings;
		} catch (e) {
			this.settings = {};
		}
	}
}
</script>