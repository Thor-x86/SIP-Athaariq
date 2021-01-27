<template>
  <app-layout>
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Welcome Back!
      </h2>
    </template>

    <div v-if="isCurator" class="mt-8 mx-auto px-4 w-full container">
      <a href="/editorial-download" class="block" download>
        <jet-button class="w-full text-xl">
          💾 Download Report as .xlsx
        </jet-button>
      </a>
    </div>
    <div v-else class="mt-8 mx-auto px-4 w-full container">
      <inertia-link :href="currentURL + '/create'" class="block">
        <jet-button class="w-full text-xl">
          + Create New Post
        </jet-button>
      </inertia-link>
    </div>

    <list :data="data" :show-owner="isCurator" delete-path="/editorial/multidelete" />
  </app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout';
  import JetButton from '@/Jetstream/Button';
  import List from '../../Components/List.vue';

  export default {
    props: ['isCurator', 'data'],
    components: {
      AppLayout,
      JetButton,
      List,
    },
    computed: {
      currentURL() {
        let result = window.location.href.split('?')[0];
        return result.replace(/\/$/, '');
      },
    },
  };
</script>
