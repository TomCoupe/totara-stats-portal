<template>
  <div class="flex flex-col w-full">
    <div class="bg-[#DC2F89] text-white py-15">
      <p class="text-5xl font-bold tracking-wider text-center mb-10">BE Totara Network Portal</p>
      <div class="flex justify-center">
        <Select
            :v-model="selectedProject"
            :options="projects"
            optionLabel="name"
            placeholder="Select a Project"
            class="md:w-min py-2 px-5"
            @update:modelValue="selectProject($event)"
        />
      </div>
    </div>
    <div v-if="selectedProject.name" >
      <div class="w-5xl mx-auto border-1 border-gray-400 rounded-xl mt-15 p-5 flex align-center items-center justify-center">
        <p class="uppercase tracking-wider text-2xl font-bold align-right pr-10 max-w-1/2">
          {{ selectedProject.name }}
        </p>
        <p class="border-l border-gray-400 text-left pl-10 max-w-1/2">
          {{ selectedProject.description }}
        </p>
      </div>
      <div class="grid grid-cols-4 gap-x-10 m-10">
        <div class="flex flex-col gap-y-10 ">
          <Card class="text-center py-5">
            <template #title>Total Courses</template>
            <template #content>
              <p class="">
                {{ selectedProject.total_courses }}
              </p>
            </template>
          </Card>
          <Card class="text-center py-5">
            <template #title>Total Users</template>
            <template #content>
              <p class="">
                {{ selectedProject.total_users }}
              </p>
            </template>
          </Card>
        </div>
        <Card class="text-center justify-center">
          <template #title>PHP Version</template>
          <template #content>
            <p class="">
              {{ selectedProject.php_version }}
            </p>
          </template>
        </Card>
        <Card class="text-center justify-center">
          <template #title>Totara Version</template>
          <template #content>
            <p class="">
              {{ selectedProject.totara_version }}
            </p>
          </template>
        </Card>
        <Card class="text-center justify-center">
          <template #title>MySQL Version</template>
          <template #content>
            <p class="">
              {{ selectedProject.mysql_version }}
            </p>
          </template>
        </Card>
      </div>
      <div class="flex justify-center py-10">
        <DataTable :value="selectedProject.plugins" :rows="20" scrollable scroll-height="400px" striped-rows>
          <Column field="display_name" header="Name"></Column>
          <Column field="version" header="Version"></Column>
        </DataTable>
      </div>
    </div>
  </div>
</template>

<script>
  import Card from 'primevue/card';
  import Select from 'primevue/select';
  import DataTable from 'primevue/datatable';
  import Column from 'primevue/column';

  export default {
    name: 'ProjectsHome',

    components: {
      Card,
      Select,
      DataTable,
      Column
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
        this.selectedProject = project;
      }
    }
  }
</script>

<style>
  main {
    background: #F7FAFC !important;
  }
  .p-select {
    border-radius: 5px !important;
  }

  .p-select-option-label {
    padding: 5px 20px;
  }

  .p-select-option.p-select-option-selected {
    background: #dc2f89;
    color: white;
  }

  .p-select-list-container {
    background: white !important;
    box-shadow: rgba(0, 0, 0, 0.16) 0 1px 4px !important;
  }

  .p-select-dropdown {
    margin-left: 5px;
  }

  .p-datatable-tbody tr td{
    padding: 10px !important;
  }

  .p-datatable-header-cell {
    padding: 10px !important;
  }

</style>