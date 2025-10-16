import { createApp } from 'vue'
import PrimeVue from 'primevue/config'
import Material from '@primeuix/themes/material';

import ProjectsHome from '@/components/ProjectsHome.vue'

const el = document.getElementById('projects-root')
if (el) {
    const props = el.dataset.props ? JSON.parse(el.dataset.props) : {}
    const php = el.dataset.phpversion;
    const totara = el.dataset.tversion;
    const mysql = el.dataset.mysqlversion;

    const app = createApp(ProjectsHome, { projects: props, maxPhpVersion: php, maxTotaraVersion: totara, maxMysqlVersion: mysql })
    app.use(PrimeVue, {
        theme: {
            preset: Material,
            options: {
                prefix: 'p',
                darkModeSelector: false,
                cssLayer: true
            },
            mode: 'light'
        }});
    app.mount(el)
}
