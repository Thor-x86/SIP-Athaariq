<template>
  <vue-editor v-model="currentValue" />
</template>

<script>
  import { VueEditor } from 'vue2-editor';

  export default {
    name: 'editor',
    props: ['value'],
    components: {
      VueEditor,
    },
    data() {
      return {
        currentValue: this.$props.value,
      };
    },
    watch: {
      currentValue(newValue) {
        this.$emit('input', newValue);
      },
    },
  };
</script>
