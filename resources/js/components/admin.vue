<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="crad">
          <a href="/create" class="btn btn-primary">Create</a>
        </div>
      </div>
      <div class="col-12">
        <div class="crad">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">IMAGE</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="home in homestay" :key="home.id">
                <td width="200px"><img :src="home.image" width="100%" /></td>
                <td>{{ home.name }}</td>
                <td>{{ home.price }}</td>
                <td>{{ home.description }}</td>
                <td>
                  <a
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#staticBackdrop"
                    @click="updateModal(home.id)"
                    >Updata</a
                  >
                </td>
                <td>
                  <button class="btn btn-danger" @click="deleteHome(home.id)">
                    Delete
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- Modal -->
        <div
          class="modal fade"
          id="staticBackdrop"
          data-bs-backdrop="static"
          data-bs-keyboard="false"
          tabindex="-1"
          aria-labelledby="staticBackdropLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel" />
                <div class="modal-body">
                  <form @submit.stop.prevent="updateHome()">
                    <label for="name">Home Name</label>
                    <input
                      type="text"
                      id="name"
                      class="form-control"
                      v-model="name"
                      required
                    />
                    <label for="image">Image</label>
                    <input
                      type="text"
                      id="image"
                      class="form-control"
                      v-model="image"
                      required
                    />
                    <label for="price">Price</label>
                    <input
                      type="number"
                      id="price"
                      class="form-control"
                      v-model="price"
                      required
                    />
                    <label for="des">description</label>
                    <textarea
                      type="text"
                      id="des"
                      class="form-control"
                      v-model="description"
                      required
                    />
                    <button
                      type="button"
                      class="btn btn-secondary mt-5"
                      data-bs-dismiss="modal"
                    >
                      Close
                    </button>
                    <button type="submit" class="btn btn-primary mt-5">
                      Update
                    </button>
                  </form>
                </div>
              </div>
            </div>
          </div>

          <!-- end modal -->
        </div>
      </div>
    </div>
  </div>
</template>



<script>
export default {
  data() {
    return {
      homestay: [],
      id: "",
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },
  mounted() {
    axios
      .get("/api/product")
      .then((data) => {
        this.homestay = data.data;
      })
      .catch((err) => console.log(err));
  },
  methods: {
    updateModal(id) {
      axios.get(`/api/product/show/${id}`).then((data) => {
        (this.id = data.data.id),
          (this.name = data.data.name),
          (this.image = data.data.image),
          (this.price = data.data.price),
          (this.description = data.data.description);
      });
    },
    updateHome() {
      axios
        .post(`/api/product/update/${this.id}`, {
          name: this.name,
          image: this.image,
          price: this.price,
          description: this.description,
        })
        .then(() => {
          alert("Update Success");
          window.location.reload();
        })
        .catch((err) => alert(err));
    },
    deleteHome(id) {
      const sure = confirm("Are you sure to delete this?");
      if (sure == true) {
        axios
          .delete(`api/product/del/${id}`)
          .then(() => {
            alert("Success");
            window.location.reload();
          })
          .catch((err) => alert(err));
      }
    },
  },
};
</script>