// Styles
import "../../kirby-pagewizard/src/css/panel.css";

// Blocks
import pwMedia from "@/blocks/index.vue";

// Render
panel.plugin("kirbydesk/kirbyblock-media", {
	blocks: {
		pwMedia: pwMedia
  }
});
