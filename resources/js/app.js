import { createInertiaApp } from "@inertiajs/inertia-vue3"
import { InertiaProgress } from "@inertiajs/progress"
import { createApp, h } from "vue"

InertiaProgress.init()

createInertiaApp({
    resolve: (name) => require(`./Pages/${name}`),
    setup({el, app, props, plugin}) {
        createApp({render: () => h(app, props)})
            .use(plugin)            
            .mixin({methods: {route}})
            .mount(el)
           
           
    },
})
