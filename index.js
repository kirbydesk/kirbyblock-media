(function() {
  "use strict";
  function normalizeComponent(scriptExports, render, staticRenderFns, functionalTemplate, injectStyles, scopeId, moduleIdentifier, shadowMode) {
    var options = typeof scriptExports === "function" ? scriptExports.options : scriptExports;
    if (render) {
      options.render = render;
      options.staticRenderFns = staticRenderFns;
      options._compiled = true;
    }
    if (scopeId) {
      options._scopeId = "data-v-" + scopeId;
    }
    return {
      exports: scriptExports,
      options
    };
  }
  const _sfc_main$5 = {
    props: {
      value: String,
      icon: String,
      layout: String
    }
  };
  var _sfc_render$5 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "blockinfo" }, [_c("div", [_c("svg", { staticClass: "k-icon", attrs: { "aria-hidden": "true" } }, [_c("use", { attrs: { "xlink:href": "#icon-" + _vm.icon } })]), _vm._v(" " + _vm._s(_vm.value) + " "), _vm.layout ? _c("span", [_vm._v("(" + _vm._s(_vm.layout) + ")")]) : _vm._e()])]);
  };
  var _sfc_staticRenderFns$5 = [];
  _sfc_render$5._withStripped = true;
  var __component__$5 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$5,
    _sfc_render$5,
    _sfc_staticRenderFns$5,
    false,
    null,
    "26526d24"
  );
  __component__$5.options.__file = "/Users/christian/Projects/kirbydesk/site/plugins/kirby-pagewizard/src/components/blockinfo.vue";
  const pwBlockinfo = __component__$5.exports;
  const _sfc_main$4 = {
    props: {
      value: String
    }
  };
  var _sfc_render$4 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "pwTagline" }, [_vm.value ? _c("div", { domProps: { "innerHTML": _vm._s(_vm.value) } }) : _c("div", { staticClass: "placeholder" }, [_vm._v(" " + _vm._s(_vm.$t("pw.field.tagline.placeholder")) + " ")])]);
  };
  var _sfc_staticRenderFns$4 = [];
  _sfc_render$4._withStripped = true;
  var __component__$4 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$4,
    _sfc_render$4,
    _sfc_staticRenderFns$4,
    false,
    null,
    "2287a490"
  );
  __component__$4.options.__file = "/Users/christian/Projects/kirbydesk/site/plugins/kirby-pagewizard/src/components/tagline.vue";
  const pwTagline = __component__$4.exports;
  const _sfc_main$3 = {
    props: {
      value: String,
      level: {
        type: String,
        default: "h2"
      }
    }
  };
  var _sfc_render$3 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "pwHeading", attrs: { "data-level": _vm.level } }, [_vm.value ? _c("div", { domProps: { "innerHTML": _vm._s(_vm.value) } }) : _c("div", { staticClass: "placeholder" }, [_vm._v(" " + _vm._s(_vm.$t("pw.field.heading.placeholder")) + " ")])]);
  };
  var _sfc_staticRenderFns$3 = [];
  _sfc_render$3._withStripped = true;
  var __component__$3 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$3,
    _sfc_render$3,
    _sfc_staticRenderFns$3,
    false,
    null,
    "ad832d63"
  );
  __component__$3.options.__file = "/Users/christian/Projects/kirbydesk/site/plugins/kirby-pagewizard/src/components/heading.vue";
  const pwHeading = __component__$3.exports;
  const _sfc_main$2 = {
    props: {
      src: String,
      srcset: String,
      crop: String,
      ratio: String,
      size: String,
      zoom: String,
      count: {
        type: Number,
        default: 0
      }
    }
  };
  var _sfc_render$2 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "image", class: _vm.size }, [_c("div", { staticClass: "pattern" }, [_c("figure", { staticClass: "k-frame k-image-frame k-image", class: { "zoom": _vm.zoom }, style: {
      "--fit": _vm.crop ? "cover" : "contain",
      "--ratio": _vm.ratio || "1/1"
    } }, [_vm.src.length ? _c("img", { attrs: { "src": _vm.src, "srcset": _vm.srcset } }) : _vm._e(), _c("div", [_c("k-icon", { attrs: { "type": "search" } })], 1)])]), _vm.count > 1 ? _c("div", { staticClass: "dots" }, _vm._l(_vm.count, function(n) {
      return _c("span", { key: n, staticClass: "dot" });
    }), 0) : _vm._e()]);
  };
  var _sfc_staticRenderFns$2 = [];
  _sfc_render$2._withStripped = true;
  var __component__$2 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$2,
    _sfc_render$2,
    _sfc_staticRenderFns$2,
    false,
    null,
    "3063e108"
  );
  __component__$2.options.__file = "/Users/christian/Projects/kirbydesk/site/plugins/kirby-pagewizard/src/components/image.vue";
  const pwImage = __component__$2.exports;
  const _sfc_main$1 = {
    props: {
      videourl: String,
      videosource: String,
      ratio: String,
      size: String,
      caption: String,
      video: String
    },
    methods: {
      getEmbedUrl(url) {
        if (url.includes("youtube.com/embed/")) return url;
        const ytMatch = url.match(/(?:youtube\.com\/watch\?v=|youtu\.be\/)([A-Za-z0-9_-]+)/);
        if (ytMatch && ytMatch[1]) {
          return `https://www.youtube.com/embed/${ytMatch[1]}`;
        }
        const vimeoMatch = url.match(/vimeo\.com\/(?:video\/)?(\d+)/);
        if (vimeoMatch && vimeoMatch[1]) {
          return `https://player.vimeo.com/video/${vimeoMatch[1]}`;
        }
        return url;
      }
    }
  };
  var _sfc_render$1 = function render() {
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "video", attrs: { "size": _vm.size } }, [_c("div", { staticClass: "pattern" }, [_vm.videourl || _vm.video ? _c("div", [_vm.videosource == "internal" ? _c("k-frame", { attrs: { "ratio": _vm.ratio } }, [[_c("video", { attrs: { "src": _vm.video, "controls": "" } })]], 2) : _vm.videosource == "external" ? _c("k-frame", { staticClass: "external", attrs: { "ratio": "16/9" } }, [_c("iframe", { attrs: { "src": _vm.getEmbedUrl(_vm.videourl) } })]) : _vm._e()], 1) : _c("div", { staticStyle: { "height": "300px" } })]), _c("div", { staticClass: "pwCaption" }, [_vm.caption.length ? _c("div", [_vm._v(" " + _vm._s(_vm.caption) + " ")]) : _c("div", { staticClass: "placeholder" }, [_vm._v(" " + _vm._s(_vm.$t("pw.field.caption.placeholder")) + " ")])])]);
  };
  var _sfc_staticRenderFns$1 = [];
  _sfc_render$1._withStripped = true;
  var __component__$1 = /* @__PURE__ */ normalizeComponent(
    _sfc_main$1,
    _sfc_render$1,
    _sfc_staticRenderFns$1,
    false,
    null,
    "301ff5b5"
  );
  __component__$1.options.__file = "/Users/christian/Projects/kirbydesk/site/plugins/kirby-pagewizard/src/components/video.vue";
  const pwVideo = __component__$1.exports;
  const pwToggleLayoutTab = {
    mounted() {
      this.setDrawerClass();
      this.$watch(
        () => this.content.togglelayout,
        () => {
          this.setDrawerClass();
        }
      );
      this.drawerObserver = new MutationObserver(() => {
        this.setDrawerClass();
      });
      this.drawerObserver.observe(document.body, { childList: true, subtree: true });
    },
    beforeDestroy() {
      if (this.drawerObserver) {
        this.drawerObserver.disconnect();
      }
    },
    methods: {
      setDrawerClass() {
        const drawers = document.querySelectorAll(".k-drawer.k-form-drawer");
        drawers.forEach((drawer) => {
          drawer.classList.toggle("hide-layout-tab", this.content.togglelayout === false);
        });
      }
    }
  };
  const pwGridStyle = {
    computed: {
      gridVars() {
        return {
          "--grid-start-sm": Number(this.content.gridoffsetsm),
          "--grid-span-sm": Number(this.content.gridsizesm),
          "--grid-start-md": Number(this.content.gridoffsetmd),
          "--grid-span-md": Number(this.content.gridsizemd),
          "--grid-start-lg": Number(this.content.gridoffsetlg),
          "--grid-span-lg": Number(this.content.gridsizelg),
          "--grid-start-xl": Number(this.content.gridoffsetxl),
          "--grid-span-xl": Number(this.content.gridsizexl)
        };
      }
    }
  };
  const _sfc_main = {
    components: {
      pwBlockinfo,
      pwTagline,
      pwHeading,
      pwImage,
      pwVideo
    },
    mixins: [pwToggleLayoutTab, pwGridStyle]
  };
  var _sfc_render = function render() {
    var _a, _b, _c2, _d, _e, _f, _g, _h, _i, _j, _k, _l, _m, _n;
    var _vm = this, _c = _vm._self._c;
    return _c("div", { staticClass: "pwPreview", attrs: { "data-kirbyblock": "media" }, on: { "dblclick": _vm.open } }, [_c("pwBlockinfo", { attrs: { "value": _vm.$t("kirbyblock-media.name"), "icon": "image", "layout": _vm.$t("pw.option." + _vm.content.mediatype) } }), _c("div", { staticClass: "pwGrid" }, [_c("div", { staticClass: "pwGridItem", style: _vm.gridVars }, [_vm.content.toggletagline ? _c("pwTagline", { attrs: { "value": _vm.content.tagline } }) : _vm._e(), _vm.content.toggleheading ? _c("pwHeading", { attrs: { "value": _vm.content.heading, "data-level": _vm.content.level } }) : _vm._e(), _vm.content.mediatype === "image" ? _c("pwImage", { attrs: { "src": ((_c2 = (_b = (_a = _vm.content) == null ? void 0 : _a.image) == null ? void 0 : _b[0]) == null ? void 0 : _c2.url) || "", "srcset": ((_g = (_f = (_e = (_d = _vm.content) == null ? void 0 : _d.image) == null ? void 0 : _e[0]) == null ? void 0 : _f.image) == null ? void 0 : _g.srcset) || "", "crop": _vm.content.imagecrop, "ratio": _vm.content.imageratio, "size": _vm.content.mediasize, "zoom": _vm.content.imagezoom } }) : _vm._e(), _vm.content.mediatype === "slideshow" ? _c("pwImage", { attrs: { "src": ((_j = (_i = (_h = _vm.content) == null ? void 0 : _h.slideshow) == null ? void 0 : _i[0]) == null ? void 0 : _j.url) || "", "srcset": ((_n = (_m = (_l = (_k = _vm.content) == null ? void 0 : _k.slideshow) == null ? void 0 : _l[0]) == null ? void 0 : _m.slideshow) == null ? void 0 : _n.srcset) || "", "count": Array.isArray(_vm.content.slideshow) ? _vm.content.slideshow.length : 0, "crop": _vm.content.slideshowcrop, "ratio": _vm.content.slideshowratio, "size": _vm.content.mediasize, "zoom": _vm.content.slideshowzoom } }) : _vm._e()], 1)])], 1);
  };
  var _sfc_staticRenderFns = [];
  _sfc_render._withStripped = true;
  var __component__ = /* @__PURE__ */ normalizeComponent(
    _sfc_main,
    _sfc_render,
    _sfc_staticRenderFns,
    false,
    null,
    null
  );
  __component__.options.__file = "/Users/christian/Projects/kirbydesk/site/plugins/kirbyblock-media/src/blocks/index.vue";
  const pwMedia = __component__.exports;
  panel.plugin("kirbydesk/kirbyblock-media", {
    blocks: {
      pwMedia
    }
  });
})();
