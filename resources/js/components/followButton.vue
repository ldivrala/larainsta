<template>
  <div class="rounded">
    <button class="btn btn-primary ml-4 py-1" @click="followUser" v-text="follow"></button>
  </div>
</template>

<script>
export default {
  props: ["userId", "follows"],
  data() {
    return {
      status: this.follows,
    };
  },
  mounted() {
    console.log("Component mounted.");
  },
  methods: {
    followUser() {
      axios
        .post("/follow/" + this.userId)
        .then((response) => {
          console.log(response.data), (this.status = !this.status);
        })
        .catch((errors) => {
          if (errors.response.status == 401) {
            window.location = "/login";
          }
        });
    },
  },
  computed: {
    follow() {
      return this.status ? "Unfollow" : "Follow";
    },
  },
};
</script>
