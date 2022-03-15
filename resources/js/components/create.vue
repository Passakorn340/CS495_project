<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="crad">
          <form @submit.stop.prevent="addHome">
            <label for="Homename">Home</label>
            <input
              class="form-control"
              type="text"
              placeholder="Home Stay"
              id="Homename"
              v-model="name"
              required
            /><label for="image">Image</label>
            <input
              class="form-control"
              type="text"
              placeholder="Image"
              id="image"
              v-model="image"
              required
            />
            <label for="price">Price</label>
            <input
              class="form-control"
              type="number"
              placeholder="0.00"
              id="price"
              v-model="price"
              required
            />
            <label for="des">Description</label>
            <input
              class="form-control"
              type="text"
              placeholder="etc.."
              id="des"
              v-model="description"
              required
            />
            <div class="d-grid gap-2">
              <button type="submit" class="btn btn-primary mt-3">Save</button>
            </div>
            <a href="/admin" class="btn text-center" >Back to Admin Page</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: "",
      image: "",
      price: "",
      description: "",
    };
  },
  methods: {
    addHome() {
      axios
        .post("api/product/store", {
          name: this.name,
          image: this.image,
          price: this.price,
          description: this.description,
        })
        .then(() => {
          alert("Add Success");
          window.location.reload();
        })
        .catch((err) => alert(err));
    },
  },
};
</script>
