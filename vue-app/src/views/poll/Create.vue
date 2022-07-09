<template>
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="col-8">
        <router-link
          :to="{ name: 'poll.index' }"
          class="btn btn-primary btn-sm rounded shadow mb-3"
          >Back</router-link
        >
        <div class="card rounded shadow">
          <div class="card-header">Create new Poll</div>
          <div class="card-body">
            <form @submit.prevent="store()">
              <div class="mb-3">
                <label for="" class="form-label">Title</label>
                <input type="text" class="form-control" v-model="poll.title">
                <div v-if="validation.title" class="text-danger">{{validation.title[0]}}</div>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <input type="text" class="form-control" v-model="poll.desc">
                <div v-if="validation.desc" class="text-danger">{{validation.desc[0]}}</div>
              </div>
              <div class="mb-3">
                <label for="" class="form-label">Body</label>
                <input type="text" class="form-control" v-model="poll.body">
                <div v-if="validation.body" class="text-danger">{{validation.body[0]}}</div>
              </div>

              <button class="btn btn-outline-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { reactive, ref } from "vue";
import { useRouter } from "vue-router";
import axios from "axios";

export default {
  setup() {
    const poll = reactive({
      title: "",
      desc: "",
      body: "",
    });

    const validation = ref([]);
    const router = useRouter();

    function store () {
      axios.post(
        'http://127.0.0.1:8000/api/poll',
        poll
      )
      .then(() => {
        router.push({
          name: 'poll.index'
        })
      }).catch((err) => {
        validation.value = err.response.data
      });
    }

    return {
      poll,
      validation,
      router,
      store
    }
  },
};
</script>
