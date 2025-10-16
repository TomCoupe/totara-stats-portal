<template>
  <div class="flex flex-col w-full">
    <p class="text-5xl font-bold tracking-wider text-center mt-20 mb-10">BE Totara Network Portal</p>
    <div class="flex justify-center">
      <Select
          :options="projects"
          optionLabel="name"
          placeholder="Select a Project"
          class="md:w-min py-2 px-5"
          @update:modelValue="selectProject($event)"
      />
    </div>
    <div v-if="selectedProject.name" class="w-5xl mx-auto border-1 border-gray-400 rounded-xl mt-15 p-5 flex align-center items-center justify-center">
      <p class="uppercase tracking-wider text-2xl font-bold align-right pr-10 max-w-1/2">
        {{ selectedProject.name }}
      </p>
      <p class="border-l border-gray-400 text-left pl-10 max-w-1/2">
        {{ selectedProject.description }}
      </p>
    </div>
    <div v-if="selectedProject.name" class="grid grid-cols-4 grid-gap-4">
      <div class="versions-card">
        <p>PHP</p>
        <p>{{ selectedProject.phpVersion }}</p>
      </div>
    </div>
  </div>
</template>

<script>
  import Card from 'primevue/card';
  import Select from 'primevue/select';

  export default {
    name: 'ProjectsHome',

    components: {
      Card,
      Select
    },

    data() {
      return {
        selectedProject: {},
      }
    },

    props: {
      projects: Object
    },

    methods: {
      selectProject(project) {
        this.selectedProject.name = project.name;
        this.selectedProject.description = project.description;
        this.selectedProject.phpVersion = project.php_version;
      }
    }
  }
</script>

<style>
  .p-select {
    border-bottom: 2px grey solid !important;
  }

  .p-select-option-label {
    padding: 5px 20px;
  }

  .p-select-list-container {
    background: white !important;
    box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px !important;
  }

  .p-select-dropdown {
    margin-left: 5px;
  }

  .versions-card {
    height: 50px;
    width: 50px;
    border: 1px solid lightgray;
    border-radius: 6px;
  }
</style>