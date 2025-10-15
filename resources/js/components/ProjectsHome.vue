<template>
  <div class="flex flex-col w-full mx-8">
    <Card class="flex-1 h-80">
      <template #content>
        vue component rendered sa  sasad s ad
      </template>
    </Card>
    <Card class="flex-1 h-full">
      <template #content>
        vue component rendered sa  sasad s ad
      </template>
    </Card>
  </div>
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