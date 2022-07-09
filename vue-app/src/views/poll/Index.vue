<template>
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <route-link :to="{name: 'poll.create'}" class="btn btn-primary btn-sm rounded shadow mb-3">Add</route-link>

                <div class="card rounded shadow">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>Title</tr>
                                <tr>Description</tr>
                                <tr>Body</tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{poll.title}}</td>
                                    <td>{{poll.desc}}</td>
                                    <td>{{poll.body}}</td>
                                    <td>
                                        <route-link :to="{name:'poll.edit', params:{id: poll.id}}" class="btn btn-sm btn-outline-info">Edit</route-link>
                                        <button class="btn btn-sm btn-outline-danger" @click.prevent="destroy(transaction.id, index)">Delete</button>
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
    export default {

    }

</script>