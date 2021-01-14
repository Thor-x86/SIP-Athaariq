<style lang="sass" scoped>
  .page-app_logo
    max-width: 720px
    width: 100%
</style>

<template>
  <div class="w-screen h-screen flex flex-col items-center justify-center p-4 md:p-8">
    <app-logo class="page-app_logo" />
    <p class="text-center h3 text-md md:text-3xl">
      A place for everyone to share latest incident at the world from community, to community. Let's start share your
      thoughts now!
    </p>
    <div class="flex flex-row items-center justify-center mt-4">
      <inertia-link :href="route('login')">
        <jet-button class="m-2 text-lg">
          Sign-In
        </jet-button>
      </inertia-link>
      <inertia-link :href="route('register')">
        <jet-button class="m-2 text-lg">
          Join Us
        </jet-button>
      </inertia-link>
    </div>
  </div>
</template>

<script>
  import AppLogo from '../Jetstream/ApplicationLogo.vue';
  import JetButton from '@/Jetstream/Button';

  export default {
    components: {
      'app-logo': AppLogo,
      JetButton,
    },
  };
</script>
