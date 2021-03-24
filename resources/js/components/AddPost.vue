<template>
  <div>
    <h3 class="text-center">Add Post</h3>
    <div class="row">
      <div class="col-md-6">
        <form @submit.prevent="addPost">
          <div class="form-group">
            <label>Title</label>
            <input
              type="text"
              class="form-control"
              placeholder="Title"
              v-model="title"
            />
            <!-- <input type="text" class="form-control" v-model="post.title"> -->
            <!-- <span id="title"></span> -->
          </div>
          <div class="form-group">
            <label>image</label>
            <!-- <input type="text" class="form-control" v-model="post.image"> -->
            <input @change="handleChange" type="file" class="form-control" />
            <!-- <span id="image"></span> -->
          </div>
          <button type="submit" class="btn btn-primary">Add Post</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      image: "",
      title: "",
    };
  },
  methods: {
    handleChange(e) {
      this.image = e.target.files[0];
    },
    addPost() {
      const fd = new FormData();
      fd.append("title", this.title);
      fd.append("image", this.image);
      axios
        .post("./api/post/add", fd)
        .then(
          (response) => this.$router.push({ name: "Home" })
          //console.log(response.data)
        )
        .catch((error) => {
          // if (error.response.data.errors.title[0]) {

          //     document.getElementById("title").innerHTML=error.response.data.errors.title[0]
          // }
          //  if (error.response.data.errors.image[0]) {

          //     document.getElementById("image").innerHTML=error.response.data.errors.image[0]
          // }
          console.dir(error);
        })
        .finally(() => (this.loading = false));
    },
  },
};
</script>