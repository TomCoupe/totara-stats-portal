import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import Lara from '@primeuix/themes/lara';

import ProjectsHome from '@/components/ProjectsHome.vue'

const el = document.getElementById('projects-root')
if (el) {
    const props = el.dataset.props ? JSON.parse(el.dataset.props) : {}

    const app = createApp(ProjectsHome, { projects: props })
    app.use(PrimeVue, {
        theme: {
            preset: Lara,
            options: {
                prefix: 'p',
                darkModeSelector: false,
                cssLayer: true
            },
            mode: 'light'
        }});
    app.mount(el)
}
