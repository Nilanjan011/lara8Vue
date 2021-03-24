<template>
  <div class="container">
    <div class="text-center" style="margin: 20px 0px 20px 0px">
      <span class="text-secondary">Laravel Vue CRUD Example</span>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="navbar-nav">
        <div class="d-flex inline">
          <router-link to="/abc" class="nav-item nav-link mr-2"
            >Home</router-link
          >
          <router-link to="/add" class="nav-item nav-link mr-2"
            >Add Post</router-link
          >
        </div>
      </div>
    </nav>
    <br />
    <router-view></router-view>
  </div>
</template>

<script>
export default {};
</script>