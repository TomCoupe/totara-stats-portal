import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import Aura from '@primevue/themes/aura'          // theme preset
import 'primeicons/primeicons.css'               // icons

import ProjectsHome from '@/components/ProjectsHome.vue'

const el = document.getElementById('projects-root')
if (el) {
    const props = el.dataset.props ? JSON.parse(el.dataset.props) : {}

    const app = createApp(ProjectsHome, { projects: props })
    app.use(PrimeVue, { theme: { preset: Aura } }) // activate theme
    app.mount(el)
}
