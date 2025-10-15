import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import 'primeicons/primeicons.css'

import ProjectsHome from '@/components/ProjectsHome.vue'

const el = document.getElementById('projects-root')
if (el) {
    const props = el.dataset.props ? JSON.parse(el.dataset.props) : {}

    const app = createApp(ProjectsHome, { projects: props })
    app.use(PrimeVue)
    app.mount(el)
}
