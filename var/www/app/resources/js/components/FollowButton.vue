<template>
  <div>
    <button class="btn-sm" :class="buttonColor" @click="clickFollow">
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
    },
    authorized: {
      type: Boolean,
      default: false
    },
    endpoint: {
      type: String
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
  },
  methods: {
    clickFollow() {
      if (!this.authorized) {
        alert("フォロー機能はログイン中のみ使用できます");
        return;
      }

      this.isFollowedBy ? this.userUnfollow() : this.userFollow();
    },
    async userFollow() {
      const response = await axios.put(this.endpoint);

      this.isFollowedBy = true;
    },
    async userUnfollow() {
      const response = await axios.delete(this.endpoint);

      this.isFollowedBy = false;
    }
  }
};
</script>
