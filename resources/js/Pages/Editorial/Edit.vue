<template>
  <app-layout>
    <template #header>
      <div class="flex flex-row items-center">
        <div class="w-full">
          <jet-input
            type="text"
            class="w-full"
            v-model="form.title"
            placeholder="Type Title Here..."
            required
            autofocus
          />
          <p v-if="isCurator" class="w-full text-gray-600"> By {{ publisher }} </p>
        </div>
        <form @submit.prevent="submit" class="ml-4">
          <jet-button type="submit"> Done </jet-button>
        </form>
      </div>
    </template>

    <div class="container mx-auto md:my-4 p-4 bg-white shadow">
      <editor v-model="form.content" />
    </div>
  </app-layout>
</template>

<script>
  import AppLayout from '@/Layouts/AppLayout';
  import JetButton from '@/Jetstream/Button';
  import JetInput from '@/Jetstream/Input';
  import Editor from '../../Components/Editor';

  export default {
    props: ['id', 'isCurator', 'title', 'publisher', 'when', 'content'],
    components: {
      AppLayout,
      JetButton,
      JetInput,
      Editor,
    },
    data() {
      return {
        form: this.$inertia.form({
          title: this.$props.title ? this.$props.title : '',
          content: this.$props.content ? this.$props.content : '',
        }),
      };
    },
    computed: {
      currentURL() {
        let result = window.location.href.split('?')[0];
        return result.replace(/\/$/, '');
      },
    },
    methods: {
      submit() {
        if (!this.form.title) {
          alert('Title is required!');
          return;
        }

        if (!this.form.content) {
          alert('Content is required!');
          return;
        }

        if (!isNaN(this.$props.id)) {
          const path = '/editorial/' + this.$props.id;
          this.form.put(path);
        } else {
          this.form.post('/editorial');
        }
      },
    },
  };
</script>
