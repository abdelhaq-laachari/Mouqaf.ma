<template>
  <router-link :to="to" class="link" :class="{ active: isActive }">
    <div class="link__fade">
      <FIcons :icon="icon" />
      <span v-if="!collapsed">
        <slot />
      </span>
    </div>
  </router-link>
</template>

<script>
import { computed } from "vue";
import { useRoute } from "vue-router";
import { collapsed } from "./state";
export default {
  name: "SidebarLink",
  props: {
    to: { type: String, required: true },
    icon: { type: String, required: true }
  },
  setup(props) {
    const route = useRoute();
    const isActive = computed(() => route.path === props.to);
    return { isActive, collapsed };
  },
};
</script>

<style scoped>
.link__fade-enter-active,
.link__fade-leave-active {
  transition: opacity 0.1s;
}

.link__fade-enter,
.link__fade-leave-to {
  opacity: 0;
}

.link {
  display: flex;
  align-items: center;

  cursor: pointer;
  position: relative;
  font-weight: 400;
  user-select: none;

  margin: 0.1em 0;
  padding: 0.4em;
  border-radius: 0.25em;
  height: 1.5em;

  color: white;
  text-decoration: none;
}
.link:hover {
  background-color: var(--sidebar-item-hover);
}
.link:active {
  background-color: var(--sidebar-item-active);
}
.link .icon {
  flex-shrink: 0;
  width: 25px;
  margin-right: 10px;
}
</style>
