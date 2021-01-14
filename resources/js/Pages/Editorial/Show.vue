<template>
  <app-layout>
    <template #header>
      <div class="flex flex-row items-center">
        <div class="mr-auto">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ title }}
          </h2>
          <p v-if="isCurator" class="w-full text-gray-600"> By {{ publisher }} </p>
        </div>
        <div class="flex flex-col md:flex-row items-end">
          <inertia-link :href="currentURL + '/edit'" class="m-1">
            <jet-button>
              Edit
            </jet-button>
          </inertia-link>
          <form @submit.prevent="submitDelete" class="m-1">
            <jet-button type="submit">
              Delete
            </jet-button>
          </form>
        </div>
      </div>
    </template>

    <div class="container mx-auto md:my-4 p-4 bg-white shadow">
      <p class="w-full text-right text-gray-400"> {{ when }} </p>
      <hr class="my-4" />
      <div v-html="content" />
    </div>
  </app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout';
  import JetButton from '@/Jetstream/Button';

  export default {
    props: ['isCurator', 'title', 'publisher', 'when', 'content'],
    components: {
      AppLayout,
      JetButton,
    },
    computed: {
      currentURL() {
        let result = window.location.href.split('?')[0];
        return result.replace(/\/$/, '');
      },
    },
    methods: {
      submitDelete() {
        this.$inertia.delete(this.currentURL);
      },
    },
  };
</script>
