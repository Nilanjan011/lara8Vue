import AllPosts from './components/AllPosts.vue';
import AddPost from './components/AddPost.vue';
import EditPost from './components/EditPost.vue';

export const routes = [
    {
        name: 'Home',
        path: '/abc',
        component: AllPosts
    },
    {
        name: 'Add',
        path: '/add',
        component: AddPost
    },
    {
        name: 'Edit',
        path: '/edit/:id',
        component: EditPost
    }
];