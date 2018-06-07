<template>
  <router-link :to="url" class="nav-link">
    <i :class="icon"/> {{ name }}
    <b-badge v-if="badge.text" :variant="badge.variant">{{ badge.text }}</b-badge>
  </router-link>
</template>

<script>
export default {
  name: 'SidebarNavLink',
  props: {
    name: {
      type: String,
      default: ''
    },
    url: {
      type: String,
      default: ''
    },
    icon: {
      type: String,
      default: ''
    },
    badge: {
      default: ''
    }
  }
}
</script>
