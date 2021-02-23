<template>
    <div>
        <h3 class="text-center">All Posts</h3><br/>

        <table class="table table-bordered" :class="{'loading':loading}">
            <thead>
            <tr>
                <th>NO.</th>
                <th>Title</th>
                <th>Description</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <span id="i" >{{i=1}}</span>
            <tr v-for="post in posts" :key="post.id">
                <td>{{i++}}</td>
                <td>{{ post.title }}</td>
                <td> <img :src="show_img(post.image)" alt="image" width="50" height="50"></td> <!-- It's work-->
                <!-- <td> <img :src="'images/'+post.image" alt="image" width="50" height="50"></td> It's work-->
                <td>{{ post.created_at }}</td>
                <td>{{ post.updated_at }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: post.id }}" class="btn btn-primary mr-1">Edit
                        </router-link>
                        <button class="btn btn-danger" @click="deletePost(post.id)">Delete</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                posts: [],
                loading:true
            }
        },
        created() {
            axios
                .get('http://localhost:8000/api/posts')
                .then(response => {
                    this.posts = response.data;
                    this.loading=false;
                });
        },
        methods: {
            show_img(image){
                return "images/"+image;
            },
            deletePost(id) {
                if(!confirm("Are you sure ?"))
                { 
                    return false;
                }
                axios.delete(`http://localhost:8000/api/post/delete/${id}`)
                    .then(response => {
                        console.dir(response.data);
                        let i = this.posts.map(item => item.id).indexOf(id); // find index of your object
                        this.posts.splice(i, 1)
                    });
            }
        }
    }
</script>
<style scoped>
#i{
    display:none;
}
</style>
