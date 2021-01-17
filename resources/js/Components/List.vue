<style lang="sass" scoped>
  input
    cursor: pointer
</style>

<template>
  <form @submit.prevent="multiDelete" class="container mx-auto p-4">
    <button v-if="countChecked() > 0" class="my-4 bg-red-600 text-white p-2 rounded-lg hover:bg-red-500">
      DELETE {{ countChecked() }} ITEMS
    </button>
    <div v-for="each in data" :key="each.id" class="flex flex-row items-center justify-center bg-white my-4 shadow">
      <input
        type="checkbox"
        v-model="checkForm.deleteIDs"
        :value="each.id"
        class="m-4 appearance-none hover:bg-blue-50 checked:bg-blue-600 checked:border-transparent"
      />
      <inertia-link :href="'/editorial/' + each.id" class="w-full p-4 hover:bg-blue-50">
        <h1 class="text-2xl">{{ each.title }}</h1>
        <p v-if="showOwner" class="w-full text-gray-600"> By {{ each.publisher }} </p>
        <p class="w-full h-full text-right text-gray-400"> {{ each.when }} </p>
      </inertia-link>
    </div>
  </form>
</template>

<script>
  export default {
    props: ['show-owner', 'data', 'delete-path'],
    data() {
      return {
        checkForm: this.$inertia.form({
          deleteIDs: [],
        }),
      };
    },
    methods: {
      countChecked() {
        return this.checkForm.deleteIDs.length;
      },
      multiDelete() {
        const count = this.countChecked();
        const isConfirm = window.confirm(`Are you sure delete ${count} entries?`);
        if (isConfirm) {
          this.checkForm.post(this.$props.deletePath);
        }
      },
    },
  };
</script>
