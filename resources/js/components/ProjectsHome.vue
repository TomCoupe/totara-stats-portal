<template>
  <Card>
    <template #content>
      vue component rendered sa  sasad s ad
    </template>
  </Card>
</template>

<script>
  import Card from 'primevue/card';
  export default {
    name: 'ProjectsHome',

    components: {
      Card
    },

    props: {
      projects: Object
    },
  }
</script>