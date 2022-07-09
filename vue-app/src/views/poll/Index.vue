<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <router-link :to="{name: 'poll.create'}" class="btn btn-primary btn-sm rounded shadow mb-3">Add</router-link>
                <div class="card rounded shadow">
                    <div class="card-header">
                        Poll list:

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Body</th>
                                    <th>Upload Time</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(poll, index) in poll.data" :key="index">
                                    <td>{{poll.title}}</td>
                                    <td>{{poll.desc}}</td>
                                    <td>{{poll.body}}</td>
                                    <td>{{poll.upload_time}}</td>
                                    <td>
                                        <router-link :to="{name:'poll.edit', params:{id: poll.id}}" class="btn btn-sm btn-outline-info">Edit</router-link>
                                        <button class="btn btn-sm btn-outline-danger" @click.prevent="destroy(poll.id, index)">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>




<script>
    import axios from 'axios'
    import { onMounted, ref } from "vue";

    export default {
        setup() {
            let poll = ref([]);

            onMounted(() => {
                axios.get('http://127.0.0.1:8000/api/poll')

                .then((result) => (
                    poll.value = result.data
                )).catch((err) => {
                    console.log(err.response)
                });
            });

            function destroy(id, index) {
                axios.delete(
                    `http://127.0.0.1:8000/api/poll/${id}`
                )

                .then(() => {
                    poll.value.data.splice(index, 1)
                }).catch((err) => {
                    console.log(err.response.data)
                });
            }


            return {
                poll,
                destroy
            }
        }
    }

</script>