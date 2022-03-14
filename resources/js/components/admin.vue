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
                <th scope="col">ID</th>
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
                <td>{{ home.id }}</td>
                <td width="200px"><img :src="home.image" width="100%" /></td>
                <td>{{ home.name }}</td>
                <td>{{ home.price }}</td>
                <td>{{ home.description }}</td>
                <td>
                  <a
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="update"
                    >Updata</a
                  >
                </td>
                <td><button class="btn btn-danger">Delete</button></td>
              </tr>
            </tbody>
          </table>
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
      Id: "",
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
};
</script>