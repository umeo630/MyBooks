<template>
  <div>
    <button class="btn-sm" :class="buttonColor">
      <i class="mr-1" :class="buttonIcon"></i>
      {{ buttonText }}
    </button>
  </div>
</template>

<script>
export default {
  props: {
    initialIsFollowedBy: {
      type: Boolean,
      default: false
    }
  },
  data() {
    return {
      isFollowedBy: this.initialIsFollowedBy
    };
  },
  computed: {
    buttonColor() {
      return this.isFollowedBy ? "btn-primary" : "btn-theme";
    },
    buttonIcon() {
      return this.isFollowedBy ? "fa fa-plus" : "fa fa-check";
    },
    buttonText() {
      return this.isFollowedBy ? "フォロー中" : "フォロー";
    }
  }
};
</script>
