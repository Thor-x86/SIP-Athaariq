<template>
  <div class="container mx-auto p-4">
    <template v-for="each in data">
      <inertia-link :key="each.id" :href="'/editorial/' + each.id">
        <div class="bg-white hover:bg-blue-50 p-4 my-4 shadow">
          <h1 class="text-2xl">{{ each.title }}</h1>
          <p v-if="showOwner" class="w-full text-gray-600"> By {{ each.publisher }} </p>
          <p class="w-full text-right text-gray-400"> {{ each.when }} </p>
        </div>
      </inertia-link>
    </template>
  </div>
</template>

<script>
  export default {
    props: ['show-owner', 'data'],
  };
</script>
