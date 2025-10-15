import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
// import Aura from '@primeuix/themes/aura';
// import 'primeicons/primeicons.css'
// import 'primevue/resources/themes/lara-light-blue/theme.css'  // or another theme
// import 'primevue/resources/primevue.min.css'
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
                darkModeSelector: false, // force light mode
                cssLayer: true
            },
            mode: 'light'
        }});
    app.mount(el)
}
