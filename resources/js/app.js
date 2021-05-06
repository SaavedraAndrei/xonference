require("./bootstrap");

import { App, plugin } from "@inertiajs/inertia-vue";
import { InertiaProgress } from "@inertiajs/progress";
import Vue from "vue";

InertiaProgress.init();

Vue.use;

// Vue.prototype.$route = (...args) => route(...args).url();
// Vue.prototype.$route = route(plugin);

const el = document.getElementById("app");

new Vue({
    render: h =>
        h(App, {
            props: {
                initialPage: JSON.parse(el.dataset.page),
                resolveComponent: name => require(`./Pages/${name}`).default
            }
        })
}).$mount(el);
